@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">teacher Form</h2>

    <form action="{{ route('teacher.profileupdate') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input 
                type="hidden"
                name="teacher_id"
                value="{{ $teacher->id  }}"
                class="form-control"
                required>
        </div>
        
  <div class="mb-3">
            <label for="class" class="form-label">FatherName:</label>
            <input
            
                type="text"
                name="father_name"
                class="form-control"
                required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">MotherName:</label>
            <input
                type="text"
                name="mother_name"
                class="form-control"
                required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">class:</label>
            <input
                type="text"
                id="class"
                name="class"
                class="form-control"
                required>
        </div>

      
      

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
        </div>
    </form>
</div>
@endsection