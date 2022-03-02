<!-- Stored in resources/views/commons/pages/about.blade.php -->
@extends('commons.layouts.dashboard')
@section('title', 'About Us')

@section('scripts')
    @parent
    <script src="{{ url('/js/analytics.js') }}"></script>
@show

@section('header')
    <h2>Child Header</h1>
@show

@section('content')
    <h1>About Us</h1>
@endsection​