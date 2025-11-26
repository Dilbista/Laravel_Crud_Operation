
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Teacher edit</h2>
    <form action="{{ route('teacher.update', $teacher->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ $teacher->name }}"
                class="form-control"
                placeholder="Enter Name"
                required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Contact:</label>
            <input
                type="text"
                id="Contact"
                name="contact"
                value="{{ $teacher->contact }}"
                class="form-control"
                placeholder="Enter Contact"
                required>
        </div>
        <div class="mb-3">
            <label for="rollno" class="form-label">Adress:</label>
            <input
                type="text"
                id="Address"
                value="{{ $teacher->address }}"
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
