<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run()
    {
        Message::create([
            'sender_id' => User::first()->id,
            'receiver_id' => User::skip(1)->first()->id,
            'message' => 'Hello, is the property available?',
        ]);
    }
}

