@extends('backend.layout.master')

@section('content')
<div class="content-wrapper">

<div class="container mt-5">
    <h2 class="text-center mb-4">Student Form</h2>

    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
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
            <label for="class" class="form-label">Contact:</label>
            <input
                type="text"
                id="class"
                name="contact"
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
                name="adress"
                class="form-control"
                placeholder="Enter Adress"
                required>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="form-control"
                    placeholder="Enter image">
                
                    @error('image')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
    </form>
</div>
</div>


@endsection