<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>iPortfolio</title>
</head>
<body>
    @extends('layouts.back')

    @section('content')
    <!-- Dashboard Header -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h2>Admin Dashboard</h2>
                        <p>Welcome to the iPortfolio administration panel. Manage your portfolio content from here.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="section light-background">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center">
                        <i class="bi bi-award" style="font-size: 3rem; color: var(--accent-color);"></i>
                        <h3>{{ $skills->count() }}</h3>
                        <p><strong>Skills</strong></p>
                        <a href="/back/skills" class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center">
                        <i class="bi bi-images" style="font-size: 3rem; color: var(--accent-color);"></i>
                        <h3>{{ $portfolios->count() }}</h3>
                        <p><strong>Portfolio Items</strong></p>
                        <a href="/back/portfolio" class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center">
                        <i class="bi bi-hdd-stack" style="font-size: 3rem; color: var(--accent-color);"></i>
                        <h3>{{ $services->count() }}</h3>
                        <p><strong>Services</strong></p>
                        <a href="/back/services" class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center">
                        <i class="bi bi-chat-quote" style="font-size: 3rem; color: var(--accent-color);"></i>
                        <h3>{{ $testimonials->count() }}</h3>
                        <p><strong>Testimonials</strong></p>
                        <a href="/back/testimonials" class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h3>Quick Actions</h3>
                    </div>
                </div>
            </div>
            
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person text-primary"></i> Profile Management</h5>
                            <p class="card-text">Update your personal information, avatar, and contact details.</p>
                            <div class="d-grid gap-2">
                                <a href="/back/about" class="btn btn-outline-primary">Edit About</a>
                                <a href="/back/contact" class="btn btn-outline-primary">Edit Contact</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-envelope text-primary"></i> Messages</h5>
                            <p class="card-text">View and manage contact form submissions from visitors.</p>
                            <div class="d-grid gap-2">
                                <a href="/back/messages" class="btn btn-outline-primary">View Messages</a>
                                <span class="badge bg-primary">{{ $messages->count() }} new</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Activity -->
    <section class="section light-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title" data-aos="fade-up">
                        <h3>Recent Messages</h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages->take(5) as $message)
                                <tr>
                                    <td>{{ $message->nom }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::limit($message->sujet, 30) }}</td>
                                    <td>{{ $message->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="/back/messages/{{ $message->id }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No messages yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    
</body>
</html>