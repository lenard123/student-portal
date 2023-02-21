@extends('layouts.student')

@section('active-navlink', 'profile')

@section('student-content')

<div class="flex gap-4">
    <div>
        <img class="h-32 w-32 rounded-full" src="{{ url('/images/user_default.png' ) }}" />
    </div>
    <div class="flex flex-col py-2">
        <div class="text-3xl font-bold text-slate-800">{{ auth()->user()->fullname }}</div>
        <div class="font-semibold text-xl text-blue-500">#{{ auth()->user()->student->student_id }}</div>

        <div class="mt-4 text-slate-700">
            <div>
                Status: <span class="ml-2 capitalize italic text-slate-600 text-sm">N/A</span>
            </div>
            <div>
                Department: <span class="font-bold ml-2 capitalize">{{ auth()->user()->student->department }}</span>
            </div>
            <div>
                Grade Level: <span class="ml-2 capitalize italic text-slate-600 text-sm">N/A</span>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <div class="flex justify-between">
        <h2 class="text-xl font-bold tracking-wide">Personal Info</h2>
        <a href="{{ url('/profile/edit') }}">Edit</a>
    </div>
    <hr class="my-2" />
    <div class="grid grid-cols-1 md:grid-cols-2 text-sm gap-y-2">
        <div class="grid grid-cols-2  gap-2 gap-x-4 text-slate-600  mx-auto">

            <div class="sm:text-right">Civil Status: </div>
            <div>{{ auth()->user()->student->civil_status }}</div>

            <div class="sm:text-right">Date of Birth: </div>
            <div>{{ auth()->user()->student->birthday }}</div>

            <div class="sm:text-right">Nationality: </div>
            <div>{{ auth()->user()->student->nationality }}</div>

            <div class="sm:text-right">Religion: </div>
            <div>{{ auth()->user()->student->religion }}</div>

            <div class="sm:text-right">Email: </div>
            <div>{{ auth()->user()->email }}</div>

        </div>
        <div class="grid grid-cols-2 gap-2 gap-x-4 text-slate-600">
            <div class="sm:text-right">Gender: </div>
            <div>{{ auth()->user()->student->gender }}</div>

            <div class="sm:text-right">With Disability: </div>
            <div>{{ auth()->user()->student->has_disability != null && auth()->user()->student->has_disability ? 'Yes' : 'None' }}</div>

            <div class="sm:text-right">Height: </div>
            <div>{{ auth()->user()->student->height }}</div>

            <div class="sm:text-right">Weight: </div>
            <div>{{ auth()->user()->student->weight }}</div>

            <div class="sm:text-right">Mobile Phone: </div>
            <div>{{ auth()->user()->student->contact_number }}</div>

        </div>
    </div>
</div>
<!-- 
<div class="mt-4">
    <h2 class="text-xl font-bold tracking-wide">Address</h2>
    <hr class="my-2" />
    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 text-sm">
        <div class="grid grid-cols-2 gap-2 gap-x-4 text-slate-600">

            <div class="sm:text-right">Country: </div>
            <div>Philippines</div>

            <div class="sm:text-right">Region: </div>
            <div>National Capital Region</div>

            <div class="sm:text-right">Province: </div>
            <div></div>

            <div class="sm:text-right">Town/City: </div>
            <div></div>


        </div>
        <div class="grid grid-cols-2 gap-2 gap-x-4 text-slate-600">
            <div class="sm:text-right">Barangay: </div>
            <div></div>

            <div class="sm:text-right">Street: </div>
            <div></div>

            <div class="sm:text-right">Residence: </div>
            <div></div>

            <div class="sm:text-right">ZIP Code: </div>
            <div></div>

        </div>
    </div>
</div> -->

@endsection