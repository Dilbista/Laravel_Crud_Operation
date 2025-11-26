@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Student Form</h2>

    <form action="{{ route('student.update',$student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ $student->name }}"
                class="form-control"
                placeholder="Enter Name"
                required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Contact:</label>
            <input
                type="text"
                id="class"
                name="contact"
                value="{{ $student->contact }}"
                class="form-control"
                placeholder="Enter Contact"
                required>
                  @error('contact')
            <p style="color: red;"> {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rollno" class="form-label">Adress:</label>
            <input
                type="text"
                id="rollno"
                value="{{ $student->adress }}"
                name="adress"
                class="form-control"
                placeholder="Enter Adress"
                required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image:</label>
            <input
                type="file"
                id="image"
                name="image"
                class="form-control"
                placeholder="Enter image"
                >
                                    <img src="{{ asset('uplod/image/' .$student->image) }}" alt="" width="105px" class="rounded-circle">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
        </div>
    </form>
</div>
@endsection