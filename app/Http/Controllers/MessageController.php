<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $receivedMessages = auth()->user()->receivedMessages()->latest()->get();
        $users = User::where('id', '!=', auth()->id())->get(); // Exclude logged-in user

        return view('messages.index', compact('receivedMessages', 'users'));
    }

    public function store(Request $request)
    {
        // Example: Validation
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        // Example: Send a new message
        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
