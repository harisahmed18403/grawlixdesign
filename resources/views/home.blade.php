@extends('layouts.app')

@section('title', 'Grawlix Design')

@section('content')
<div class="mx-2 mb-6" style="height:520px;">
    <section class="flex w-full min-h-full relative">
        <canvas id="icda-canvas" class="absolute inset-0 w-full h-full block"></canvas>
    </section>
    @vite('resources/js/home.js')
</div>
@endsection