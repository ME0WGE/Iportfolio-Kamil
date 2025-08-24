@extends('layouts.back')

@section('content')
    <!-- Contact Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Edit Contact Information</h2>
                        <p>Update your contact details and address information</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="section light-background">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-geo-alt"></i> Contact Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="street" class="form-label">Street</label>
                                            <input type="text" class="form-control @error('street') is-invalid @enderror" 
                                                   id="street" name="street" value="{{ old('street', $contact->street) }}" required>
                                            @error('street')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="number" class="form-label">Number</label>
                                            <input type="text" class="form-control @error('number') is-invalid @enderror" 
                                                   id="number" name="number" value="{{ old('number', $contact->number) }}" required>
                                            @error('number')
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
                                                   id="city" name="city" value="{{ old('city', $contact->city) }}" required>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="zip" class="form-label">ZIP Code</label>
                                            <input type="text" class="form-control @error('zip') is-invalid @enderror" 
                                                   id="zip" name="zip" value="{{ old('zip', $contact->zip) }}" required>
                                            @error('zip')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="/back" class="btn btn-secondary me-md-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update Contact</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-eye"></i> Preview</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-geo-alt text-primary me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="mb-1">Address</h6>
                                            <p class="mb-0">{{ $contact->street }} {{ $contact->number }}, {{ $contact->city }} {{ $contact->zip }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-telephone text-primary me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="mb-1">Phone</h6>
                                            <p class="mb-0">{{ $contact->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <i class="bi bi-envelope text-primary me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="mb-1">Email</h6>
                                            <p class="mb-0">{{ $contact->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
