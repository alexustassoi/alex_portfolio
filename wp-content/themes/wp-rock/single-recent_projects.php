<?php
/**
 * General template for single recent_project post.
 *
 * @package WP-rock
 * @since 4.4.0
 */

global $global_options;

$pictures_col_1          = get_field_value($global_options, 'pictures_col_1');
$pictures_col_2          = get_field_value($global_options, 'pictures_col_2');
$pictures_col_3          = get_field_value($global_options, 'pictures_col_3');
$pictures_col_4          = get_field_value($global_options, 'pictures_col_4');
$pictures_col_5          = get_field_value($global_options, 'pictures_col_5');
$pictures_col_6          = get_field_value($global_options, 'pictures_col_6');
$phone                   = get_field_value($global_options, 'phone');
$email                   = get_field_value($global_options, 'email');
$contact_pretitle_text   = get_field_value($global_options, 'contact_pretitle_text');
$contact_title           = get_field_value($global_options, 'contact_block_title');
$contact_address         = get_field_value($global_options, 'contact_address');
$contact_social_repeater = get_field_value($global_options, 'contact_social_repeater');
$contact_shortcode_form  = get_field_value($global_options, 'contact_shortcode_form');

get_header();

do_action('wp_rock_before_page_content');

if (have_posts()) :
    while (have_posts()) :
        the_post();
        $post_ID           = get_the_ID();
        $post_fields       = get_fields($post_ID);
        $project_content   = get_field_value($post_fields, 'project_content');
        $tech_stack_info   = get_field_value($post_fields, 'tech_stack_info');
        $live_preview_link = get_field_value($post_fields, 'live_preview_link');
        $view_code_link    = get_field_value($post_fields, 'view_code_link');
        $project_gallery   = get_field_value($post_fields, 'project_gallery');
        ?>
        <section class="hero-ver-2">
            <div class="hero-ver-2__inner">
                <div class="container hero-ver-2__container container-inner">
                    <div class="hero-ver-2__animate-bg-images">
                        <?php
                        if ($pictures_col_1) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-1 hero-ver-2__animate-img-col js-hero-ver-2-group-1">
                                <?php foreach ($pictures_col_1 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        if ($pictures_col_2) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-2 hero-ver-2__animate-img-col js-hero-ver-2-group-2">
                                <?php foreach ($pictures_col_2 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        if ($pictures_col_3) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-3 hero-ver-2__animate-img-col js-hero-ver-2-group-1">
                                <?php foreach ($pictures_col_3 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        if ($pictures_col_4) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-4 hero-ver-2__animate-img-col js-hero-ver-2-group-3">
                                <?php foreach ($pictures_col_4 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        if ($pictures_col_5) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-5 hero-ver-2__animate-img-col js-hero-ver-2-group-2">
                                <?php foreach ($pictures_col_5 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        if ($pictures_col_6) {
                            ?>
                            <div
                                class="hero-ver-2__animate-img-col-6 hero-ver-2__animate-img-col js-hero-ver-2-group-3">
                                <?php foreach ($pictures_col_6 as $item_img) { ?>
                                    <figure class="hero-ver-2__animate-img-item">
                                        <img class="hero-ver-2__animate-img" src="<?php echo esc_html($item_img); ?>"
                                             width="276" height="471" alt="Gallery image">
                                    </figure>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="hero-ver-2__content">
                        <?php
                        $post_title = get_the_title();
                        echo ($post_title)
                            ? '<h1 class="hero-ver-2__title">' . do_shortcode($post_title) . '</h1>'
                            : '';

                        //                                echo ( $desc )
                        //                                    ? '<div class="hero-ver-2__desc">' . do_shortcode( $desc ) . '</div>'
                        //                                    : '';
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-gallery">
            <div class="container project-gallery__container container-inner">
                <div class="project-gallery__slider-wrap">
                    <div class="project-gallery__slider swiper js-project-gallery-slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php
                            if (!empty($project_gallery) && is_array($project_gallery)):
                                foreach ($project_gallery as $slide_img): ?>
                                    <div class="swiper-slide project-gallery__slide">
                                        <img class="project-gallery__slide-img"
                                             src="<?php echo do_shortcode($slide_img); ?>"
                                             alt="Project"/>
                                    </div>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>

                        <div class="project-gallery__swiper-controls js-project-gallery-controls">
                            <div class="project-gallery__controls-top">
                                <div class="project-gallery__read-more-btn project-gallery__controls-btn js-project-controls-btn project-read-more-btn" data-role="toggle-project-controls-btn">
                                    <span class="project-gallery__btn-label">
                                        <?php pll_e("Read more"); ?>
                                    </span>
                                </div>
                                <div class="project-gallery__read-more-btn project-gallery__controls-btn js-project-controls-btn" data-role="toggle-project-controls-btn">
                                    <span class="project-gallery__btn-label">
                                        <?php pll_e("Read more"); ?>
                                    </span>
                                </div>
                                <div class="project-gallery__read-more-btn project-gallery__controls-btn js-project-controls-btn" data-role="toggle-project-controls-btn">
                                    <span class="project-gallery__btn-label">
                                        <?php pll_e("Read more"); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="project-gallery__controls-bottom">
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <div class="project-gallery__swiper-buttons">
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="project-gallery__project-info">
                            <div class="project-gallery__project-title">
                                <?php echo the_title(); ?>
                            </div>
                            <div class="project-gallery__project-content">
                                <p>The snow leopard's fur is whitish to grey with black spots on head and neck, with larger rosettes on the back, flanks and bushy tail. The belly is whitish. Its eyes are pale green or grey in color. Its muzzle is short and its forehead domed. Its nasal cavities are large. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif;

$args = [
    'phone' => $phone,
    'email' => $email,
    'title' => $contact_title,
    'pre_title_text' => $contact_pretitle_text,
    'address' => $contact_address,
    'social_repeater' => $contact_social_repeater,
    'shortcode_form' => $contact_shortcode_form
];

include(locate_template('./src/template-parts/template-contact-section.php', false, false, $args));

do_action('wp_rock_after_page_content'); ?>
<?php
get_footer();
