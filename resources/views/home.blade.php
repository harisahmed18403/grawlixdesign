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

    <x-section-header title="Build a website for your business" />
    <div class="border border-brand-red border-t-0 overflow-y-auto mx-2 mb-6 rounded-b" style="height:520px;">
        @include('home.web-design')
    </div>

    <x-section-header title="Run your operations from one place" />
    <div class="border border-brand-red border-t-0 overflow-y-auto mx-2 mb-6 rounded-b" style="height:520px;">
        @include('home.enterprise-tools')
    </div>

    <x-section-header title="Sell on Amazon, eBay, and your own site" />
    <div class="border border-brand-red border-t-0 overflow-y-auto mx-2 mb-6 rounded-b" style="height:520px;">
        @include('home.e-commerce')
    </div>

    <x-section-header title="Get found on Google and fill your calendar" />
    <div class="border border-brand-red border-t-0 overflow-y-auto mx-2 mb-6 rounded-b" style="height:520px;">
        @include('home.online-business-integration')
    </div>
@endsection