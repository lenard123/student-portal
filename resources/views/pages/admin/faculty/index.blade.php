@extends('layouts.admin')

@section('title', 'Manage Faculty')

@section('admin-content')

<div data-app="global">
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manage Faculty</h1>

        <fb-button>Add School Year</fb-button>
    </div>

    <div class="bg-white shadow w-full mt-4">
        <fb-table class="w-full" striped>
            <table-head>
                <table-head-cell>Product name</table-head-cell>
                <table-head-cell>Color</table-head-cell>
                <table-head-cell>Category</table-head-cell>
                <table-head-cell>Price</table-head-cell>
                <table-head-cell><span class="sr-only">Edit</span></table-head-cell>
            </table-head>
            <table-body>
                <table-row>
                    <table-cell>Apple MacBook Pro 17"</table-cell>
                    <table-cell>Sliver</table-cell>
                    <table-cell>Laptop</table-cell>
                    <table-cell>$2999</table-cell>
                    <table-cell>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </table-cell>
                </table-row>
                <table-row>
                    <table-cell>Microsoft Surface Pro</table-cell>
                    <table-cell>White</table-cell>
                    <table-cell>Laptop PC</table-cell>
                    <table-cell>$1999</table-cell>
                    <table-cell>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </table-cell>
                </table-row>
                <table-row>
                    <table-cell>Magic Mouse 2</table-cell>
                    <table-cell>Black</table-cell>
                    <table-cell>Accessories</table-cell>
                    <table-cell>$99</table-cell>
                    <table-cell>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </table-cell>
                </table-row>
            </table-body>
        </fb-table>
    </div>

</div>

@endsection