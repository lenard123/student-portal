@extends('layouts.student')

@section('active-navlink', 'classes')

@section('student-content')
<div data-app="global">
    <h1 class="text-2xl text-slate-900">My Classes</h1>

    <hr class="my-2" />

    <div class="text-sm text-slate-600">
        <div>Department: <span class="font-bold Capitalize">{{ auth()->user()->student->department }}</span></div>
        <div>Grade Level: <span class="font-light italic">{{ $section?->gradeLevel->level ?? "N/A" }}</span></div>
        <div>Semester: <span class="font-light italic">N/A</span></div>
    </div>

    <hr class="my-2" />

    <fb-table>
        <table-head>
            <table-head-cell>Subject</table-head-cell>
            <table-head-cell>Assigned Faculty</table-head-cell>
            <table-head-cell>Day</table-head-cell>
            <table-head-cell>Time</table-head-cell>
        </table-head>
        <table-body>
            @if (is_null($section))
            <table-row>
                <table-cell colspan="4">You are currently not enrolled yet.</table-cell>
            </table-row>
            @else
            @foreach($section->courses as $course)
            <table-row>
                <table-cell>{{ $course->subject->name }}</table-cell>
                <table-cell>
                    @if($course->faculty)
                    <div class="text-slate-900">{{ $course->faculty->user->fullname }}</div>
                    @else
                    <div class="text-slate-500 italic">Unassigned</div>
                    @endif
                </table-cell>
                <table-cell>
                    @if($course->schedule['day'])
                    <div class="text-slate-900">{{ $course->schedule['day'] }}</div>
                    @else
                    <div class="text-slate-500 italic">Unassigned</div>
                    @endif
                </table-cell>
                <table-cell>
                    @if($course->schedule['time'])
                    <div class="text-slate-900">{{ $course->schedule['time'] }}</div>
                    @else
                    <div class="text-slate-500 italic">Unassigned</div>
                    @endif
                </table-cell>
            </table-row>
            @endforeach
            @endif
        </table-body>
    </fb-table>
</div>

@endsection