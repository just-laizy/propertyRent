@extends('layouts.app')

@section('title', 'Book a Property')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Book a Property</h1>
        <form action="{{ url('/bookings') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="property_id" class="form-label">Property</label>
                <select class="form-select" id="property_id" name="property_id" required>
                    @foreach($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->title }} - ${{ $property->price }}</option>
                    @endforeach
                </select>
            </div>
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
