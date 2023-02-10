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
        <easy-data-table :filter-options="filterOptions" :search-field="searchField" :search-value="searchValue" :headers="headers" :items="items" border-cell buttons-pagination>

            <template #header-status="header">
                <my-dropdown id="status-dropdown">
                    <template #label>
                        <div class="flex gap-1 items-center">
                            <filter-icon></filter-icon>
                            @{{ header.text }}
                        </div>
                    </template>
                    <div class="bg-white p-4 font-normal">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter Enroll Status</label>
                        <select v-model="statusFilter" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="all">All</option>
                            <option value="enrolled">Enrolled</option>
                            <option value="not_enrolled">Not Enrolled</option>
                        </select>
                    </div>
                </my-dropdown>
            </template>

            <template #header-grade="header">
                <my-dropdown id="status-dropdown">
                    <template #label>
                        <div class="flex gap-1 items-center">
                            <filter-icon></filter-icon>
                            @{{ header.text }}
                        </div>
                    </template>
                    <div class="bg-white p-4 font-normal">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter Enroll Status</label>
                        <select v-model="gradeFilter" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="all">All</option>
                            @foreach($grade_levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div>
                </my-dropdown>
            </template>

            <template #item-status="{ currentSection }">
                <div class="flex">
                    <badge v-if="currentSection">Enrolled</badge>
                    <badge v-else="currentSection" type="yellow">Not Enrolled</badge>
                </div>
            </template>
            <template #item-grade="{ currentSection }">
                <div v-if="currentSection === null" class="italic text-sm text-slate-500">N/A</div>
                <div v-else>
                    @{{ currentSection.grade_level.level }}
                </div>
            </template>
            <template #item-section="{ currentSection }">
                <div v-if="currentSection === null" class="italic text-sm text-slate-500">N/A</div>
                <div v-else>
                    @{{ currentSection.name }}
                </div>
            </template>
            <template #item-action="{ currentSection }">
                <div class="flex gap-2">
                    <a href="">Update</a>
                    <a href="" v-if="currentSection === null">Enroll</a>
                </div>
            </template>
        </easy-data-table>
    </div>

</div>
@endsection

@section('footer')
<script>
    window.students = @json($students)
</script>
@endsection