<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nielsoffice197227997.wordpress.com/
 * @since             1.0.0
 * @package           Getratings
 *
 * @wordpress-plugin
 * Plugin Name:       GetRatings
 * Plugin URI:        https://github.com/nielsofficeofficial/WP_GetRatings
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            nielsoffice
 * Author URI:        https://nielsoffice197227997.wordpress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       getratings
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GETRATINGS_VERSION', '1.0.0' );

/**
 * Defined: Installing phpwine.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
$phpwine = new class {
        
    public function __construct() {
      
      $this->php_wine('autoload');

	  new \PHPWineVanillaFlavour\Wine\Optimizer\Html;
      new \PHPWineVanillaFlavour\Wine\Optimizer\EnhancerElem; // this is mandatory when dev use merge !
      new \PHPWineVanillaFlavour\Wine\Optimizer\HtmlH1;  // follow by merge version HTML_H1 and so on!...
      new \PHPWineVanillaFlavour\Wine\Optimizer\HtmlDiv;
      
    }

    private function php_wine(string $autoload) : void {

      require dirname(__FILE__) . DIRECTORY_SEPARATOR .'vendor/' . $autoload.'.'.'php';

    }

 }; 

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-getratings-activator.php
 */
function activate_getratings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-getratings-activator.php';
	Getratings_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-getratings-deactivator.php
 */
function deactivate_getratings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-getratings-deactivator.php';
	Getratings_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_getratings' );
register_deactivation_hook( __FILE__, 'deactivate_getratings' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-getratings.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_getratings() {

	$plugin = new Getratings();
	$plugin->run();

}
run_getratings();
