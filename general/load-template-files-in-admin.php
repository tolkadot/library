<?php
/**
 * Load Charitable template files in the admin area.
 *
 * Some plugins or themes attempt to run shortcodes in the admin
 * area, which can cause a fatal error with Charitable. The core
 * plugin attempts to avoid these errors where possible, but if
 * you are having problems with this, the function below should fix
 * the problem.
 */
function ed_charitable_load_template_files() {
	Charitable_Public::get_instance();

	if ( class_exists( 'Charitable_Ambassadors_Public' ) ) {
		Charitable_Ambassadors_Public::get_instance();
	}
}

add_action( 'admin_init', 'ed_charitable_load_template_files' );
