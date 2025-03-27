import Swiper, { Navigation, Pagination } from 'swiper';

/**
 * Init Swiper Sliders.
 *
 * * @param {Array} varFromPhp - data from admin.
 */
function initSwipers() {
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    const projectGallerySlider = new Swiper('.js-project-gallery-slider', {
        modules: [Navigation, Pagination],
        slidesPerView: 1, // Displays 1 slide at a time
        loop: true, // Enables infinite loop of slides
        speed: 800, // Smooth animation when switching slides
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction', // Format "01/04"
            formatFractionCurrent(number) {
                return number.toString().padStart(2, '0'); // Two-digit format (01, 02)
            },
            formatFractionTotal(number) {
                return number.toString().padStart(2, '0');
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        allowTouchMove: false, // Disables swipe gestures to allow navigation only via buttons
    });
}

const SwiperSliders = { initSwipers };
export default SwiperSliders;
