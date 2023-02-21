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
    <h2 class="text-xl font-bold tracking-wide">Personal Info</h2>
    <hr class="my-2" />
    <div class="grid grid-cols-1 md:grid-cols-2 text-sm gap-y-2">
        <div class="grid grid-cols-2  gap-2 gap-x-4 text-slate-600  mx-auto">

            <div class="sm:text-right">Civil Status: </div>
            <div>Single</div>

            <div class="sm:text-right">Date of Birth: </div>
            <div>July 27, 2001</div>

            <div class="sm:text-right">Nationality: </div>
            <div>Filipino</div>

            <div class="sm:text-right">Religion: </div>
            <div>Roman Catholic</div>

            <div class="sm:text-right">Corporate Email: </div>
            <div>lenard.mangayayam@gmail.com</div>

        </div>
        <div class="grid grid-cols-2 gap-2 gap-x-4 text-slate-600">
            <div class="sm:text-right">Gender: </div>
            <div>Male</div>

            <div class="sm:text-right">With Disability: </div>
            <div>None</div>

            <div class="sm:text-right">Height: </div>
            <div>5'6ft</div>

            <div class="sm:text-right">Weight: </div>
            <div>100kg</div>

            <div class="sm:text-right">Mobile Phone: </div>
            <div>+6393 8437 9875</div>

        </div>
    </div>
</div>

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
</div>

@endsection