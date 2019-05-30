<?php
/**
 * verticalmenu back compat functionality
 *
 * Prevents verticalmenu from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package verticalmenu
 * 
 * @since verticalmenu 1.0
 */
/**
 * Prevent switching to verticalmenu on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'verticalmenu_upgrade_notice' );
}
add_action( 'after_switch_theme', 'verticalmenu_switch_theme' );
/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * verticalmenu on WordPress versions prior to 4.1.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_upgrade_notice() {
	$message = sprintf( __( 'verticalmenu requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'verticalmenu' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}
/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_customize() {
	wp_die( sprintf( __( 'verticalmenu requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'verticalmenu' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'verticalmenu_customize' );
/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'verticalmenu requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'verticalmenu' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'verticalmenu_preview' );