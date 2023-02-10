@extends('layouts.admin')

@section('admin-content')
<div data-app="student">
    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Students</h1>

    <div class="flex justify-between mt-4">
        <div class="flex items-center">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mr-2">Search by: </label>
            <select v-model="searchField" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg border-r-none outline-r-none focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="student_id">Student ID</option>
                <option value="user.firstname">Firstname</option>
                <option value="user.lastname">Lastname</option>
                <option value="user.middlename">Middlename</option>
            </select>
            <fb-input v-model="searchValue" class="rounded-l-none" placeholder="Search Student" />
        </div>
    </div>

    <div class="mt-4">
        <easy-data-table :search-field="searchField" :search-value="searchValue" :headers="headers" :items="items" border-cell buttons-pagination></easy-data-yable>
    </div>

</div>
@endsection

@section('footer')
<script>
    window.students = @json($students)
</script>
@endsection