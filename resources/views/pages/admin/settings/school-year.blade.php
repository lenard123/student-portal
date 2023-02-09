@extends('layouts.admin')

@section('admin-content')

<div data-app="adminSettingsSchoolYear">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">School Year</h1>

        <fb-button @click="openAddSchoolYearModal">Add School Year</fb-button>
    </div>

    <div class="flex flex-col mt-4">

        <div class="overflow-x-auto">

            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>

                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Name
                                </th>

                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($school_years as $school_year)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $school_year->school_year }}</div>
                                </td>
                                <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        @if ($school_year->isActive())
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                        @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-slate-400 mr-2"></div> Inactive
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4">
                                    <form method="POST" class="space-x-2 whitespace-nowrap" v-cloak>
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="school_year_id" value="{{ $school_year->id }}" />

                                        <button type="button" data-modal-toggle="edit-user-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            Edit
                                        </button>

                                        <fb-button color="green" :disabled='@json($school_year->isActive())'>Activate</fb-button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            @if ($school_years->isEmpty())
                            <tr>
                                <td colspan="3">
                                    <div class="mx-auto text-center py-4 text-slate-600 italic">No data available</div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <add-school-year-modal :close-modal="closeAddSchoolYearModal" :is-open="isAddSchoolYearModalOpen"></add-school-year-modal>

</div>
@endsection