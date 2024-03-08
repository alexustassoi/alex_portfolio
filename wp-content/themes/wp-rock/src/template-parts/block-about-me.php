<?php
/**
 * Block - About me.
 *
 * @package WP-rock
 * @since   4.4.0
 */

global $global_options;

$full_name = get_field_value($global_options, 'full_name');
$phone     = get_field_value($global_options, 'phone');
$email     = get_field_value($global_options, 'email');
$age       = get_field_value($global_options, 'age');
$location  = get_field_value($global_options, 'location');

$fields                  = get_fields();
$title                   = get_field_value($fields, 'title');
$pre_title_text          = get_field_value($fields, 'pretitle_text');
$owner_photo             = get_field_value($fields, 'owner_photo');
$owner_signature         = get_field_value($fields, 'owner_signature');
$download_btn_text       = get_field_value($fields, 'download_btn_text');
$download_btn_file       = get_field_value($fields, 'download_btn_file');
$info_item_repeater      = get_field_value($fields, 'info_item_repeater');
$quote_text              = get_field_value($fields, 'quote_text');
$job_status_and_location = get_field_value($fields, 'job_status_and_location');

?>

<section id="about-me" class="about-me">
    <div class="about-me__content-wrap container-inner">
        <?php
        echo ($pre_title_text)
            ? '<p class="about-me__pre-title pre-title">' . do_shortcode($pre_title_text) . '</p>'
            : '';

        echo ($title)
            ? '<h2 class="about-me__title section-title">' . do_shortcode($title) . '</h2>'
            : '';
        ?>

        <div class="about-me__content">
            <div class="about-me__left-col">
                <?php
                if ($owner_photo) { ?>
                    <div class="about-me__owner-main-wrap">
                        <?php
                        echo ($owner_signature)
                            ? '<img class="about-me__signature" width="200" height="112" src="' . esc_html($owner_signature) . '" alt="Signature" />'
                            : '';
                        ?>
                        <figure class="about-me__owner-img-wrap">
                            <img class="about-me__owner-img" width="367" height="409"
                                 src="<?php echo esc_html($owner_photo); ?>" alt="Owner"/>
                        </figure>
                    </div>
                <?php } ?>
                <div class="about-me__owner-data">
                    <?php
                    echo ($full_name)
                        ? '<h2 class="about-me__full-name">' . do_shortcode($full_name) . '</h2>'
                        : ''; ?>

                    <div class="about-me__sub-title-wrap">
                        <?php
                        echo ($job_status_and_location)
                            ? do_shortcode($job_status_and_location)
                            : '';
                        ?>
                    </div>
                    <?php if ($download_btn_file && $download_btn_text && $full_name) {
                        $words           = explode(' ', $full_name);
                        $lowercase_words = array_map('strtolower', $words);
                        $file_prefix     = implode('_', $lowercase_words);
                        ?>
                        <a class="about-me__download-btn download-btn"
                           href="<?php echo esc_html($download_btn_file); ?>"
                           download="<?php echo esc_html($file_prefix); ?>_cv.pdf">
                            <?php echo do_shortcode($download_btn_text); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="about-me__right-col">
                <div class="about-me__contact-data">
                    <?php
                    if ($phone) {
                        $tel_attr = preg_replace('/([\-\s()\/])+/', '', $phone);
                        echo '<a class="contact__phone about-me__contact-item contact-item" href="tel:' . do_shortcode($tel_attr) . '"><span class="about-me__contact-icon contact-icon"></span>' . esc_html($phone) . '</a>';
                    }

                    if ($email) {
                        echo '<a class="contact__email about-me__contact-item contact-item" href="mailto:' . do_shortcode($email) . '"><span class="about-me__contact-icon contact-icon"></span>' . esc_html($email) . '</a>';
                    }

                    if ($age) {
                        echo '<div class="contact__age about-me__contact-item contact-item"><span class="about-me__contact-icon contact-icon"></span>' . esc_html($age) . '</div>';
                    }

                    if ($location) {
                        echo '<div class="contact__location about-me__contact-item contact-item"><span class="about-me__contact-icon contact-icon"></span>' . esc_html($location) . '</div>';
                    }
                    ?>
                </div>
                <?php if ($info_item_repeater) { ?>
                    <div class="about-me__experience-info">
                        <?php foreach ($info_item_repeater as $item) {
                            $quantity   = get_field_value($item, 'quantity');
                            $sign       = get_field_value($item, 'sign');
                            $item_title = get_field_value($item, 'item_title');
                            $item_text  = get_field_value($item, 'item_text');
                            ?>
                            <div class="about-me__experience">
                                <div class="about-me__experience-title-wrap">
                                    <div class="about-me__experience-number-wrap">
                                        <?php
                                        echo ($quantity)
                                            ? '<span class="about-me__experience-quantity">' . do_shortcode($quantity) . '</span>'
                                            : '';

                                        echo ($sign)
                                            ? '<span class="about-me__experience-sign">' . do_shortcode($sign) . '</span>'
                                            : '';
                                        ?>
                                    </div>
                                    <div class="about-me__experience-title">
                                        <?php echo do_shortcode($item_title); ?>
                                    </div>
                                </div>
                                <div class="about-me__experience-text">
                                    <?php echo do_shortcode($item_text); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
                echo ($quote_text)
                    ? '<div class="about-me__quote">' . do_shortcode($quote_text) . '</div>'
                    : '';
                ?>
            </div>
        </div>
    </div>
</section>
