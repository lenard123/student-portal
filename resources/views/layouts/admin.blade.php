@extends('layouts.main')

@section('title', 'Admin Panel')

@section('content')

@include('layouts.sections.admin-header')

@include('layouts.sections.admin-sidebar')

<div class="p-4 sm:ml-64 pt-16">
    @yield('admin-content')

    {{ $errors }}
</div>


@endsection