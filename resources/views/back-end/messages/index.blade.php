@extends('layouts.back')

@section('content')
    <!-- Messages Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Contact Messages</h2>
                        <p>View and manage contact form submissions from visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Messages List -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-envelope"></i> All Messages</h5>
                            <span class="badge bg-primary">{{ $messages->count() }} total</span>
                        </div>
                        <div class="card-body">
                            @if($messages->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td><strong>{{ $message->nom }}</strong></td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ Str::limit($message->sujet, 30) }}</td>
                                                <td>{{ Str::limit($message->message, 50) }}</td>
                                                <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#viewMessage{{ $message->id }}">
                                                        <i class="bi bi-eye"></i> View
                                                    </button>
                                                    <form action="{{ route('messages.destroy', $message->id) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                onclick="return confirm('Are you sure you want to delete this message?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewMessage{{ $message->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Message Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <strong>Name:</strong> {{ $message->nom }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Email:</strong> {{ $message->email }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <strong>Subject:</strong> {{ $message->sujet }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <strong>Message:</strong>
                                                                    <div class="mt-2 p-3 bg-light rounded">
                                                                        {{ $message->message }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <strong>Received:</strong> {{ $message->created_at->format('F d, Y \a\t H:i') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->sujet }}" 
                                                               class="btn btn-primary">
                                                                <i class="bi bi-reply"></i> Reply
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-envelope" style="font-size: 3rem; color: var(--accent-color);"></i>
                                    <h5 class="mt-3">No Messages Yet</h5>
                                    <p class="text-muted">When visitors submit the contact form, their messages will appear here.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
