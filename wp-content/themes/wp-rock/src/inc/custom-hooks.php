<?php
/**
 * Custom hooks
 *
 * @package WP-rock/custom-hooks
 */

/**
 * Remove windows LSEP from content
 *
 * @param { string } $html - Text content.
 * @return array|string|string[]
 */
function remove_lsep( $html ): array|string {
    $pattern = '/\x{2028}/u';
    return preg_replace( $pattern, '', $html );
}
