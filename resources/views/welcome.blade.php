@extends('layouts.master')

@section('main')

    @include('site.partials.hero')
    @include('site.partials.side-by-side-with-images')
    @include('site.partials.cta')
    @include('site.partials.grid-with-icons')
    @include('site.partials.testimonial')
    @include('site.partials.faqs')
    @include('site.partials.contact')
    @include('site.partials.footer')

@endsection
