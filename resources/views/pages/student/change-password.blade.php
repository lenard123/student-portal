@extends('layouts.student')

@section('student-content')

<div data-app="global" class="bg-white rounded shadow-md mx-auto max-w-lg p-4">
    <h4 class="text-xl font-bold">Change Password</h4>
    <hr class="my-4" />
    <form class="flex flex-col gap-4" method="POST" action="{{ url('/change-password') }}">
        @csrf
        @method('PATCH')

        @if (session('type'))
        <fb-alert type="{{ session('type') }}">{{ session('message') }}</fb-alert>
        @endif

        @if ($errors->any())
        <fb-alert type="danger">{{ $errors->first() }}</fb-alert>
        @endif

        <fb-input label="Current Password" name="password" type="password"></fb-input>
        <fb-input label="New Password" name="new_password" type="password"></fb-input>
        <fb-input label="Re-enter New Password" name="new_password_confirmation" type="password"></fb-input>

        <div class="flex justify-end">
            <fb-button>Submit</fb-button>
        </div>

    </form>
</div>

@endsection