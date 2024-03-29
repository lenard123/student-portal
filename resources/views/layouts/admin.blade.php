@extends('layouts.main')

@section('title', 'Admin Panel')

@section('content')

@include('layouts.sections.admin-sidebar')

@include('layouts.sections.admin-header')


<div class="p-4 sm:ml-64 pt-16 min-h-screen flex flex-col relative">
    @yield('admin-content')

    <!-- {{ $errors }} -->
</div>


@endsection