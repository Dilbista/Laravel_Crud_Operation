@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Teacher Form</h2>

    <form action="{{ route('teachers.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Enter Name"
                required>
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact:</label>
            <input
                type="text"
                id="contact"
                name="contact"
                class="form-control"
                placeholder="Enter Contact"
                required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Role:</label>
            <select name="role" id="" class="form-control">
                <option value="" select disabled>--select Role--</option>
                @foreach ($role as $value )
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adress:</label>
            <input
                type="text"
                id="address"
                name="address"
                class="form-control"
                placeholder="Enter Adress"
                required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
        </div>
    </form>
</div>
@endsection