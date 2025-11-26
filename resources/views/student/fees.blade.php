@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- alert message show -->
                <!-- @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif -->
                @include('student.alert')


                <div class="card-header">{{ __('Student fees') }}</div>
                <h4 class="text-end">

                    <h4 class="mt-2 p-2 ">Name:{{ $student->name }}</h4>
                    <div class="text-end m-2"> <a href="{{ route('pay.fees',$student->id) }}" class="btn btn-info text-end">pay Fees</a>
                    </div>
                    <hr>

                </h4>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Amount</th>
                                <th>date</th>
                                <th>message</th>

                                <th class="text-center"> Action</th>
                            </tr>
                        <tbody>
                            @foreach ($student->fees as $data )
                            <tr>
                                <td>{{ $loop->iteration  }}</td>
                                <td>{{ $data->amount }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->message }}</td>



                                @endforeach
                            </tr>
                        </tbody>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection