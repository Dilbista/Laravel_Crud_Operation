<div class="container mt-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="card shadow-lg border-0" style="max-width: 600px; margin: auto;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Add Product</h3>

            <form action="{{ route('product.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Write product details..." required></textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Save Product</button>
            </form>

        </div>
    </div>
</div>
