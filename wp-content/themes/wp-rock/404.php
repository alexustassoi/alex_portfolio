<?php
/**
 * General template for 404 page
 *
 * @package WP-rock
 * @since 4.4.0
 */

get_header();

do_action( 'wp_rock_before_page_content' );
?>
<section class="section-404">
    <div class="content">
        <div class="subtitles">
            <span class="subtitleMBold">Oops!</span>
            
            <span class="subtitleM">
                     We can't seem to find the page you're looking for.
                </span>
        </div>
        <a class="button bodySmallBold button-primary" href="<?php echo esc_attr( get_home_url() ); ?>">Back to home</a>
    </div>
</section>
<?php do_action( 'wp_rock_after_page_content' ); ?>
<?php wp_footer(); ?>
