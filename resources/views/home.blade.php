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
                    <img src="{{ $about?->avatar?->image ? asset('storage/' . $about->avatar->image) : asset('img/default-avatar.jpg') }}" class="img-fluid" alt="Profile">
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
            <div class="row skills-content skills-animation">
                @foreach($skillColumns as $column)
                <div class="col-lg-6">
                    @foreach($column as $skill)
                    <div class="progress">
                        <span class="skill"><span>{{ $skill->skill }}</span> <i class="val">{{ $skill->pourcentage }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->pourcentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->pourcentage }}%"></div>
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
                            <img src="{{ asset('storage/'. $portfolio->img) }}" class="img-fluid" alt="{{ $portfolio->filter }}">
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->filter }}</h4>
                                <p>{{ $portfolio->filter }} Project</p>
                                <a href="{{ asset('storage/' . $portfolio->img) }}" title="{{ $portfolio->filter }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
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
            <div class="testimonial-swiper swiper">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{ $testimonial->comment }}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('storage/' . $testimonial->img) }}" class="testimonial-img" alt="{{ $testimonial->name }}">
                            <h3>{{ $testimonial->name }}</h3>
                            <h4>{{ $testimonial->position }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
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

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection