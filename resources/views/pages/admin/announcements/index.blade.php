@extends('layouts.admin')

@section('admin-content')

<div data-app="global">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Announcements</h1>

        <a href="{{ url('/admin/announcements/new') }}">
            <fb-button>Add Announcement</fb-button>
        </a>

    </div>

    <div class="bg-white shadow w-full mt-4">
        <fb-table hoverable>
            <table-head>
                <table-head-cell>Title</table-head-cell>
                <table-head-cell>Posted at</table-head-cell>
                <table-head-cell></table-head-cell>
            </table-head>

            <table-body>
                @foreach($announcements as $announcement)
                <table-row>
                    <table-cell>{{ $announcement->title }}</table-cell>
                    <table-cell>{{ $announcement->created_at->diffForHumans() }}</table-cell>
                    <table-cell>
                        <div class="flex gap-2 justify-end">
                            <a href='{{ url("/admin/announcements/{$announcement->id}") }}'>View</a>
                            <a href='{{ url("/admin/announcements/{$announcement->id}/edit") }}'>Update</a>
                        </div>
                    </table-cell>
                </table-row>
                @endforeach
            </table-body>

        </fb-table>
    </div>

</div>

@endsection