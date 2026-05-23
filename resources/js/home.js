import * as THREE from 'three';
import { FontLoader } from 'three/addons/loaders/FontLoader.js';
import { TextGeometry } from 'three/addons/geometries/TextGeometry.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';
import fontData from 'three/examples/fonts/helvetiker_bold.typeface.json';

const CHARS  = ['$', '4', '@', '}', 'L', '!', '#'];
const COLORS = ['#56EF65', '#EF4553', '#C49EE8', '#56EF65', '#EF4553', '#C49EE8', '#56EF65'];

const GRAVITY     = 20;
const RESTITUTION = 0.52;
const FLOOR_Y     = -3.5;
const CHAR_SIZE   = 4.2;
const SPACING     = 5.0;

// Preallocated reusables — never allocate inside the hot loop
const _scaleOne  = new THREE.Vector3(1, 1, 1);
const _closest   = new THREE.Vector3();
const _normal    = new THREE.Vector3();
const _worldSph  = new THREE.Sphere();
const _tmpBox    = new THREE.Box3();

class FallingLetter {
    constructor(mesh, localSphereCenter, sphereRadius, landX, dropDelay) {
        this.mesh              = mesh;
        this._localCenter      = localSphereCenter; // geometry-space center
        this._radius           = sphereRadius;
        this.dropDelay         = dropDelay;
        this.elapsed           = 0;
        this.settled           = false;

        const angle  = Math.random() * Math.PI * 2;
        const dist   = 35 + Math.random() * 15;
        const startX = Math.cos(angle) * dist;
        const startZ = Math.sin(angle) * dist;
        const startY = 8 + Math.random() * 12;

        mesh.position.set(startX, startY, startZ);
        mesh.rotation.set(
            Math.random() * Math.PI * 2,
            Math.random() * Math.PI * 2,
            Math.random() * Math.PI * 2,
        );

        const t = 1.4 + Math.random() * 0.8;
        this.vx = (landX - startX) / t;
        this.vy = (FLOOR_Y - startY + 0.5 * GRAVITY * t * t) / t;
        this.vz = -startZ / t;

        this.angVx = (Math.random() - 0.5) * 6;
        this.angVy = (Math.random() - 0.5) * 4;
        this.angVz = (Math.random() - 0.5) * 6;
    }

    update(dt, obstacles) {
        this.elapsed += dt;
        if (this.elapsed < this.dropDelay) return;

        if (!this.settled) {
            this.vy -= GRAVITY * dt;
            this.mesh.position.x += this.vx * dt;
            this.mesh.position.y += this.vy * dt;
            this.mesh.position.z += this.vz * dt;
            this.mesh.rotation.x += this.angVx * dt;
            this.mesh.rotation.y += this.angVy * dt;
            this.mesh.rotation.z += this.angVz * dt;

            // Sphere collision vs obstacles — O(1) per obstacle, no vertex traversal
            _worldSph.center.copy(this._localCenter).add(this.mesh.position);
            _worldSph.radius = this._radius;

            for (const obsBox of obstacles) {
                if (obsBox.intersectsSphere(_worldSph)) {
                    _closest.copy(_worldSph.center).clamp(obsBox.min, obsBox.max);
                    _normal.subVectors(_worldSph.center, _closest);
                    const dist = _normal.length();
                    if (dist > 0 && dist < _worldSph.radius) {
                        _normal.divideScalar(dist);
                        const pen = _worldSph.radius - dist;
                        this.mesh.position.addScaledVector(_normal, pen);
                        _worldSph.center.addScaledVector(_normal, pen);

                        const vDotN = this.vx * _normal.x + this.vy * _normal.y + this.vz * _normal.z;
                        if (vDotN < 0) {
                            const f = (1 + RESTITUTION) * vDotN;
                            this.vx -= f * _normal.x;
                            this.vy -= f * _normal.y;
                            this.vz -= f * _normal.z;
                        }
                        this.angVx *= 0.7;
                        this.angVy *= 0.7;
                        this.angVz *= 0.7;
                    }
                }
            }

            // Floor
            if (this.mesh.position.y <= FLOOR_Y) {
                this.mesh.position.y = FLOOR_Y;
                const impact = Math.abs(this.vy);
                this.vy = -this.vy * RESTITUTION;
                this.vx *= 0.6;
                this.vz *= 0.6;
                this.angVx *= RESTITUTION;
                this.angVy *= RESTITUTION;
                this.angVz *= RESTITUTION;
                this.mesh.scale.set(1 + impact * 0.008, 1 - impact * 0.008, 1);
                if (impact < 0.2) {
                    this.vy = this.vx = this.vz = 0;
                    this.settled = true;
                }
            }

            this.mesh.scale.lerp(_scaleOne, 0.15);
        }

        if (this.settled) {
            this.mesh.rotation.x += -this.mesh.rotation.x * 0.04;
            this.mesh.rotation.z += -this.mesh.rotation.z * 0.04;
        }
    }
}

class ICanDoAnythingScene {
    constructor(canvas) {
        this.canvas    = canvas;
        this.clock     = new THREE.Clock();
        this.letters   = [];
        this.obstacles = [];               // Box3[] — updated cheaply each frame
        this._obsLocalBoxes  = [];         // pre-computed local Box3 per mesh
        this._obsMeshes      = [];         // refs to the static text meshes
        this._obsWorldBoxes  = [];         // preallocated world Box3 (reused, no GC)
        this._init();
        this._bindEvents();
        this._buildCenterText();
        this._buildLetters();
        this._animate();
    }

    _init() {
        this.renderer = new THREE.WebGLRenderer({ canvas: this.canvas, antialias: true, alpha: false });
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
        this.renderer.setSize(this.canvas.clientWidth, this.canvas.clientHeight);
        this.renderer.toneMapping          = THREE.ACESFilmicToneMapping;
        this.renderer.toneMappingExposure   = 1.2;

        this.scene            = new THREE.Scene();
        this.scene.background = new THREE.Color('#ffffff');

        const pmrem = new THREE.PMREMGenerator(this.renderer);
        this.scene.environment = pmrem.fromScene(new RoomEnvironment(), 0.04).texture;
        pmrem.dispose();

        this.camera = new THREE.PerspectiveCamera(52, this.canvas.clientWidth / this.canvas.clientHeight, 0.1, 300);
        this._camBaseRadius = Math.sqrt(20 * 20 + 16 * 16);
        this._camRadius     = this._camBaseRadius;
        this._camAngle      = Math.atan2(16, -20);
        this._camY          = 1;

        this.scene.add(new THREE.AmbientLight(0xffffff, 0.5));

        this.camLight = new THREE.DirectionalLight(0xffffff, 1.6);
        this.camLight.target.position.set(0, -1, 0);
        this.scene.add(this.camLight);
        this.scene.add(this.camLight.target);

        const fill = new THREE.DirectionalLight(new THREE.Color('#C49EE8'), 1.0);
        fill.position.set(0, 8, 0);
        this.scene.add(fill);

        this.font = new FontLoader().parse(fontData);
    }

    _buildCenterText() {
        const words = [
            { text: 'Grawlix', color: '#1C7A28' },
            { text: 'Design',  color: '#2DB83C' },
        ];

        const size  = 2.6;
        const depth = 0;
        const gap   = 0.7;

        this.textGroup = new THREE.Group();
        this.scene.add(this.textGroup);

        const geos = words.map(w => {
            const geo = new TextGeometry(w.text, {
                font: this.font, size, depth,
                curveSegments: 6,
                bevelEnabled: false,
            });
            geo.computeBoundingBox();
            return geo;
        });

        const widths    = geos.map(g => g.boundingBox.max.x - g.boundingBox.min.x);
        const totalW    = widths[0] + gap + widths[1];
        const baseX     = -totalW / 2;
        const positions = [baseX, baseX + widths[0] + gap];

        words.forEach((w, i) => {
            const mat = new THREE.MeshBasicMaterial({
                color: new THREE.Color(w.color),
            });
            const mesh = new THREE.Mesh(geos[i], mat);
            mesh.position.set(positions[i], -0.5, 0);
            this.textGroup.add(mesh);

            // Pre-compute local Box3 once from geometry (no vertex traversal at runtime)
            const localBox = new THREE.Box3().copy(geos[i].boundingBox);
            localBox.min.x += positions[i];
            localBox.max.x += positions[i];
            localBox.min.y -= 0.5;
            localBox.max.y -= 0.5;
            // Give the flat text a collision thickness so letters bounce off it
            localBox.min.z = -0.8;
            localBox.max.z =  0.8;

            this._obsLocalBoxes.push(localBox);
            this._obsMeshes.push(mesh);
            this._obsWorldBoxes.push(new THREE.Box3()); // preallocated
        });

        this.obstacles = this._obsWorldBoxes;
    }

    _buildLetters() {
        const totalWidth = (CHARS.length - 1) * SPACING;
        const startX     = -totalWidth / 2;

        CHARS.forEach((char, i) => {
            const geo = new TextGeometry(char, {
                font:           this.font,
                size:           CHAR_SIZE,
                depth:          0.4,
                curveSegments:  6,
                bevelEnabled:   true,
                bevelThickness: 0.08,
                bevelSize:      0.06,
                bevelSegments:  2,
            });

            geo.computeBoundingBox();
            const bb    = geo.boundingBox;
            const charW = bb.max.x - bb.min.x;
            const charH = bb.max.y - bb.min.y;
            const charD = bb.max.z - bb.min.z;
            const landX = startX + i * SPACING - charW / 2;

            // Local sphere center (geometry space) and radius — computed once
            const localCenter = new THREE.Vector3(
                (bb.min.x + bb.max.x) * 0.5,
                (bb.min.y + bb.max.y) * 0.5,
                (bb.min.z + bb.max.z) * 0.5,
            );
            const sphereRadius = Math.sqrt(charW * charW + charH * charH + charD * charD) * 0.5;

            // Iridescence only — no transmission, no double render pass
            const mat = new THREE.MeshPhysicalMaterial({
                color:                     new THREE.Color(COLORS[i]),
                roughness:                 0.05,
                metalness:                 0.1,
                iridescence:               1.0,
                iridescenceIOR:            1.8,
                iridescenceThicknessRange: [80, 700],
                transparent:               true,
                opacity:                   0.88,
            });

            const mesh = new THREE.Mesh(geo, mat);
            this.scene.add(mesh);
            this.letters.push(new FallingLetter(mesh, localCenter, sphereRadius, landX, i * 0.18));
        });
    }

    _updateCameraForAspect(w, h) {
        const aspect = w / h;
        this.camera.aspect = aspect;

        // Three.js fov is vertical. Derive actual horizontal half-angle,
        // then solve for the radius that keeps all content in frame.
        const vFovRad      = this.camera.fov * (Math.PI / 180);
        const hHalfAngle   = Math.atan(Math.tan(vFovRad / 2) * aspect);
        // Scene content spans ±18 world units horizontally (7 letters × SPACING + bevel)
        const contentHalf  = 18;
        const requiredR    = (contentHalf / Math.tan(hHalfAngle)) * 1.2; // 20% padding
        this._camRadius    = Math.max(this._camBaseRadius, requiredR);

        this.camera.updateProjectionMatrix();
    }

    _bindEvents() {
        this._updateCameraForAspect(this.canvas.clientWidth, this.canvas.clientHeight);

        const ro = new ResizeObserver(() => {
            const w = this.canvas.clientWidth;
            const h = this.canvas.clientHeight;
            this._updateCameraForAspect(w, h);
            this.renderer.setSize(w, h);
        });
        ro.observe(this.canvas.parentElement);
    }

    _updateObstacles() {
        // Transform pre-computed local boxes by group matrix — no vertex traversal
        const mat = this.textGroup.matrixWorld;
        for (let i = 0; i < this._obsLocalBoxes.length; i++) {
            this._obsWorldBoxes[i].copy(this._obsLocalBoxes[i]).applyMatrix4(mat);
        }
    }

    _animate() {
        requestAnimationFrame(() => this._animate());
        const dt = Math.min(this.clock.getDelta(), 0.05);

        this._camAngle += 0.25 * dt;
        const cx = Math.cos(this._camAngle) * this._camRadius;
        const cz = Math.sin(this._camAngle) * this._camRadius;
        this.camera.position.set(cx, this._camY, cz);
        this.camera.lookAt(0, -1, 0);

        this.camLight.position.set(cx, this._camY, cz);

        this.textGroup.lookAt(cx, this.textGroup.position.y, cz);
        this.textGroup.updateMatrixWorld(true);
        this._updateObstacles();

        this.letters.forEach(l => l.update(dt, this.obstacles));

        this.renderer.render(this.scene, this.camera);
    }
}

const canvas = document.getElementById('icda-canvas');
if (canvas) new ICanDoAnythingScene(canvas);
