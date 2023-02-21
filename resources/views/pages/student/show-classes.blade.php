@extends('layouts.student')

@section('active-navlink', 'classes')

@section('student-content')

<div data-app="classes">
    <h1 class="text-2xl text-slate-900">{{ $course->section->gradeLevel->level }} - {{ $course->section->name }}</h1>

    <hr class="my-2" />

    <div class="text-sm text-slate-600">
        <div>Department: <span class="font-bold capitalize">{{ auth()->user()->student->department }}</span></div>
        <div>Day: <span class="font-bold capitalize">{{ $course->schedule['day'] }}</div>
        <div>Time: <span class="font-bold capitalize">{{ $course->schedule['time'] }}</div>
    </div>

    <hr class="my-2" />

    <tabs v-model="activeTab">
        <tab name="lesson" title="Lessons">

            <div class="bg-white">
                <div class="p-4 flex justify-between">
                    <h4>List of Lessons</h4>
                </div>
                <fb-table>
                    <table-head>
                        <table-head-cell>Date</table-head-cell>
                        <table-head-cell>Title</table-head-cell>
                        <table-head-cell></table-head-cell>
                    </table-head>

                    <table-body>
                        @if ($course->lessons->isEmpty())
                        <table-row>
                            <table-cell colspan="3">No posted lessons yet</table-cell>
                        </table-row>
                        @else
                        @foreach($course->lessons as $lesson)
                        <table-row>
                            <table-cell>{{ $lesson->created_at->diffForHumans() }}</table-cell>
                            <table-cell>{{ $lesson->title }}</table-cell>
                            <table-cell>
                                <div class="flex justify-end gap-2">
                                    <a href='{{ url("/classes/{$course->id}/lessons/{$lesson->id}") }}'>View</a>
                                </div>
                            </table-cell>
                        </table-row>
                        @endforeach
                        @endif
                    </table-body>
                </fb-table>
            </div>

        </tab>
        <tab name="students" title="Students">
            @include('pages.faculty.classes.students')
        </tab>
    </tabs>

</div>

@endsection