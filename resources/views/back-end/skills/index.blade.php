@extends('layouts.back')

@section('content')
    <!-- Skills Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Skills Management</h2>
                        <p>Manage your skills and their proficiency levels</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add New Skill -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Skill</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('skills.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="skill" class="form-label">Skill Name</label>
                                            <input type="text" class="form-control @error('skill') is-invalid @enderror" 
                                                   id="skill" name="skill" value="{{ old('skill') }}" required>
                                            @error('skill')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="pourcentage" class="form-label">Percentage</label>
                                            <input type="number" class="form-control @error('pourcentage') is-invalid @enderror" 
                                                   id="pourcentage" name="pourcentage" value="{{ old('pourcentage') }}" 
                                                   min="0" max="100" required>
                                            @error('pourcentage')
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

    <!-- Skills List -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="bi bi-list"></i> Current Skills</h5>
                        </div>
                        <div class="card-body">
                            @if($skills->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Skill</th>
                                                <th>Percentage</th>
                                                <th>Progress Bar</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($skills as $skill)
                                            <tr>
                                                <td>{{ $skill->id }}</td>
                                                <td>{{ $skill->skill }}</td>
                                                <td>{{ $skill->pourcentage }}%</td>
                                                <td>
                                                    <div class="progress" style="height: 20px;">
                                                        <div class="progress-bar" role="progressbar" 
                                                             style="width: {{ $skill->pourcentage }}%" 
                                                             aria-valuenow="{{ $skill->pourcentage }}" 
                                                             aria-valuemin="0" aria-valuemax="100">
                                                            {{ $skill->pourcentage }}%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-sm btn-outline-primary" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editSkill{{ $skill->id }}">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </button>
                                                        <form action="{{ route('skills.destroy', $skill->id) }}" 
                                                              method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                    onclick="return confirm('Are you sure you want to delete this skill?')">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editSkill{{ $skill->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Skill</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('skills.update', $skill->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="skill{{ $skill->id }}" class="form-label">Skill Name</label>
                                                                    <input type="text" class="form-control" id="skill{{ $skill->id }}" 
                                                                           name="skill" value="{{ $skill->skill }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="pourcentage{{ $skill->id }}" class="form-label">Percentage</label>
                                                                    <input type="number" class="form-control" id="pourcentage{{ $skill->id }}" 
                                                                           name="pourcentage" value="{{ $skill->pourcentage }}" 
                                                                           min="0" max="100" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Update Skill</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-award" style="font-size: 3rem; color: #149ddd;"></i>
                                    <h5 class="mt-3">No Skills Added Yet</h5>
                                    <p class="text-muted">Start by adding your first skill above.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
