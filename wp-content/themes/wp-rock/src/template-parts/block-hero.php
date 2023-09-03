<?php
/**
 * Block - Hero.
 *
 * @package WP-rock
 * @since   4.4.0
 */

$fields      = get_fields();
$block_title = get_field_value($fields, 'block_title');
$pro_status  = get_field_value($fields, 'pro_status');
$location    = get_field_value($fields, 'location');
$btn         = get_field_value($fields, 'button');
$owner_photo = get_field_value($fields, 'owner_photo');

?>

<section class="hero">
    <div class="hero__container container">

        <div class="hero__title-wrap">
            <?php
            if (!empty($block_title)) {
                echo '<h1 class="hero__title">' . do_shortcode($block_title) . '</h1>';
            }
            if (!empty($description)) {
                echo '<p class="hero__description">' . esc_html($description) . '</p>';
            }
            ?>
        </div>
        <!--        --><?php //if ($block_repeater) : ?>
        <!--            <div class="hero__block-wrapper">-->
        <!--                --><?php
        //                foreach ($block_repeater as $key => $block) {
        //                    $reverse_class = $key % 2 ? 'reverse' : '';
        //                    echo '<div class="hero__block ' . esc_html($reverse_class) . '">
        //                                <picture class="hero__image ' . esc_html($reverse_class) . '">
        //                                    <img src="' . do_shortcode($block['image']) . '" alt="image">
        //                                </picture>
        //                                <p class="hero__text">' . esc_html($block['text']) . '</p>
        //                            </div>';
        //                }
        //                ?>
        <!--            </div>-->
        <!--        --><?php //endif; ?>
    </div>
</section>
