<?php
/**
 * Block - Service.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$fields     = get_fields();
$hide_block = get_field_value($fields, 'hide_block');

if ($hide_block) return;

$phone                   = get_field_value($global_options, 'phone');
$email                   = get_field_value($global_options, 'email');
$contact_pretitle_text   = get_field_value($global_options, 'contact_pretitle_text');
$contact_title           = get_field_value($global_options, 'contact_block_title');
$contact_address         = get_field_value($global_options, 'contact_address');
$contact_social_repeater = get_field_value($global_options, 'contact_social_repeater');
$contact_shortcode_form  = get_field_value($global_options, 'contact_shortcode_form');


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

