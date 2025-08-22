<header>
    {{-- Avatar --}}
    <div class="avatar">
      <img src="{{asset($about->avatar->image)}}">
    </div>
    {{-- Username --}}
    <a href="#" class="">
        <h1 class="username">Kamil Baldyga</h1>
    </a>

    <div class="social-links">
        <a href="#" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa-solid fa-envelope"></i></a>
        <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
    </div>
    {{-- Navbar --}}
    <nav id="navmenu" class="">
        <ul>
            <li><a href="#contact"><i class="fa-solid fa-right-to-bracket"></i>Log out</a></li>
            <li><a href="#hero" class="active"><i class="fa-solid fa-home"></i>Home</a></li>
            <li><a href="#about"><i class="fa-solid fa-user"></i>About</a></li>
            <li><a href="#portfolio"><i class="fa-solid fa-book"></i>Portfolio</a></li>
            <li><a href="#portfolio"><i class="fa-solid fa-check-to-slot"></i>Skill</a></li>
            <li><a href="#services"><i class="fa-solid fa-server"></i>Service</a></li>
            <li><a href="#services"><i class="fa-solid fa-message"></i>Testimonials</a></li>
            <li><a href="#contact"><i class="fa-solid fa-phone"></i>Contact</a></li>
            <li><a href="#contact"><i class="fa-solid fa-envelope"></i>Mailbox</a></li>
        </ul>
    {{-- Copyright --}}
        <span>copyright</span>
        <span>Kamil Baldyga</span>
    </nav>
</header>
{{-- Fontawesome CDN --}}
<script src="https://kit.fontawesome.com/ac1c6017f4.js" crossorigin="anonymous"></script>