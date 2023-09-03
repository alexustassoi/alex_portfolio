<?php
/**
 * Block - Hero.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$phone = get_field_value( $global_options, 'phone' );
$email = get_field_value( $global_options, 'email' );

$fields      = get_fields();
$block_title = get_field_value($fields, 'block_title');
$sub_title   = get_field_value($fields, 'sub_title');
$pro_status  = get_field_value($fields, 'pro_status');
$location    = get_field_value($fields, 'location');
$btn         = get_field_value($fields, 'button');
$owner_photo = get_field_value($fields, 'owner_photo');

?>

<section id="home-section" class="hero active-section">
    <div class="hero__content-wrap container-inner">
        <div class="hero__content">
            <?php
            if (!empty($block_title)) {
                echo '<h1 class="hero__title">' . do_shortcode($block_title) . '</h1>';
            } ?>
            <div class="hero__sub-title-wrap">
                <?php
                if (!empty($pro_status)) {
                    echo '<span class="hero__pro-status">' . esc_html($pro_status) . '</span>';
                }
                if (!empty($sub_title)) {
                    echo '<span class="hero__sub-title">' . esc_html($sub_title) . '</span>';
                }
                if (!empty($location)) {
                    echo '<span class="hero__location">' . esc_html($location) . '</span>';
                }
                ?>
            </div>
            <?php
            echo ($btn)
                ? '<a href="' . do_shortcode($btn["url"]) . '" class="hero__btn button">' . do_shortcode($btn["title"]) . '</a>'
                : '';
            ?>
            <div class="hero__contact-wrap">
                <?php
                if ($phone) {
                    $tel_attr = preg_replace('/([\-\s()\/])+/', '' , $phone);
                    echo'<a class="hero__phone hero__contact-item" href="tel:' . do_shortcode($tel_attr) . '"><span class="hero__contact-icon"></span>'. esc_html($phone) .'</a>';
                }

                if ($email) {
                    echo'<a class="hero__email hero__contact-item" href="mailto:' . do_shortcode($email) . '"><span class="hero__contact-icon"></span>'. esc_html($email) .'</a>';
                }

                ?>
            </div>
        </div>
        <figure class="hero__user-wrap">
            <?php
            echo ($owner_photo)
                ? ' <img class="hero__user-img" src="' . do_shortcode($owner_photo) . '" alt="User">'
                : '';
            ?>
        </figure>
    </div>
</section>
