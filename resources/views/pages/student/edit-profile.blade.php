@extends('layouts.student')

@section('active-navlink', 'profile')

@section('student-content')

<div data-app="global" class="bg-white rounded max-w-md mx-auto shadow p-4">
    <h4 class="font-bold text-xl">Edit Profile</h4>
    <hr class="my-4">

    <form class="flex flex-col gap-4" method="POST" action="{{ url('/profile/edit') }}">
        @csrf
        @method('PUT')
        <fb-input model-value="{{ auth()->user()->student->civil_status }}" label="Civil Status" name="civil_status"></fb-input>

        <fb-input model-value="{{ auth()->user()->student->birthday }}" label="Birthday" name="birthday" type="date"></fb-input>

        <fb-input model-value="{{ auth()->user()->student->nationality }}" label="Nationality" name="nationality"></fb-input>

        <fb-input model-value="{{ auth()->user()->student->religion }}" label="Religion" name="religion"></fb-input>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Gender</label>
            <select :value="'{{ auth()->user()->student->gender }}'" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Has disability?</label>
            <select :value="'{{ auth()->user()->student->has_disability }}'" name="has_disability" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value=""></option>
                <option value="1">Yes</option>
                <option value="0">None</option>
            </select>
        </div>

        <fb-input model-value="{{ auth()->user()->student->height }}" label="Height" name="height"></fb-input>
        <fb-input model-value="{{ auth()->user()->student->weight }}" label="Weight" name="weight"></fb-input>

        <div class="flex justify-end">
            <fb-button type="submit">Submit</fb-button>
        </div>
    </form>

</div>

@endsection