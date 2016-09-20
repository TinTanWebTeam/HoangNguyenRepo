@extends('layouts.master')

@section('title')
    Hoàng Nguyễn
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('src/css/sidebar.css') }}">
@endsection

@section('content')
    @include('partials.Dashboard')
@endsection

@section('javascripts')
    <script>
        var url = '{{ URL::to('/') }}/';
        var _token = '{{ csrf_token() }}';
    </script>
@endsection