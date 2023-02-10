@extends('layouts.admin')

@section('admin-content')

<div data-app="global">
    <div class="bg-white w-full shadow-lg rounded-lg p-4 max-w-screen-md mx-auto">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Add New Class</h5>
        <hr class="my-4" />
        <form action="{{ url('/admin/classes') }}" method="POST">
            @csrf
            <input type="hidden" name="grade_level" value="{{ $grade_level->id }}" />
            <fb-input class="mb-2" disabled model-value="{{ $grade_level->level }}" label="Grade Level"></fb-input>
            <fb-input name="section" class="mb-2" label="Section Name"></fb-input>
            <div class="flex flex-col gap-2 mb-4">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Subjects</label>

                @foreach($subjects as $subject)
                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                    <input checked id="subject-{{ $subject->id }}" type="checkbox" value="{{ $subject->id }}" name="subjects[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="subject-{{ $subject->id }}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $subject->name }}</label>
                </div>
                @endforeach

            </div>

            <fb-button class="w-full" size="lg" :pill="true">Add New</fb-button>

        </form>
    </div>
</div>

@endsection