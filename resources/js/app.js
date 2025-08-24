import './bootstrap';

// Import Bootstrap JavaScript
import * as bootstrap from 'bootstrap';

// Import AOS (Animate On Scroll)
import AOS from 'aos';

// Import GLightbox
import GLightbox from 'glightbox';

// Import Swiper
import Swiper from 'swiper';

// Import Isotope
import Isotope from 'isotope-layout';

// Import ImagesLoaded
import imagesLoaded from 'imagesloaded';

// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true,
    mirror: false
});

// Initialize GLightbox
GLightbox({
    selector: '.glightbox'
});

// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    const headerToggle = document.querySelector('.header-toggle');
    const header = document.querySelector('.header');
    
    if (headerToggle && header) {
        headerToggle.addEventListener('click', function() {
            header.classList.toggle('header-show');
        });
    }

    // Close mobile menu when clicking on a link
    const navLinks = document.querySelectorAll('.navmenu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 1200) {
                header.classList.remove('header-show');
            }
        });
    });

    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerHeight = document.querySelector('.header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Active navigation highlighting
    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('.navmenu a');
    
    window.addEventListener('scroll', function() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href') === `#${current}`) {
                item.classList.add('active');
            }
        });
    });
});

// Initialize Isotope for portfolio filtering
document.addEventListener('DOMContentLoaded', function() {
    const grid = document.querySelector('.isotope-container');
    if (grid) {
        const iso = new Isotope(grid, {
            itemSelector: '.portfolio-item',
            layoutMode: 'masonry'
        });

        // Filter items on click
        const filterButtons = document.querySelectorAll('.portfolio-filters li');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');
                
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('filter-active'));
                // Add active class to clicked button
                this.classList.add('filter-active');
                
                // Filter items
                if (filterValue === '*') {
                    iso.arrange({ filter: '*' });
                } else {
                    iso.arrange({ filter: filterValue });
                }
            });
        });
    }
});

// Initialize Swiper for testimonials
document.addEventListener('DOMContentLoaded', function() {
    const testimonialSwiper = new Swiper('.testimonial-swiper', {
        loop: true,
        speed: 600,
        autoplay: {
            delay: 5000,
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 1
            }
        }
    });
});
