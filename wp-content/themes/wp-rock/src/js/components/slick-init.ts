import 'slick-carousel/slick/slick';
import $ from 'jquery';

/**
 * Init Slick Sliders.
 *
 * @param {Array} varFromPhp - data from admin.
 */
function initSlickSliders(varFromPhp) {
    const newQuoteSlider = $('.js-new-quote-slider');
    const trustLogoSlider = $('.js-partners-items');
    const heroVer2Group1Slider = $('.js-hero-ver-2-group-1');
    const heroVer2Group2Slider = $('.js-hero-ver-2-group-2');
    const heroVer2Group3Slider = $('.js-hero-ver-2-group-3');
    const group1Speed = varFromPhp.hero_version_2_group_1_speed ? varFromPhp.hero_version_2_group_1_speed : 5000;
    const group2Speed = varFromPhp.hero_version_2_group_2_speed ? varFromPhp.hero_version_2_group_2_speed : 5000;
    const group3Speed = varFromPhp.hero_version_2_group_3_speed ? varFromPhp.hero_version_2_group_3_speed : 5000;

    if (trustLogoSlider) {
        trustLogoSlider.slick({
            centerMode: true,
            autoWidth: true,
            dots: false,
            infinite: true,
            swipe: false,
            speed: 5000,
            centerPadding: '50px',
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            cssEase: 'linear',
            variableWidth: true,
            arrows: false,
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        settings: 'true',
                        swipe: true,
                        arrows: false,
                        infinite: true,
                        // speed: 1000,
                    },
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 6,
                        settings: 'true',
                        swipe: true,
                        arrows: false,
                        infinite: true,
                        speed: 3000,
                    },
                },
            ],
        });
    }

    if (heroVer2Group1Slider && heroVer2Group2Slider && heroVer2Group3Slider) {
        const commonInitOptions = {
            vertical: true,
            dots: false,
            swipe: false,
            speed: 5000,
            slidesToShow: 5,
            autoplay: true,
            autoplaySpeed: 0,
            cssEase: 'linear',
            arrows: false,
            pauseOnHover: true,
        };

        heroVer2Group1Slider.slick($.extend({}, commonInitOptions));
        heroVer2Group2Slider.slick($.extend({}, commonInitOptions));
        heroVer2Group3Slider.slick($.extend({}, commonInitOptions));

        heroVer2Group1Slider.slick('slickSetOption', 'speed', group1Speed);
        heroVer2Group2Slider.slick('slickSetOption', 'speed', group2Speed);
        heroVer2Group3Slider.slick('slickSetOption', 'speed', group3Speed);
    }

    if (newQuoteSlider) {
        newQuoteSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            infinite: true,
            speed: 500,
            autoplay: true,
            autoplaySpeed: 10000,
            arrows: false,
        });
    }
}

const SlickSliders = { initSlickSliders };
export default SlickSliders;