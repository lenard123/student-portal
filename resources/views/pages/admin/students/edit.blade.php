@extends('layouts.admin')

@section('admin-content')

<div data-app="global">
    <div class="bg-white w-full shadow-lg rounded-lg p-4 max-w-screen-md mx-auto">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update Student Information</h5>
        <hr class="my-4" />

        <form method="POST" action='{{ url("/admin/students/{$student->user_id}") }}'>
            @csrf
            @method('PUT')
            <div class="grid gap-4">

                <fb-input name='student_id' model-value='{{ $student->student_id }}' label="Student Number"></fb-input>
                <fb-input name='firstname' model-value='{{ $student->user->firstname }}' label="Firstname"></fb-input>
                <fb-input name='middlename' model-value='{{ $student->user->middlename }}' label="Middlename"></fb-input>
                <fb-input name='lastname' model-value='{{ $student->user->lastname }}' label="Lastname"></fb-input>
                <fb-input name='email' model-value='{{ $student->user->email }}' label="Email"></fb-input>

                <div class="flex justify-end">
                    <fb-button>Submit</fb-button>
                </div>

            </div>
        </form>
    </div>
</div>


@endsection