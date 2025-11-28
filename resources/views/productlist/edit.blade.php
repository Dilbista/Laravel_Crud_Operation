<div class="container mt-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="card shadow-lg border-0" style="max-width: 600px; margin: auto;">
        
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Edit Product</h3>

            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        value="{{ $product->name }}" 
                        required
                    >
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea 
                        class="form-control" 
                        name="description" 
                        rows="4" 
                        required
                    >{{ $product->description }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Price</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="price" 
                        value="{{ $product->price }}" 
                        required
                    >
                </div>

                <button type="submit" class="btn btn-success w-100">Update Product</button>
            </form>

        </div>
    </div>
</div>
