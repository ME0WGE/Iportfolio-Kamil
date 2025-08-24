<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        @if(isset($about) && $about && $about->avatar)
            <img src="{{ asset($about->avatar->image) }}" alt="Profile" class="img-fluid rounded-circle">
        @else
            <img src="{{ asset('img/default-avatar.jpg') }}" alt="Profile" class="img-fluid rounded-circle">
        @endif
    </div>

    <a href="/back" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">Admin Panel</h1>
    </a>

    <div class="social-links text-center">
        <a href="/" class="home"><i class="bi bi-house"></i></a>
        <a href="#" class="settings"><i class="bi bi-gear"></i></a>
        <a href="#" class="user"><i class="bi bi-person"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="/back" class="active"><i class="bi bi-house navicon"></i>Dashboard</a></li>
            <li><a href="/back/about"><i class="bi bi-person navicon"></i>About</a></li>
            <li><a href="/back/contact"><i class="bi bi-geo-alt navicon"></i>Contact</a></li>
            <li><a href="/back/skills"><i class="bi bi-award navicon"></i>Skills</a></li>
            <li><a href="/back/portfolio"><i class="bi bi-images navicon"></i>Portfolio</a></li>
            <li><a href="/back/services"><i class="bi bi-hdd-stack navicon"></i>Services</a></li>
            <li><a href="/back/testimonials"><i class="bi bi-chat-quote navicon"></i>Testimonials</a></li>
            <li><a href="/back/messages"><i class="bi bi-envelope navicon"></i>Messages</a></li>
        </ul>
    </nav>
</header>
{{-- Fontawesome CDN --}}
<script src="https://kit.fontawesome.com/ac1c6017f4.js" crossorigin="anonymous"></script>