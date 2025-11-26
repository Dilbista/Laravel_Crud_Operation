@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Student Form</h2>

    <form action="{{ route('fees.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Amount</label>
            <input
                type="text"

                name="amount"
                class="form-control"
                placeholder="Enter Name"
                required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">date</label>
            <input type="date" name="date">
        </div>

        <div class="mb-3">
            <label for="rollno" class="form-label">message:</label>
            <textarea name="msg"></textarea>


            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
    </form>
</div>
@endsection