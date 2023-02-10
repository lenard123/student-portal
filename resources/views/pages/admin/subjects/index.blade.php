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
                @foreach($subjects as $subject)
                <table-row>
                    <table-cell>{{ $subject->name }}</table-cell>
                    <table-cell></table-cell>
                </table-row>
                @endforeach
            </table-body>

        </fb-table>
    </div>

</div>

@endsection