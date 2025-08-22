<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>iPortfolio</title>

</head>
<body class="flex">
    @extends('layouts.front')

    @section('content')
    {{-- Hero Section --}}
    <section id="hero" class="">
        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ $about->subtitle ?? 'Kamil Baldyga' }}</h2>
            <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
        </div>
    </section>
    {{-- About Section --}}
    <section id="about">
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>{{ $about->subtext ?? 'Magnam dolores commodi suscipit...' }}</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <img src="{{ $about?->avatar?->image ? asset($about->avatar->image) : '' }}" class="" alt="">
          </div>
          <div class="col-lg-8 content">
            {{-- Title --}}
            <h2>UI/UX Designer &amp; Web Developer.</h2>
            {{-- Subtitle --}}
            <p class="fst-italic py-3">
              {{ $about->subtext ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}
            </p>
            {{-- About Info --}}
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $about->birthdate ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Website:</strong> <span>{{ $about->website ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phone ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>City:</strong> <span>{{ $about->city ?? 'N/A' }}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Degree:</strong> <span>{{ $about->degree ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Email:</strong> <span>{{ $about->email ?? 'N/A' }}</span></li>
                  <li><i class="fa-solid fa-chevron-right"></i> <strong>Freelance:</strong> <span>{{ $about->freelance ?? 'N/A' }}</span></li>
                </ul>
              </div>
            </div>
            {{-- Subtext --}}
            <p class="py-3">
              {{ $about->subtext ?? 'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero...' }}
            </p>
          </div>
        </div>

      </div>
    </section>
    {{-- Skills Section --}}
    <section id="skills" class="skills section light-background">
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
    {{-- Portfolio Section --}}
    <section>
        <h1>Portfolio</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque ratione iure ipsa. Aperiam ut quasi incidunt tenetur sapiente, suscipit nam perspiciatis voluptatem eligendi pariatur aliquam esse? Aperiam optio quas necessitatibus consequuntur voluptas accusamus? Sapiente ex laudantium, culpa labore vitae quo.</p>

        @foreach ($portfolios as $p)
            <ul>
                <li><a href="#">{{$p->filter}}</a></li>
            </ul>
        @endforeach

        @foreach ($portfolios as $p)
            <img src="{{$p->img}}" alt="">
        @endforeach
    </section>
    {{-- Services Section --}}
    <section class="services section">
        {{-- Section Title --}}
        <div class="section-title">
            <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      {{-- Section Content --}}
      @foreach ($services as $s)
      <div class="flex">
          <span class="{{$s->icon}}"></span>
          <div>
            <h1>{{$s->title}}</h1>
            <h2>{{$s->text}}</h2>
          </div>
      </div>
      @endforeach
    </section>
    {{-- Testimonials Section --}}
    <section class="testimonials section">
      <!-- Section Title -->
      <div class="section-title">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      {{-- Section Content --}}
      <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach($testimonials as $t)
          <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="{{ $loop->index }}" @if($loop->first) class="active" aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
          @endforeach
        </div>
        <div class="carousel-inner">
          @foreach($testimonials as $t)
          <div class="carousel-item @if($loop->first) active @endif">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="{{ asset($t->img) }}" class="rounded-circle mb-3" alt="{{ $t->name }}" style="width:96px;height:96px;object-fit:cover;">
              <blockquote class="mb-2">{{ $t->comment }}</blockquote>
              <small class="text-muted">{{ $t->name }} — {{ $t->position }}</small>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="section-title">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      {{-- Section Content --}}
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5">
            <div class="info-wrap">
              <div class="info-item">
                <i class=""></i>
                <div>
                  <h3>Address</h3>
                  <p>Place de la minoterie 10, 1080 Bruxelles</p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+32 001 002 003</p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div>
              {{-- iFrame --}}
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.6937365288773!2d4.34122!3d50.85535539999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1755866306650!5m2!1sfr!2sbe" width="450" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          {{-- Contact Form --}}
          <div class="col-lg-7">
            <form action="" method="POST" id="contact-form" class="">
              <div class="">

                <div class="columns-md">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="columns-md">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="columns-md">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="columns-md">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="columns-md">
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endsection

</body>
</html>