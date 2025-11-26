@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('student.alert')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Students') }}</span>
                    @can('create_user')
                        <a href="{{ route('create') }}" class="btn btn-info btn-sm">Create Student</a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Father Name</th>
                                <th>Class</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($student as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->contact }}</td>
                                    <td>{{ $data->adress }}</td>
                                    <td>{{ $data->profile->fathername ?? '-' }}</td>
                                    <td>{{ $data->profile->class ?? '-' }}</td>
                                    <td>
                                        @if($data->image)
                                            <img src="{{ asset('uplod/image/' .$data->image) }}" 
                                                 alt="Student Image" width="60" class="rounded-circle">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-center d-flex justify-content-center gap-1">
                                        @role('Super Admin|Admin')
                                            <a href="{{ route('assign.teachers', $data->id) }}" class="btn btn-secondary btn-sm">Assign Teacher</a>
                                        @endrole

                                        @can('edit_user')
                                            <a href="{{ route('student.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        @endcan

                                        <a href="{{ route('student.fees', $data->id) }}" class="btn btn-warning btn-sm">Fees</a>
                                        <a href="{{ route('student.profile', $data->id) }}" class="btn btn-success btn-sm">Profile</a>

                                        @can('delete_user')
                                            <form action="{{ route('student.delete', $data->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this student?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
