@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Inbox</h1>
            <ul class="list-group">
                @forelse($receivedMessages as $message)
                    <li class="list-group-item">
                        <h5 class="mb-1">{{ $message->sender->name }}</h5>
                        <p class="mb-1">{{ $message->message }}</p>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </li>
                @empty
                    <li class="list-group-item">No messages found.</li>
                @endforelse
            </ul>
        </div>
        <div class="col-md-6">
            <h1>Compose Message</h1>
            <form action="{{ url('/messages') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="receiver_id" class="form-label">To</label>
                    <select class="form-select" id="receiver_id" name="receiver_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
