<?php
/**
 * Block - Service.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$phone = get_field_value($global_options, 'phone');
$email = get_field_value($global_options, 'email');

$fields          = get_fields();
$title           = get_field_value($fields, 'title');
$pre_title_text  = get_field_value($fields, 'pretitle_text');
$address         = get_field_value($fields, 'address');
$social_repeater = get_field_value($fields, 'social_repeater');
$shortcode_form  = get_field_value($fields, 'shortcode_form');

?>

<section id="contact" class="contact-section">
    <div class="contact-section__content-wrap container-inner">
        <div class="contact-section__left-content">
            <?php
            echo ($pre_title_text)
                ? '<p class="contact-section__pre-title pre-title">' . do_shortcode($pre_title_text) . '</p>'
                : '';

            echo ($title)
                ? '<h2 class="contact-section__title section-title">' . do_shortcode($title) . '</h2>'
                : '';


            echo ($address)
                ? '<p class="contact-section__address">' . do_shortcode($address) . '</p>'
                : '';
            ?>

            <div class="contact-section__contact-info">
                <?php
                if ($phone) {
                    $tel_attr = preg_replace('/([\-\s()\/])+/', '', $phone);
                    echo '<h4 class="contact-section__contact-item"><a class="contact-section__phone" href="tel:' . do_shortcode($tel_attr) . '">' . esc_html($phone) . '</a></h4>';
                }

                if ($email) {
                    echo '<h4 class="contact-section__contact-item"><a class="contact-section__email" href="mailto:' . do_shortcode($email) . '">' . esc_html($email) . '</a></h4>';
                }
                ?>
            </div>

            <?php
            if ($social_repeater) { ?>
                <div class="contact-section__socials">
                    <?php foreach ($social_repeater as $item) {
                        $social_title = get_field_value($item, 'social_title');
                        $social_link  = get_field_value($item, 'social_link');
                        ?>
                        <div class="contact-section__social-item">
                            <?php if ($social_title && $social_link) {
                                echo '<a class="contact-section__social-link" href="' . esc_html($social_link) . '">' . do_shortcode($social_title) . '</a>';
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            ?>
        </div>
        <div class="contact-section__right-content">
            <?php
            echo ($shortcode_form)
                ? '<div class="contact-section__form-wrap">' . do_shortcode($shortcode_form) . '</div>'
                : '';
            ?>
        </div>
    </div>
</section>
