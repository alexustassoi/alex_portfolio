import Swiper, { Navigation, Pagination } from 'swiper';

let projectGallerySlider: Swiper | null;

function getNavigationElements() {
    if (window.innerWidth <= 570) {
        return {
            paginationEl: '.swiper-pagination-mobile',
            nextEl: '.swiper-button-next-mobile',
            prevEl: '.swiper-button-prev-mobile',
        };
    }
    return {
        paginationEl: '.swiper-pagination-desktop',
        nextEl: '.swiper-button-next-desktop',
        prevEl: '.swiper-button-prev-desktop',
    };
}

function initSwipers() {
    const gallerySliderElement = document.querySelector('.js-project-gallery-slider');

    if (!gallerySliderElement) return;

    // Destroy the previous copy of Swiper (if already it is)
    console.log('projectGallerySlider', projectGallerySlider);
    if (projectGallerySlider instanceof Swiper) {
        projectGallerySlider.destroy(true, true);
        projectGallerySlider = null;  // Reset the variable so as not to refer to the destroyed object
    }

    const navigationElements = getNavigationElements();
    const prev = document.querySelector(navigationElements.prevEl);
    const next = document.querySelector(navigationElements.nextEl);
    const paginationEl = document.querySelector(navigationElements.paginationEl);
    console.log('prev', prev);
    console.log('next', next);
    console.log('paginationEl', paginationEl);

    projectGallerySlider = new Swiper('.js-project-gallery-slider', {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        loop: true,
        speed: 800,
        pagination: {
            el: navigationElements.paginationEl,
            type: 'fraction',
            formatFractionCurrent(number) {
                return number.toString().padStart(2, '0');
            },
            formatFractionTotal(number) {
                return number.toString().padStart(2, '0');
            },
        },
        navigation: {
            nextEl: navigationElements.nextEl,
            prevEl: navigationElements.prevEl,
        },
        allowTouchMove: true,
    });

    console.log('projectGallerySlider_after', projectGallerySlider);
}

// Restart the Swiper when the screen size changes
window.addEventListener('resize', () => {
    initSwipers();
});

const SwiperSliders = { initSwipers };
export default SwiperSliders;
