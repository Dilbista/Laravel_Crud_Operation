@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teachers') }}
                    <!-- Button trigger modal -->

                    <h4 class="text-end">
                        <a href="{{ route('teachers.create') }}" class="btn btn-info">Create Teacher</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>FatherName</th>
                                <th>MotherName</th>
                                <th>Class</th>
                                <th>Assign Students</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data['contact'] }}</td>
                                <td>{{ $data['address'] }}</td>
                                <td>{{ $data->profile->fathername ?? '-' }}</td>
                                <td>{{ $data->profile->mothername ?? '-' }}</td>
                                <td>{{ $data->profile->class ?? '-' }}</td>


                                <td>
                                    @foreach ($data->student as $item)
                                    <span>{{ $item->name }}</span> <br>
                                    @endforeach
                                </td>

                                <td class="text-center">
                                     @can('edit_user')
                                    <a href="{{ route('teacher.edit',$data->id) }}" class="btn btn-info">Edit</a>

                                    @endcan
                                    <a href="{{ route('teacher.profile' ,$data->id) }}" class="btn btn-info"> profile</a>


                                    <form action="{{ route('teacher.delete',$data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('delete_user')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
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