@extends('layouts.app')

@section('title', 'Grawlix Design')


@section('content')
    <div class="mx-2 mb-6" style="height:520px;">
        @include('home.i-can-do-anything')
    </div>

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