<?php
/**
 * Block - Experience.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$full_name = get_field_value($global_options, 'full_name');

$fields              = get_fields();
$title               = get_field_value($fields, 'title');
$pre_title_text      = get_field_value($fields, 'pretitle_text');
$description         = get_field_value($fields, 'description');
$download_btn_text   = get_field_value($fields, 'download_btn_text');
$download_file       = get_field_value($fields, 'download_file');
$experience_repeater = get_field_value($fields, 'experience_repeater');

?>

<section id="experience" class="experience">
    <div class="experience__content-wrap container-inner">
        <div class="experience__left-col">
            <?php
            echo ($pre_title_text)
                ? '<p class="experience__pre-title pre-title">' . do_shortcode($pre_title_text) . '</p>'
                : '';

            echo ($title)
                ? '<h2 class="experience__title section-title">' . do_shortcode($title) . '</h2>'
                : '';

            echo ($description)
                ? '<p class="experience__description">' . do_shortcode($description) . '</p>'
                : '';

            $args = [
                'custom_class' => 'desktop'
            ];

            include(locate_template('src/template-parts/template-experience-btn.php', false, false, $args));
            ?>
        </div>
        <div class="experience__right-col">
            <?php if ($experience_repeater) { ?>
                <div class="experience__items">
                    <?php foreach ($experience_repeater as $item) {
                        $job_position     = get_field_value($item, 'job_position');
                        $working_period   = get_field_value($item, 'working_period');
                        $working_location = get_field_value($item, 'working_location');
                        ?>
                        <div class="experience__item">
                            <div class="experience__item-info">
                                <?php
                                    echo ($working_period)
                                        ? '<span class="experience__working-period">' . do_shortcode($working_period) . '</span>'
                                        : '';

                                    echo ($working_location)
                                        ? '<span class="experience__working-location">' . do_shortcode($working_location) . '</span>'
                                        : '';
                                ?>
                            </div>
                            <?php
                            echo ($job_position)
                                ? '<h4 class="experience__job-position">' . do_shortcode($job_position) . '</h4>'
                                : '';
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php
        $args = [
            'custom_class' => 'mobile'
        ];

        include(locate_template('src/template-parts/template-experience-btn.php', false, false, $args));
        ?>
    </div>
</section>
