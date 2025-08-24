@if(session('success'))
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080; min-width: 300px;">
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" id="successToast">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('successToast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl, { delay: 4000 });
                toast.show();
            }
        });
    </script>
@endif
@extends('layouts.front')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('img/hero-bg.jpg') }}" alt="Hero Background" data-aos="fade-in" class="img-fluid">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>{{ $about->subtext ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.' }}</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="{{ asset($about->avatar->image) }}" class="img-fluid" alt="Profile">
                </div>
                <div class="col-lg-8 content">
                    <h2>UI/UX Designer & Web Developer.</h2>
                    <p class="fst-italic py-3">
                        {{ $about->subtext ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $about->birthdate ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>{{ $about->website ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phone ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about->city ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $about->degree ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $about->email ?? 'N/A' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>{{ $about->freelance ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <p class="py-3">
                        {{ $about->subtext ?? 'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis. Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Skills</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            @php
                $chunkSize = (int) ceil($skills->count() / 2);
                $skillColumns = $skills->chunk($chunkSize);
            @endphp
            <div class="row skills-content">
                @foreach($skillColumns as $column)
                <div class="col-lg-6">
                    @foreach($column as $skill)
                    <div class="skill-item mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="skill-name fw-bold">{{ $skill->skill }}</span>
                            <span class="skill-percentage text-muted">{{ $skill->pourcentage }}%</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar {{ $skill->pourcentage >= 80 ? 'bg-success' : ($skill->pourcentage >= 60 ? 'bg-info' : ($skill->pourcentage >= 40 ? 'bg-warning' : 'bg-danger')) }}" 
                                 role="progressbar" 
                                 style="width: {{ $skill->pourcentage }}%" 
                                 aria-valuenow="{{ $skill->pourcentage }}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    @php
                        $filters = $portfolios->pluck('filter')->unique();
                    @endphp
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach($filters as $filter)
                    <li data-filter=".filter-{{ strtolower($filter) }}">{{ $filter }}</li>
                    @endforeach
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($portfolio->filter) }}">
                        <div class="portfolio-wrap">
                            <img src="{{ asset($portfolio->img) }}" class="img-fluid" alt="{{ $portfolio->filter }}">
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->filter }}</h4>
                                <p>{{ $portfolio->filter }} Project</p>
                                <a href="{{ asset($portfolio->img) }}" title="{{ $portfolio->filter }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="#" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h4><a href="#">{{ $service->title }}</a></h4>
                        <p>{{ $service->text }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($testimonials as $index => $testimonial)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="testimonial-item text-center">
                            <p class="mb-4">
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{ $testimonial->comment }}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="{{ asset($testimonial->img) }}" class="testimonial-img rounded-circle mb-3" alt="{{ $testimonial->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                            <h3 class="mb-1">{{ $testimonial->name }}</h3>
                            <h4 class="text-muted">{{ $testimonial->position }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Navigation Buttons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(30,30,30,0.85); border-radius: 50%; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.5));"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(30,30,30,0.85); border-radius: 50%; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.5));"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach($testimonials as $index => $testimonial)
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="info-wrap">
                        @if($contacts->count() > 0)
                        @php $contact = $contacts->first(); @endphp
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ $contact->street ?? 'N/A' }} {{ $contact->number ?? '' }}, {{ $contact->city ?? 'N/A' }} {{ $contact->zip ?? '' }}</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $contact->phone ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $contact->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                        @endif

                        @php
                            $address = trim(($contact->street ?? '') . ' ' . ($contact->number ?? '') . ', ' . ($contact->city ?? '') . ' ' . ($contact->zip ?? ''));
                            $addressQuery = urlencode($address);
                            $mapsUrl = "https://www.google.com/maps?q={$addressQuery}&output=embed";
                        @endphp
                        <iframe src="{{ $mapsUrl }}" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="{{ route('contact.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="nom" id="name-field" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field" required>
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="sujet" id="subject-field" required>
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection