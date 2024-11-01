<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       ZimRate
 * Plugin URI:        http://zimrate.tyganeutronics.com
 * Description:       All Zimbabwean exchange rates from multiple sites in one plugin. No need to scrounge the internet for the current days rate.
 * Version:           1.1.3
 * Author:            Tyganeutronics
 * Author URI:        https://tyganeutronics.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zimrate
 * Domain Path:       /languages
 * @package           Zimrate
 *
 * @link              https://tyganeutronics.com
 * @since             1.0.0
 */

// If this file is called directly, abort.

if (!defined('WPINC')) {
    die();
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ZIMRATE_VERSION', '1.1.3');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zimrate-activator.php
 */
function activate_zimrate()
{
    require_once plugin_dir_path(__FILE__) .
        'includes/class-zimrate-activator.php';
    Zimrate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zimrate-deactivator.php
 */
function deactivate_zimrate()
{
    require_once plugin_dir_path(__FILE__) .
        'includes/class-zimrate-deactivator.php';
    Zimrate_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_zimrate');
register_deactivation_hook(__FILE__, 'deactivate_zimrate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-zimrate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zimrate()
{
    $plugin = new Zimrate();
    $plugin->run();
}

run_zimrate();