@extends('layouts.student')

@section('active-navlink', 'home')

@section('student-content')

<div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
    <div class="flex-shrink-0 flex-grow">
        <div class="text-3xl text-slate-900 font-bold tracking-tight">Hello, {{ auth()->user()->fullname }}</div>
        <p class="mt-2 font-medium text-slate-800">Welcome to University of Caloocan City <br />Student Portal</p>
    </div>
    <div class="">
        <img class="w-full h-[120px] object-contain" src="{{ url('/images/undraw_online_test.png') }}" />
    </div>
</div>

<div class="text-xl my-4 font-semibold text-slate-800">Announcements</div>
<hr />

<div class="grid grid-cols-1 sm:grid-cols-2 mt-4 gap-4">
    @foreach($announcements as $announcement)
    <div class="bg-slate-100 p-4 rounded-md shadow flex gap-2 flex-col">
        <div class="flex-grow">
            <div class="font-bold uppercase">{{ $announcement->title }}</div>
            <p class="text-slate-700 text-sm">{{ Str::limit($announcement->content,100) }}</p>
        </div>
        <div class="text-xs text-slate-700 italic">{{ $announcement->created_at->diffForHumans() }}</div>
    </div>
    @endforeach
</div>
@endsection