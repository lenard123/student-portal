@extends('layouts.admin')

@section('admin-content')

<div data-app="studentEnroll">
    <div class="bg-white w-full shadow-lg rounded-lg p-4 max-w-screen-md mx-auto">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enroll Student</h5>
        <hr class="my-4" />

        <form class="grid gap-4">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade Level</label>
                <select v-model="selectedLevel" name="grade_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected :value="null">Choose a Grade Level</option>
                    <option v-for="level in grade_levels" :key="level.id" :value="level.id">@{{ level.level }}</option>
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade Level</label>
                <select v-model="selectedSection" name="grade_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected :value="null">Choose a Section</option>
                    <option v-for="section in sections" :key="section.id" :value="section.id">@{{ section.name }}</option>
                </select>
            </div>
        </form>

        <div v-if="selectedSection !== null">
            <hr class="my-4" />

            <fb-table>
                <table-head>
                    <table-head-cell>Name</table-head-cell>
                </table-head>
                <table-body>
                    <table-row>

                    </table-row>
                </table-body>
            </fb-table>
        </div>

    </div>

</div>

@endsection

@section('footer')
<script>
    window.grade_levels = @json($grade_levels)
</script>
@endsection('footer')