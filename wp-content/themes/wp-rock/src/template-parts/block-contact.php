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

$args = [
    'phone' => $phone,
    'email' => $email,
    'title' => $title,
    'pre_title_text' => $pre_title_text,
    'address' => $address,
    'social_repeater' => $social_repeater,
    'shortcode_form' => $shortcode_form
];

include(locate_template('./src/template-parts/template-contact-section.php', false, false, $args));

