@extends('layouts.student')

@section('active-navlink', 'classes')

@section('student-content')
<div data-app="global">
    <h1 class="text-2xl text-slate-900">My Classes</h1>

    <hr class="my-2" />

    <div class="text-sm text-slate-600">
        <div>Department: <span class="font-bold Capitalize">{{ auth()->user()->student->department }}</span></div>
        <div>Grade Level: <span class="font-light italic">{{ $section->gradeLevel->level }}</span></div>
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
        </table-body>
    </fb-table>
</div>
<!-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Subject Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Schedule
                </th>
                <th scope="col" class="px-6 py-3">
                    Faculty Assigned
                </th>
                <th scope="col" class="px-6 py-3">
                    Room No.
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Sliver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div> -->


@endsection