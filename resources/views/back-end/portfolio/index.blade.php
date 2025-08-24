@extends('layouts.back')

@section('content')
    <!-- Portfolio Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Portfolio Management</h2>
                        <p>Manage your portfolio items and their categories</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add New Portfolio Item -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Portfolio Item</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Image</label>
                                            <input type="file" class="form-control @error('img') is-invalid @enderror" 
                                                   id="img" name="img" accept="image/*" required>
                                            <small class="form-text text-muted">Upload a portfolio image (JPG, PNG, GIF)</small>
                                            @error('img')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="filter" class="form-label">Category</label>
                                            <select class="form-select @error('filter') is-invalid @enderror" 
                                                    id="filter" name="filter" required>
                                                <option value="">Select Category</option>
                                                <option value="app" {{ old('filter') == 'app' ? 'selected' : '' }}>App</option>
                                                <option value="product" {{ old('filter') == 'product' ? 'selected' : '' }}>Product</option>
                                                <option value="branding" {{ old('filter') == 'branding' ? 'selected' : '' }}>Branding</option>
                                                <option value="books" {{ old('filter') == 'books' ? 'selected' : '' }}>Books</option>
                                            </select>
                                            @error('filter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="bi bi-plus"></i> Add Item
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio List -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-list"></i> Current Portfolio Items</h5>
                        </div>
                        <div class="card-body">
                            @if($portfolios->count() > 0)
                                <div class="row gy-4">
                                    @foreach($portfolios as $portfolio)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card h-100">
                                            <img src="{{ asset($portfolio->img) }}" class="card-img-top" alt="{{ $portfolio->filter }}" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <span class="badge bg-primary">{{ ucfirst($portfolio->filter) }}</span>
                                                    <small class="text-muted">#{{ $portfolio->id }}</small>
                                                </div>
                                                <h6 class="card-title">{{ ucfirst($portfolio->filter) }} Project</h6>
                                                <div class="btn-group w-100" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editPortfolio{{ $portfolio->id }}">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <form action="{{ route('portfolio.destroy', $portfolio->id) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                onclick="return confirm('Are you sure you want to delete this portfolio item?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editPortfolio{{ $portfolio->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Portfolio Item</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Current Image</label>
                                                            <img src="{{ asset($portfolio->img) }}" class="img-fluid rounded" alt="Current Image" style="max-height: 150px;">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img{{ $portfolio->id }}" class="form-label">New Image (Optional)</label>
                                                            <input type="file" class="form-control" id="img{{ $portfolio->id }}" 
                                                                   name="img" accept="image/*">
                                                            <small class="form-text text-muted">Leave empty to keep current image</small>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="filter{{ $portfolio->id }}" class="form-label">Category</label>
                                                            <select class="form-select" id="filter{{ $portfolio->id }}" name="filter" required>
                                                                <option value="app" {{ $portfolio->filter == 'app' ? 'selected' : '' }}>App</option>
                                                                <option value="product" {{ $portfolio->filter == 'product' ? 'selected' : '' }}>Product</option>
                                                                <option value="branding" {{ $portfolio->filter == 'branding' ? 'selected' : '' }}>Branding</option>
                                                                <option value="books" {{ $portfolio->filter == 'books' ? 'selected' : '' }}>Books</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Item</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-images" style="font-size: 3rem; color: var(--accent-color);"></i>
                                    <h5 class="mt-3">No Portfolio Items Added Yet</h5>
                                    <p class="text-muted">Start by adding your first portfolio item above.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
