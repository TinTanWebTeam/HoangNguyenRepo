@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('partials.dashboard')
@endsection

@section('javascripts')
    <script>
        var url = '{{ URL::to('/') }}/';
        var _token = '{{ csrf_token() }}';
    </script>
@endsection