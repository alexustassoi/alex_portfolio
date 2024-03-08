<?php
/**
 * Block - Service.
 *
 * @package WP-rock
 * @since   4.4.0
 */

$fields         = get_fields();
$title          = get_field_value($fields, 'title');
$pre_title_text = get_field_value($fields, 'pretitle_text');
$item_repeater  = get_field_value($fields, 'item_repeater');
$is_visible     = get_field_value($fields, 'is_visible');

?>

<section id="services" class="service <?php echo (!$is_visible) ? 'not_visible' : ''; ?>">
    <div class="service__content-wrap container-inner">
        <?php
        echo ($pre_title_text)
            ? '<p class="service__pre-title pre-title">' . do_shortcode($pre_title_text) . '</p>'
            : '';

        echo ($title)
            ? '<h2 class="service__title section-title">' . do_shortcode($title) . '</h2>'
            : '';
        ?>

        <div class="service__content">
            <?php if ($item_repeater) { ?>
                <div class="service__accordion accordion">
                    <?php foreach ($item_repeater as $item) {
                        $item_title = get_field_value($item, 'item_title');
                        $item_desc  = get_field_value($item, 'item_desc');
                        ?>
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion__item-title-wrap">
                                <?php
                                echo ($item_title)
                                    ? '<h4 class="accordion__item-title" data-role="toggle-accordion-item">' . do_shortcode($item_title) . '</h4>'
                                    : '';
                                ?>
                                <div class="accordion__item-switcher" data-role="toggle-accordion-item"></div>
                            </div>
                            <?php
                            echo ($item_desc)
                                ? '<div class="accordion__item-desc">' . do_shortcode($item_desc) . '</div>'
                                : '';
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
