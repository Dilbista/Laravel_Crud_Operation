@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Assign Teachers List') }}
                        <h4>Name: {{ $data->name }}</h4>
                        <h4 class="text-end">
                            <form action="{{ route('assignteachers.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="student_id" value="{{ $data->id }}">

                                <div class="form-group">
                                    <label>Select Teacher</label>

                                    <select class="form-control" name="teacher_id">
                                        <option value="" selected disabled>--Select Teacher--</option>

                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-success mt-2">Assign Teacher</button>
                                </div>
                            </form>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Teacher Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </thead>
                            <tbody>
                                @foreach ($data->teacher as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data['contact'] }}</td>
                                        <td>{{ $data['address'] }}</td>

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