@extends('layouts.admin')

@section('admin-content')

<div data-app="manageClass">
    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Class</h1>

    <div class="shadow mt-4 rounded">
        <div class="bg-white p-4">
            <h4 class="font-bold">Subjects</h4>
        </div>
        <fb-table>
            <table-head>
                <table-head-cell>Subject</table-head-cell>
                <table-head-cell>Assigned Faculty</table-head-cell>
                <table-head-cell>Day</table-head-cell>
                <table-head-cell>Time</table-head-cell>
                <table-head-cell></table-head-cell>
            </table-head>
            <table-body>
                @foreach($section->subjects as $subject)
                <table-row>
                    <table-cell>{{ $subject->name }}</table-cell>
                    <table-cell>
                        @if($subject->pivot->faculty)
                        <div class="text-slate-900">{{ $subject->pivot->faculty->user->fullname }}</div>
                        @else
                        <div class="text-slate-500 italic">Unassigned</div>
                        @endif
                    </table-cell>
                    <table-cell>
                        @if(!$subject->pivot->schedule)
                        <div class="text-slate-500 italic">Unassigned</div>
                        @endif
                    </table-cell>
                    <table-cell>
                        @if(!$subject->pivot->schedule)
                        <div class="text-slate-500 italic">Unassigned</div>
                        @endif
                    </table-cell>
                    <table-cell>Update</table-cell>
                </table-row>
                @endforeach
            </table-body>
        </fb-table>
    </div>

    <div class="shadow mt-4 rounded">
        <div class="bg-white p-4">
            <h4 class="font-bold">Enrolled Students</h4>
        </div>
        <fb-table>
            <table-head>
                <table-head-cell>Student ID</table-head-cell>
                <table-head-cell>Name</table-head-cell>
                <table-head-cell></table-head-cell>
            </table-head>
            <table-body>
                @foreach($section->students as $student)
                <table-row>
                    <table-cell>{{ $student->student_id }}</table-cell>
                    <table-cell class="text-slate-900">{{ $student->user->fullname }}</table-cell>
                    <table-cell>Update</table-cell>
                </table-row>
                @endforeach
            </table-body>
        </fb-table>
    </div>

    <modal size="md" v-if="selected !== null">
        <template #header>
            <div class="flex items-center text-lg">
                Update Subject
            </div>
        </template>

        <template #body>
            <form method="POST" action="/admin/settings/school-year">
                @csrf
                @method("PUT")

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Faculty</label>
                    <select name="faculty_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->user->fullname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Day</label>
                    <select name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                    </select>
                </div>

                <div class="mt-4">
                    <fb-input name="time" label="Time"></fb-input>
                </div>

                <div class="mt-4 flex justify-end">
                    <fb-button>Submit</fb-button>
                </div>
            </form>
        </template>
    </modal>
</div>

@endsection