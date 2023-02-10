@extends('layouts.admin')

@section('title', 'Manage Faculty')

@section('admin-content')

<div data-app="global">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Faculty</h1>

        <fb-button>Add Faculty</fb-button>
    </div>

    <div class="bg-white shadow w-full mt-4">
        <fb-table class="w-full" striped hoverable>
            <table-head>
                <table-head-cell>Name</table-head-cell>
                <table-head-cell>Status</table-head-cell>
                <table-head-cell><span class="sr-only">Edit</span></table-head-cell>
            </table-head>
            <table-body>
                @foreach($faculties as $faculty)
                <table-row>
                    <table-cell class="flex items-center">
                        <img class="w-10 h-10 rounded-full" src="{{ $faculty->user->avatar }}" alt="Jese image">
                        <div class="pl-3 text-left">
                            <div class="text-base font-semibold">{{ $faculty->user->fullname }}</div>
                            <div class="font-normal text-gray-500">{{ $faculty->user->email }}</div>
                        </div>
                    </table-cell>

                    <table-cell>
                        <div class="flex">
                            @if($faculty->status === 'pending')
                            <badge type="yellow">Pending</badge>
                            @elseif($faculty->status === 'active')
                            <badge type="green">Active</badge>
                            @endif
                        </div>
                    </table-cell>

                    <table-cell>
                        <div class="flex gap-4 justify-end">
                            <a href="#">Edit</a>
                            <a href="#">View Classes</a>
                        </div>
                    </table-cell>

                </table-row>
                @endforeach
            </table-body>
        </fb-table>
    </div>

</div>

@endsection