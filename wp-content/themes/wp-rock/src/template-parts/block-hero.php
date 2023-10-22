<?php
/**
 * Block - Hero.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$phone = get_field_value($global_options, 'phone');
$email = get_field_value($global_options, 'email');

$fields                  = get_fields();
$block_title             = get_field_value($fields, 'block_title');
$sub_title               = get_field_value($fields, 'sub_title');
$job_status_and_location = get_field_value($fields, 'job_status_and_location');
$btn                     = get_field_value($fields, 'button');
$owner_photo             = get_field_value($fields, 'owner_photo');

?>

<section id="home-section" class="hero active-section">
    <div class="hero__content-wrap container-inner">
        <div class="hero__content">
            <?php
            if (!empty($block_title)) {
                echo do_shortcode($block_title);
            } ?>
            <div class="hero__sub-title-wrap">
                <?php
                if (!empty($job_status_and_location)) {
                    echo do_shortcode($job_status_and_location);
                }
                ?>
            </div>
            <?php
            echo ($btn)
                ? '<a href="' . do_shortcode($btn["url"]) . '" class="hero__btn button js-anchorLink">' . do_shortcode($btn["title"]) . '</a>'
                : '';
            ?>
            <div class="hero__contact-wrap">
                <?php
                if ($phone) {
                    $tel_attr = preg_replace('/([\-\s()\/])+/', '', $phone);
                    echo '<a class="contact__phone hero__contact-item contact-item" href="tel:' . do_shortcode($tel_attr) . '"><span class="hero__contact-icon contact-icon"></span>' . esc_html($phone) . '</a>';
                }

                if ($email) {
                    echo '<a class="contact__email hero__contact-item contact-item" href="mailto:' . do_shortcode($email) . '"><span class="hero__contact-icon contact-icon"></span>' . esc_html($email) . '</a>';
                }

                ?>
            </div>
        </div>
        <figure class="hero__user-wrap" >
            <?php
            echo ($owner_photo)
                ? ' <img width="530" height="692" class="hero__user-img" src="' . do_shortcode($owner_photo) . '" alt="User">'
                : '';
            ?>
        </figure>
    </div>
</section>
