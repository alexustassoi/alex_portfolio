<?php
/**
 * Custom header template
 *
 * @package WP-rock
 */

global $global_options;

$logo = get_field_value( $global_options, 'logo' );
?>

<header id="site-header" class="site-header">
    <div class="container">
        <div class="site-header__header-wrapper">
            <div class="site-header__logo-wrap">
                <a href="<?php echo esc_html( get_home_url() ); ?>">
                    <img class="site-header__logo"
                         src="<?php echo esc_attr( $logo ); ?>" alt="Logo"/>
                </a>
            </div>
            <div class="site-header__menu-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary_menu',
                        'container'      => 'ul',
                        'menu_class'     => 'site-header__menu',
                    )
                )
                ?>
            </div>
        </div>
    </div>

</header>
