@extends('layouts.back')

@section('content')
    <!-- Services Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Services Management</h2>
                        <p>Manage your services and their descriptions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add New Service -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Service</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="icon" class="form-label">Icon Class</label>
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                                   id="icon" name="icon" value="{{ old('icon') }}" 
                                                   placeholder="bi bi-code-slash" required>
                                            <small class="form-text text-muted">Use Bootstrap Icons classes (e.g., bi bi-code-slash)</small>
                                            @error('icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Service Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Description</label>
                                            <textarea class="form-control @error('text') is-invalid @enderror" 
                                                      id="text" name="text" rows="3" required>{{ old('text') }}</textarea>
                                            @error('text')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="bi bi-plus"></i> Add
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

    <!-- Services List -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-list"></i> Current Services</h5>
                        </div>
                        <div class="card-body">
                            @if($services->count() > 0)
                                <div class="row gy-4">
                                    @foreach($services as $service)
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card h-100 border-primary">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="icon me-3" style="width: 60px; height: 60px; background: color-mix(in srgb, var(--accent-color), transparent 90%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                        <i class="{{ $service->icon }}" style="font-size: 24px; color: var(--accent-color);"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title">{{ $service->title }}</h5>
                                                        <p class="card-text">{{ $service->text }}</p>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#editService{{ $service->id }}">
                                                                <i class="bi bi-pencil"></i> Edit
                                                            </button>
                                                            <form action="{{ route('services.destroy', $service->id) }}" 
                                                                  method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                        onclick="return confirm('Are you sure you want to delete this service?')">
                                                                    <i class="bi bi-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editService{{ $service->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('services.update', $service->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="icon{{ $service->id }}" class="form-label">Icon Class</label>
                                                                    <input type="text" class="form-control" id="icon{{ $service->id }}" 
                                                                           name="icon" value="{{ $service->icon }}" required>
                                                                    <small class="form-text text-muted">Use Bootstrap Icons classes</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="mb-3">
                                                                    <label for="title{{ $service->id }}" class="form-label">Service Title</label>
                                                                    <input type="text" class="form-control" id="title{{ $service->id }}" 
                                                                           name="title" value="{{ $service->title }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="text{{ $service->id }}" class="form-label">Description</label>
                                                            <textarea class="form-control" id="text{{ $service->id }}" 
                                                                      name="text" rows="4" required>{{ $service->text }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Service</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-hdd-stack" style="font-size: 3rem; color: var(--accent-color);"></i>
                                    <h5 class="mt-3">No Services Added Yet</h5>
                                    <p class="text-muted">Start by adding your first service above.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
