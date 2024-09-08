window.onscroll = function() {
    const header = document.querySelector("nav");
    const navbar = document.getElementById("navbar");
    const fixedNv = header.offsetTop;

    if (window.pageYOffset > fixedNv) {
        header.classList.add("navbar-fixed");
        header.classList.add("bg-white");
        header.classList.remove("bg-tosca");
        navbar.classList.remove("md:bg-tosca");
    } else {
        navbar.classList.add("md:bg-tosca");
        header.classList.add("bg-tosca");
        header.classList.remove("bg-white");
        header.classList.remove("navbar-fixed");
    }
};


document.addEventListener('DOMContentLoaded', function() {
    var countUpElements = document.querySelectorAll('.count-up');

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var $countUp = entry.target;
                var countTo = parseInt($countUp.getAttribute('data-count'), 10);
                var currentNumber = 0;
                var increment = countTo / 200; // Adjust for smoother animation

                var interval = setInterval(function() {
                    currentNumber += increment;
                    if (currentNumber >= countTo) {
                        currentNumber = countTo;
                        clearInterval(interval);
                    }
                    $countUp.textContent = Math.floor(currentNumber);
                }, 10);

                observer.unobserve($countUp); // Stop observing after animation
            }
        });
    }, {
        threshold: 0.1 // Adjust the threshold as needed
    });

    countUpElements.forEach(function(element) {
        observer.observe(element);
    });
});


const swiper = new Swiper('.swiper-container', {
    // Swiper Options
    slidesPerView: 3, // Default
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    effect: 'coverflow',
    coverflowEffect: {
        rotate: 0,
        stretch: 100,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },

    // Breakpoints untuk menyesuaikan slidesPerView berdasarkan lebar layar
    breakpoints: {
        320: { // Untuk layar yang sangat kecil (mobile)
            slidesPerView: 1,
            spaceBetween: 10,
        },
        640: { // Untuk ukuran layar medium (tablet)
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: { // Untuk ukuran layar besar (desktop)
            slidesPerView: 3,
            spaceBetween: 30,
        },
    }
});


const text = "POSREDU";
let index = 0;
const speed = 300; // Waktu antara karakter (dalam milidetik)

function typeEffect() {
    if (index < text.length) {
        document.getElementById('posredu').innerHTML += text.charAt(index);
        index++;
        setTimeout(typeEffect, speed);
    }
}

// Mulai efek mengetik ketika halaman dimuat
window.onload = function() {
    typeEffect();
};
