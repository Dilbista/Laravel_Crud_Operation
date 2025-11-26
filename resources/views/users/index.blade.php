@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}
                    <h4 class="text-end">
                        <a href="{{ route('users.create') }}" class="btn btn-info">Create User</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @if($data->getRoleNames()->isNotEmpty())
                                            {{ $data->getRoleNames()->join(', ') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('users.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
