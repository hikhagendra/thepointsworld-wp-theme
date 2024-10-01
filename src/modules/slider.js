let swiper = new Swiper('.multiple-slide-carousel', {
    loop: true,
    slidesPerView: 3,
    paginationClickable: true,
    pagination: {
        el: ".multiple-slide-carousel .swipper-pagination",
        clickable: true,
    },
    breakpoints: {
        1920: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1028: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        990: {
            slidesPerView: 1,
            spaceBetween: 0
        }
    }
});