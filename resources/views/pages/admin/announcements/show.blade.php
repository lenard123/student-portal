@extends('layouts.admin')

@section('admin-content')

<div>
    <div class="bg-white w-full shadow-lg rounded-lg p-4 max-w-screen-md mx-auto">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $announcement->title }}</h5>
        <hr class="my-4" />

        <p class="p-6 text-md whitespace-pre-line">{{ trim($announcement->content) }}</p>
    </div>
</div>

@endsection