import Swiper from 'swiper';

function initSwipers() {
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    const swiper = new Swiper('.swiper-wrapper', {
        spaceBetween: 8,
        slidesPerView: 3,
        breakpoints: {
            300: {
                slidesPerView: 1.26,
                spaceBetween: 8,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 14,
            },
        },
    });
}

const Sliders = { initSwipers };
export default Sliders;
