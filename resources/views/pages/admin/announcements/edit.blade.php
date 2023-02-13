@extends('layouts.admin')

@section('admin-content')

<div data-app="global">
    <div class="bg-white w-full shadow-lg rounded-lg p-4 max-w-screen-md mx-auto">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update Announcement</h5>
        <hr class="my-4" />

        <form method="POST" action='{{ url("/admin/announcements/{$announcement->id}") }}'>
            @csrf
            @method("PUT")
            <div class="grid gap-4">

                <fb-input model-value="{{ $announcement->title }}" label="Title" name="title"></fb-input>

                <div class="mt-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea name="content" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $announcement->content }}</textarea>
                </div>

                <div class="flex justify-end">
                    <fb-button>Submit</fb-button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection