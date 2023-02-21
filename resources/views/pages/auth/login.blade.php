@extends('layouts.main')

@section('title', 'Login')

@section('content')

<x-page-header></x-page-header>

<div data-app="passwordToggler" class="bg-white shadow max-w-lg mx-auto rounded mt-8">
    <div class="p-4 font-bold tracking-tight text-2xl text-gray-900 border-b">
        Login
    </div>
    <div class="p-6">
        <form method="POST" action="{{ url('/login') }}">

            @csrf

            <Alert message="{{ json_encode(session('message')) }}"></Alert>

            <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>

            <div class="flex justify-between mb-6">
                <div class="flex items-center">
                    <input v-model="showPassword" id="show_password" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="show_password" class="cursor-pointer select-none ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show Password</label>
                </div>

                <!-- <div>
                    <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
                </div> -->
            </div>

            <button class="block w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log in</button>

        </form>

    </div>

</div>

<div class="text-center py-2">
    <p>Not a member? <a href="{{ url('/register') }}" class="text-blue-500 hover:underline">Register here</a></p>
</div>


@endsection