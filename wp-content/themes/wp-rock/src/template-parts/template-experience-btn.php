<?php
/**
 * Template: Experience button.
 *
 * @package WP-rock
 */

$custom_class = get_field_value($args, 'custom_class');

if ($download_file && $download_btn_text && $full_name) {
    $words           = explode(' ', $full_name);
    $lowercase_words = array_map('strtolower', $words);
    $file_prefix     = implode('_', $lowercase_words);
    ?>
    <a href="<?php echo do_shortcode($download_file); ?>" class="experience__btn button <?php echo ($custom_class) ? do_shortcode($custom_class) : ''; ?>" download="<?php echo esc_html($file_prefix); ?>_cv.pdf"><?php echo do_shortcode($download_btn_text); ?></a>
<?php }
