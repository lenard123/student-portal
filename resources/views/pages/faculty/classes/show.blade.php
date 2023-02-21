@extends('layouts.faculty')

@section('active-navlink', 'classes')

@section('faculty-content')

<div data-app="classes">
    <h1 class="text-2xl text-slate-900">{{ $course->section->gradeLevel->level }} - {{ $course->section->name }}</h1>

    <hr class="my-2" />

    <div class="text-sm text-slate-600">
        <div>Department: <span class="font-bold capitalize">{{ auth()->user()->faculty->department }}</span></div>
        <div>Day: <span class="font-bold capitalize">{{ $course->schedule['day'] }}</div>
        <div>Time: <span class="font-bold capitalize">{{ $course->schedule['time'] }}</div>
    </div>

    <hr class="my-2" />

    <tabs v-model="activeTab">
        <tab name="lesson" title="Lessons">
            @include('pages.faculty.classes.lesson')
        </tab>
        <tab name="students" title="Students">
            @include('pages.faculty.classes.students')
        </tab>
    </tabs>

</div>

@endsection