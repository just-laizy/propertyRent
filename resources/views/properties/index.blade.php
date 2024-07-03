@extends('layouts.app')

@section('title', 'Properties')

@section('content')
<div class="row">
    @foreach($properties as $property)
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="{{ $property->image_url }}" class="card-img-top" alt="{{ $property->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $property->title }}</h5>
                <p class="card-text">{{ Str::limit($property->description, 100) }}</p>
                <a href="{{ url('/properties', $property->id) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
