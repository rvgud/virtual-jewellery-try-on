<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://dugudlabs.com
 * @since      1.0.0
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/includes
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */
class Virtual_Jewellery_Try_On_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'virtual-jewellery-try-on',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
