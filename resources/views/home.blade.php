@extends('layouts.app')

@section('title', 'Grawlix Design')


@section('content')
    <section class="flex flex-col max-w-5xl mx-auto">
        <h1>$4@}\#</h1>

        <div>
            <ul>
                <li>Web Design</li>
                <li>Enterprise Tools</li>
                <li>E-commerce Integration</li>
                <li>Online Business Integration</li>
            </ul>
        </div>
    </section>

    <div class="border border-zinc-200 rounded-lg overflow-y-auto mx-2 my-4" style="height:520px;">
        @include('home.web-design')
    </div>

    <div class="border border-zinc-200 rounded-lg overflow-y-auto mx-2 my-4" style="height:520px;">
        @include('home.enterprise-tools')
    </div>

    <div class="border border-zinc-200 rounded-lg overflow-y-auto mx-2 my-4" style="height:520px;">
        @include('home.e-commerce')
    </div>

    <div class="border border-zinc-200 rounded-lg overflow-y-auto mx-2 my-4" style="height:520px;">
        @include('home.online-business-integration')
    </div>
@endsection