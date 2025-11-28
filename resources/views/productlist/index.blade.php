@extends('backend.layout.master')

@section('content')

<div class="container-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('student.alert') <!-- optional alert partial -->
            
            <div class="card">
                <div class="d-flex justify-content-end m-3">
                        <a href="{{ route('productlist.create') }}" class="btn btn-info btn-sm text-end">Add Product</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                        
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>

                                    <td class="text-center d-flex justify-content-center gap-1">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>

                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                                    Delete
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No products found.</td>
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
