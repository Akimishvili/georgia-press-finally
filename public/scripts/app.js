const categoryItemSlide = {
    slidesPerView: 1,
    speed: 1000,
    autoplay: {
        delay: 3000,
    },
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        800: {
            slidesPerView:1
        },
        1200: {
            slidesPerView: 2
        },
        1400: {
            slidesPerView:3
        }
    }
}

Fancybox.bind("[data-fancybox]", {
    // Your custom options
});

const asideNavbar = document.getElementById('aside-navbar');
const asideNavbarToggle = document.getElementById('aside-navbar-toggle');

asideNavbarToggle.addEventListener('click', ()=>{
    asideNavbar.classList.toggle('aside-navbar-hide')
})
