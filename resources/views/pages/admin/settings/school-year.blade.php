@extends('layouts.admin')

@section('admin-content')

<div data-app="adminSettingsSchoolYear">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">School Year</h1>

        <fb-button @click="openAddSchoolYearModal">Add School Year</fb-button>
    </div>

    <fb-table>
        <table-head></table-head>
        <table-body></table-body>
    </fb-table>

    <add-school-year-modal :close-modal="closeAddSchoolYearModal" :is-open="isAddSchoolYearModalOpen"></add-school-year-modal>

</div>
@endsection