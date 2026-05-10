@extends('layouts.app')

@section('title', 'Grawlix Design')


@section('content')
    <section class="flex flex-col max-w-5xl mx-auto">
        <h1>$4@}\#</h1>

        <div>
            <ul>
                <li>Web Design</li>
                <li>Enterprise Tools</li>
                <li>E-commerce</li>
                <li>Online Business Integration</li>
            </ul>
        </div>
    </section>

    @include('home.web-design')
    @include('home.enterprise-tools')
    @include('home.e-commerce')
    @include('home.online-business-integration')
@endsection