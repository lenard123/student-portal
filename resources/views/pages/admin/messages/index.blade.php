@extends('layouts.admin')

@section('admin-content')

<div data-app="global">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Subjects</h1>

        <fb-button>Add Subject</fb-button>
    </div>

    <div class="bg-white shadow w-full mt-4">
        <fb-table hoverable>
            <table-head>
                <table-head-cell>Name</table-head-cell>
                <table-head-cell></table-head-cell>
            </table-head>

            <table-body>
                @foreach($users as $user)
                <table-row>
                    <table-cell>
                        <a href='{{ url("/admin/messages/{$user->id}") }}' class="flex items-center">
                            <img class="w-10 h-10 rounded-full" src="{{ $user->avatar }}" alt="Jese image">
                            <div class="pl-3 text-left">
                                <div class="text-base font-semibold">{{ $user->fullname }}</div>
                                <div class="font-normal text-gray-500 capitalize">{{ $user->role }}</div>
                            </div>
                        </a>
                    </table-cell>
                    <table-cell>
                        {{ $user->created_at->diffForHumans() }}
                    </table-cell>
                </table-row>
                @endforeach
            </table-body>

        </fb-table>
    </div>

</div>

@endsection