<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('receiver_id', auth()->id())
            ->orWhere('sender_id', auth()->id())
            ->get();
        return view('pages.student.messages', compact('messages'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'content' => $request->content
        ]);

        return back();
    }
}
