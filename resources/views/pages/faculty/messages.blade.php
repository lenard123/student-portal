@extends('layouts.faculty')

@section('active-navlink', 'messages')

@section('faculty-content')


<div data-app="chat" class="max-w-lg bg-white mx-auto shadow h-full flex flex-col">
    <div class="p-4 text-lg font-bold text-slate-900 border-b flex gap-2 items-center">
        <img src="{{ url('images/logo.png') }}" height="32" width="32">
        The Lord's Wisdom Academy of Caloocan
    </div>

    <div class="flex-grow overflow-y-auto" ref="body">
        <div class=" p-4 flex flex-col gap-4">
            @foreach($messages as $message)
            @if ($message->receiver_id != null)
            <div class="bg-slate-50 p-2 px-3 text=slate-800 rounded-lg max-w-[70%] self-start">
                {{ $message->content }}
            </div>
            @else
            <div class="bg-primary p-2 px-3 text-white rounded-lg max-w-[70%] self-end">
                {{ $message->content }}
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <form method="POST" action='{{ url("/faculty/messages") }}' class="border-t p-4 flex gap-4">
        @csrf
        <fb-input name="content" required placeholder="Enter your message here" class="flex-grow"></fb-input>
        <fb-button>Send</fb-button>
    </form>

</div>



@endsection