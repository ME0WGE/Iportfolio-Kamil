@extends('layouts.back')

@section('content')
    <!-- Testimonials Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Testimonials Management</h2>
                        <p>Manage your client testimonials and reviews</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add New Testimonial -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Testimonial</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Client Photo</label>
                                            <input type="file" class="form-control @error('img') is-invalid @enderror" 
                                                   id="img" name="img" accept="image/*" required>
                                            <small class="form-text text-muted">Upload client photo (JPG, PNG)</small>
                                            @error('img')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Client Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                                   id="position" name="position" value="{{ old('position') }}" required>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="bi bi-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Testimonial</label>
                                            <textarea class="form-control @error('comment') is-invalid @enderror" 
                                                      id="comment" name="comment" rows="4" required>{{ old('comment') }}</textarea>
                                            @error('comment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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

    <!-- Testimonials List -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-list"></i> Current Testimonials</h5>
                        </div>
                        <div class="card-body">
                            @if($testimonials->count() > 0)
                                <div class="row gy-4">
                                    @foreach($testimonials as $testimonial)
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start mb-3">
                                                    <img src="{{ asset($testimonial->img) }}" class="rounded-circle me-3" 
                                                         alt="{{ $testimonial->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="card-title mb-1">{{ $testimonial->name }}</h6>
                                                        <small class="text-muted">{{ $testimonial->position }}</small>
                                                    </div>
                                                </div>
                                                <blockquote class="blockquote mb-3">
                                                    <p class="mb-0">{{ Str::limit($testimonial->comment, 150) }}</p>
                                                </blockquote>
                                                <div class="btn-group w-100" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editTestimonial{{ $testimonial->id }}">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editTestimonial{{ $testimonial->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Testimonial</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Current Photo</label>
                                                                    <img src="{{ asset($testimonial->img) }}" class="img-fluid rounded" alt="Current Photo" style="max-height: 150px;">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="img{{ $testimonial->id }}" class="form-label">New Photo (Optional)</label>
                                                                    <input type="file" class="form-control" id="img{{ $testimonial->id }}" 
                                                                           name="img" accept="image/*">
                                                                    <small class="form-text text-muted">Leave empty to keep current photo</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="name{{ $testimonial->id }}" class="form-label">Client Name</label>
                                                                            <input type="text" class="form-control" id="name{{ $testimonial->id }}" 
                                                                                   name="name" value="{{ $testimonial->name }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="position{{ $testimonial->id }}" class="form-label">Position</label>
                                                                            <input type="text" class="form-control" id="position{{ $testimonial->id }}" 
                                                                                   name="position" value="{{ $testimonial->position }}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="comment{{ $testimonial->id }}" class="form-label">Testimonial</label>
                                                                    <textarea class="form-control" id="comment{{ $testimonial->id }}" 
                                                                              name="comment" rows="4" required>{{ $testimonial->comment }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Testimonial</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-chat-quote" style="font-size: 3rem; color: var(--accent-color);"></i>
                                    <h5 class="mt-3">No Testimonials Added Yet</h5>
                                    <p class="text-muted">Start by adding your first testimonial above.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
