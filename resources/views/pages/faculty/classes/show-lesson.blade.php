@extends('layouts.faculty')

@section('active-navlink', 'classes')

@section('faculty-content')

<div class="bg-white max-w-lg mx-auto rounded shadow p-4 h-full">

    <h4 class="font-bold text-lg">{{ $lesson->title }}</h4>

    <hr class="my-4" />

    <div class="whitespace-pre-line">{{ $lesson->content }}</div>

</div>


@endsection