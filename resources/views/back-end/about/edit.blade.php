@extends('layouts.back')

@section('content')
    <!-- About Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Edit About Information</h2>
                        <p>Update your personal information and profile details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Form -->
    <section class="section light-background">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-person"></i> Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('about.update', $about->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $about->first_name) }}" required>
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $about->last_name) }}" required>
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subtitle" class="form-label">Subtitle</label>
                                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                                   id="subtitle" name="subtitle" value="{{ old('subtitle', $about->subtitle) }}" required>
                                            @error('subtitle')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Birth Date</label>
                                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" 
                                                   id="birthdate" name="birthdate" value="{{ old('birthdate', $about->birthdate) }}" required>
                                            @error('birthdate')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                                   id="website" name="website" value="{{ old('website', $about->website) }}" required>
                                            @error('website')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $about->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                                   id="city" name="city" value="{{ old('city', $about->city) }}" required>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" 
                                                   id="age" name="age" value="{{ old('age', $about->age) }}" min="0" max="120" required>
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="degree" class="form-label">Degree</label>
                                            <input type="text" class="form-control @error('degree') is-invalid @enderror" 
                                                   id="degree" name="degree" value="{{ old('degree', $about->degree) }}" required>
                                            @error('degree')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', $about->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="freelance" class="form-label">Freelance Status</label>
                                            <select class="form-select @error('freelance') is-invalid @enderror" 
                                                    id="freelance" name="freelance" required>
                                                <option value="">Select Status</option>
                                                <option value="Available" {{ old('freelance', $about->freelance) == 'Available' ? 'selected' : '' }}>Available</option>
                                                <option value="Not Available" {{ old('freelance', $about->freelance) == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                                                <option value="Part-time" {{ old('freelance', $about->freelance) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                            </select>
                                            @error('freelance')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="subtext" class="form-label">About Text</label>
                                    <textarea class="form-control @error('subtext') is-invalid @enderror" 
                                              id="subtext" name="subtext" rows="5" required>{{ old('subtext', $about->subtext) }}</textarea>
                                    @error('subtext')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="/back" class="btn btn-secondary me-md-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update About</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Avatar Management -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-image"></i> Profile Avatar</h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset($about->avatar->image) }}" class="img-fluid rounded-circle mb-3" 
                                         alt="Current Avatar" style="width: 150px; height: 150px; object-fit: cover;">
                                    <p class="text-muted">Current Avatar</p>
                                </div>
                                <div class="col-md-8">
                                    <form action="{{ route('avatar.update', $about->avatar->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="mb-3">
                                            <label for="avatar_img" class="form-label">Upload New Avatar</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                   id="avatar_img" name="image" accept="image/*" required>
                                            <small class="form-text text-muted">Upload a new profile photo (JPG, PNG, GIF)</small>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary">Update Avatar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
