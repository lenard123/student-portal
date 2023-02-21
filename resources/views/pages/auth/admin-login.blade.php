@extends('layouts.main')

@section('title', 'Admin Login')

@section('content')

<!-- component -->

<div data-app="global" class="font-mono bg-gray-400 min-h-screen py-12">
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Welcome Back!</h3>
                    <form method="POST" action="{{ url('/admin/login') }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">

                        @csrf
                        @if (session('message'))
                        <fb-alert type="danger" class="mb-4">
                            {{ session('message')['message'] }}
                        </fb-alert>
                        @endif

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                Email
                            </label>
                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="email" type="email" placeholder="Enter your email here" />
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                Password
                            </label>
                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Enter your password here" />
                        </div>
                        <div class="mb-4">
                            <input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
                            <label class="text-sm" for="checkbox_id">
                                Remember Me
                            </label>
                        </div>
                        <div class="mb-6 text-center">
                            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
                                Sign In
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <!-- <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                                Forgot Password?
                            </a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection