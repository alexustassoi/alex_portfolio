<?php
/**
 * Custom footer template
 *
 * @package WP-rock
 */

global $global_options;

$logo = get_field_value( $global_options, 'logo' );
?>
<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="site-footer__wrapper">
            <div class="site-footer__logo-nav">
                <a href="<?php echo esc_url( get_home_url() ); ?>">
                    <img class="site-footer__logo" src="<?php echo esc_attr( $logo ); ?>"
                         alt="Logo"/>
                </a>
                <div class="site-footer__menu-wrapper">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_menu',
                            'container'      => 'ul',
                            'menu_class'     => 'site-footer__menu',
                        )
                    )
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
