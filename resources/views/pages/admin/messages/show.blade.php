@extends('layouts.admin')

@section('admin-content')

<div class="absolute top-16 left-1 bottom-1 right-1">
    <div data-app="chat" class="max-w-lg w-full flex-grow bg-white mx-auto shadow h-full flex flex-col">
        <div class="p-4 text-2xl font-bold text-slate-900 border-b">
            {{ $user->fullname }}
        </div>

        <div class="flex-grow overflow-y-auto" ref="body">
            <div class=" p-4 flex flex-col gap-4">
                @foreach($messages as $message)
                @if ($message->receiver_id == null)
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

        <form method="POST" action='{{ url("/admin/messages/{$user->id}") }}' class="border-t p-4 flex gap-4">
            @csrf
            <fb-input name="content" required placeholder="Enter your message here" class="flex-grow"></fb-input>
            <fb-button>Send</fb-button>
        </form>

    </div>
</div>
@endsection