@extends('layouts.app')

@section('title', $property->title)

@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ $property->image_url }}" class="img-fluid" alt="{{ $property->title }}">
        <h1>{{ $property->title }}</h1>
        <p>{{ $property->description }}</p>
        <h3>Location: {{ $property->location }}</h3>
        <h4>Price: ${{ $property->price }}</h4>
    </div>
    <div class="col-md-4">
        <h3>Book this property</h3>
        <form action="{{ url('/bookings') }}" method="POST">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
</div>
@endsection
