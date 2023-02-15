<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $query = DB::select("
            SELECT 
                id,
                firstname,
                lastname,
                convo.created_at, 
                role, 
                email 
            FROM (
                SELECT 
                    receiver_id, 
                    created_at 
                FROM messages 
                WHERE id IN (
                    SELECT MAX(id) 
                    FROM `messages` 
                    GROUP by sender_id
                ) 
                AND sender_id is null
                UNION
                SELECT 
                    sender_id, 
                    created_at 
                FROM messages 
                WHERE id IN (
                    SELECT MAX(id) 
                    FROM `messages` 
                    GROUP by sender_id
                ) 
                AND receiver_id is null
            ) as convo 
            INNER JOIN users 
            ON convo.receiver_id=users.id 
            order by convo.created_at DESC
        ");
        $users = User::hydrate($query);

        return view('pages.admin.messages.index', compact('users'));
    }

    public function show(User $user)
    {
        $messages = Message::where('receiver_id', $user->id)
            ->orWhere('sender_id', $user->id)
            ->get();
        return view('pages.admin.messages.show', compact('user', 'messages'));
    }

    public function create(User $user, Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        Message::create([
            'receiver_id' => $user->id,
            'content' => $request->content
        ]);

        return back();
    }
}
