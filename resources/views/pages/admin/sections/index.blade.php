@extends('layouts.admin')

@section('admin-content')
<div data-app="global">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Classes</h1>

        <a href="{{ url('/admin/classes/new?grade_level='.$grade_level) }}">
            <fb-button>Add Classes</fb-button>
        </a>
    </div>

    <div class=" bg-white shadow w-full mt-4">
        <fb-table hoverable>
            <table-head>
                <table-head-cell>Name</table-head-cell>
                <table-head-cell>Students</table-head-cell>
                <table-head-cell>Subjects</table-head-cell>
                <table-head-cell></table-head-cell>
            </table-head>

            <table-body>

                @if($sections->isEmpty())
                <table-row>
                    <table-cell colspan="4" class="py-6 italic text-slate-500">
                        <div class="text-center">No classes added yet in this Grade level</div>
                    </table-cell>
                </table-row>
                @endif

                @foreach($sections as $section)
                <table-row>
                    <table-cell>{{ $section->name }}</table-cell>
                    <table-cell>{{ $section->students_count }}</table-cell>
                    <table-cell>{{ $section->courses_count }}</table-cell>
                    <table-cell>
                        <div class="flex justify-end gap-2">
                            <a href='{{ url("/admin/classes/{$section->id}") }}'>View</a>
                        </div>
                    </table-cell>
                </table-row>
                @endforeach
            </table-body>

        </fb-table>
    </div>

</div>
@endsection