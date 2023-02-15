@extends('layouts.main')

@section('title', 'Student Portal')

@section('content')

<div class="flex h-screen student-panel relative -left-[320px] lg:left-0 transition-all">
    <div class="bg-blue-500 flex-shrink-0 w-[320px] max-h-screen text-white p-4" data-app="studentSidebar">

        <div class="flex flex-col gap-2" data-active="@yield('active-navlink')">
            <a data-page="home" class="navlink" href="{{ url('/') }}">Home</a>
            <a data-page="messages" class="navlink" href="{{ url('/messages') }}">Chat Support</a>
            <a data-page="profile" class="navlink" href="{{ url('/profile') }}">My Profile</a>
            <a data-page="classes" class="navlink" href="{{ url('/classes') }}">My Classes</a>
            <a data-page="settings" class="navlink" href="{{ url('/settings') }}">Settings</a>
        </div>

    </div>

    <div class="flex-grow p-6 overflow-auto w-screen lg:w-auto lg:flex-shrink flex-shrink-0">
        @yield('student-content')
    </div>

</div>

@endsection