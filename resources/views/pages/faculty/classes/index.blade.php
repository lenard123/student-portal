@extends('layouts.faculty')

@section('active-navlink', 'classes')

@section('faculty-content')

<div data-app="global">
    <h1 class="text-2xl text-slate-900">My Classes</h1>

    <hr class="my-2" />

    <div class="text-sm text-slate-600">
        <div>Department: <span class="font-bold Capitalize">{{ auth()->user()->faculty->department }}</span></div>
    </div>

    <hr class="my-2" />

    <fb-table>
        <table-head>
            <table-head-cell>Subject</table-head-cell>
            <table-head-cell>Grade & Section</table-head-cell>
            <table-head-cell>Day</table-head-cell>
            <table-head-cell>Time</table-head-cell>
            <table-head-cell></table-head-cell>
        </table-head>
        <table-body>
        @foreach($courses as $course)
            <table-row>
                <table-cell>{{ $course->subject->name }}</table-cell>
                <table-cell>{{ $course->section->gradeLevel->level }} - {{ $course->section->name }}</table-cell>
                <table-cell>{{ $course->schedule['day'] }}</table-cell>
                <table-cell>{{ $course->schedule['time'] }}</table-cell>
                <table-cell>
                    <div class="flex justify-end gap-2">
                        <a href='{{ url("/faculty/classes/{$course->id}") }}'>View</a>
                    </div>
                </table-cell>
            </table-row>
        @endforeach
        </table-body>
    </fb-table>

</div>

@endsection