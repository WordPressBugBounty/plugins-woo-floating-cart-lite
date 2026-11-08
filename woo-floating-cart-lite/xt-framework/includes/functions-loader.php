<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * XT Framework loader functions.
 *
 * Used by start.php to find the newest framework copy among the active XT plugins and load it first.
 * Older framework copies define these functions together in one file, and decide whether to load that
 * file by checking xtfw_find_caller_plugin_file(), so they must stay grouped here.
 *
 * WordPress.org packages don't include this file; their start.php picks the newest copy on
 * plugins_loaded instead.
 *
 * @package     XTFW_Framework
 * @copyright   Copyright (c) 2019, XplodedThemes, Inc.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * @since       2.5.19
 */

/**
 * Leverage backtrace to find caller plugin main file path.
 *
 * @return string
 * @since  1.0.0
 *
 * @author XplodedThemes
 */
function xtfw_find_caller_plugin_file()
{
    /**
     * All the code below will be executed once on activation.
     * If the user changes the main plugin's file name, the file_exists()
     * will catch it.
     */
    if (!function_exists('get_plugins')) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    $all_plugins = xtfw_get_plugins(true);
    $all_plugins_paths = array();

    // Get active plugin's main files real full names (might be symlinks).
    foreach ($all_plugins as $relative_path => $data) {
        $all_plugins_paths[] = xtfw_normalize_path(realpath(WP_PLUGIN_DIR . '/' . $relative_path));
    }

    $plugin_file = null;
    // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_debug_backtrace -- Finds which plugin file loaded the framework (the same technique the Freemius SDK uses).
    for ($i = 1, $bt = debug_backtrace(), $len = count($bt); $i < $len; $i++) {
        if (empty($bt[$i]['file'])) {
            continue;
        }

        if (in_array(xtfw_normalize_path($bt[$i]['file']), $all_plugins_paths)) {
            $plugin_file = $bt[$i]['file'];
            break;
        }
    }

    if (is_null($plugin_file)) {
        // Throw an error to the developer in case of some edge case dev environment.
        wp_die(
            'XT FrameWork couldn\'t find the plugin\'s main file. Please contact support@xplodedthemes.com with the current error.',
            'Error',
            array('back_link' => true)
        );
    }

    return $plugin_file;
}

/**
 * Find the plugin main file path based on any given file inside the plugin's folder.
 *
 * @param string $file Absolute path to a file inside a plugin's folder.
 *
 * @return string
 * @author Vova Feldman (@svovaf)
 * @since  1.1.7.1
 *
 */
function xtfw_find_direct_caller_plugin_file($file)
{
    /**
     * All the code below will be executed once on activation.
     * If the user changes the main plugin's file name, the file_exists()
     * will catch it.
     */
    $all_plugins = xtfw_get_plugins(true);

    $file_real_path = xtfw_normalize_path(realpath($file));

    // Get active plugin's main files real full names (might be symlinks).
    foreach ($all_plugins as $relative_path => $data) {
        if (0 === strpos($file_real_path, xtfw_normalize_path(dirname(realpath(WP_PLUGIN_DIR . '/' . $relative_path))))) {
            if ('.' !== dirname(trailingslashit($relative_path))) {
                return $relative_path;
            }
        }
    }

    return null;
}

/**
 * Update SDK newest version reference.
 *
 * @param string $fw_relative_path
 * @param string|bool $plugin_file
 *
 * @author XplodedThemes
 * @since  1.0.0
 *
 * @global            $xtfw_active_plugins
 */
function xtfw_update_fw_newest_version($fw_relative_path, $plugin_file = false)
{

    global $xtfw_active_plugins;

    $newest_fw = $xtfw_active_plugins->plugins[$fw_relative_path];

    if (!is_string($plugin_file)) {
        $plugin_file = plugin_basename(xtfw_find_caller_plugin_file());
    }

    $in_activation = function_exists('is_plugin_active') && (!is_plugin_active($plugin_file));

    $xtfw_active_plugins->newest = (object)array(
        'plugin_path' => $plugin_file,
        'fw_path' => $fw_relative_path,
        'version' => $newest_fw->version,
        'in_activation' => $in_activation,
        'timestamp' => time(),
    );

    // Update DB with latest SDK version and path.
    update_option('xtfw_active_plugins', $xtfw_active_plugins);
}

/**
 * Reorder the plugins load order so the plugin with the newest Freemius SDK is loaded first.
 *
 * @return bool Was plugin order changed. Return false if plugin was loaded first anyways.
 *
 * @since  1.0.0
 *
 * @author XplodedThemes
 * @global $xtfw_active_plugins
 */
function xtfw_newest_fw_plugin_first()
{

    global $xtfw_active_plugins;

    /**
     * @todo Multi-site network activated plugin are always loaded prior to site plugins so if there's a plugin activated in the network mode that has an older version of the SDK of another plugin which is site activated that has new SDK version, the fs-essential-functions.php will be loaded from the older SDK. Same thing about MU plugins (loaded even before network activated plugins).
     *
     * @link https://github.com/Freemius/wordpress-sdk/issues/26
     */

    $newest_fw_plugin_path = $xtfw_active_plugins->newest->plugin_path;

    $active_plugins = get_option('active_plugins', array());
    $updated_active_plugins = array($newest_fw_plugin_path);

    $plugin_found = false;
    $is_first_path = true;

    foreach ($active_plugins as $key => $plugin_path) {
        if ($plugin_path === $newest_fw_plugin_path) {
            if ($is_first_path) {
                // if it's the first plugin already, no need to continue
                return false;
            }

            $plugin_found = true;

            // Skip the plugin (it is already added as the 1st item of $updated_active_plugins).
            continue;
        }

        $updated_active_plugins[] = $plugin_path;

        if ($is_first_path) {
            $is_first_path = false;
        }
    }

    if ($plugin_found) {
        update_option('active_plugins', $updated_active_plugins);

        return true;
    }

    if (is_multisite()) {
        // Plugin is network active.
        $network_active_plugins = get_site_option('active_sitewide_plugins', array());

        if (isset($network_active_plugins[$newest_fw_plugin_path])) {
            reset($network_active_plugins);
            if ($newest_fw_plugin_path === key($network_active_plugins)) {
                // Plugin is already activated first on the network level.
                return false;
            } else {
                $time = $network_active_plugins[$newest_fw_plugin_path];

                // Remove plugin from its current position.
                unset($network_active_plugins[$newest_fw_plugin_path]);

                // Set it to be included first.
                $network_active_plugins = array($newest_fw_plugin_path => $time) + $network_active_plugins;

                update_site_option('active_sitewide_plugins', $network_active_plugins);

                return true;
            }
        }
    }

    return false;
}

/**
 * Go over all Freemius SDKs in the system and find and "remember"
 * the newest SDK which is associated with an active plugin.
 *
 * @author XplodedThemes
 * @since  1.0.0
 *
 * @global $xtfw_active_plugins
 */
function xtfw_fallback_to_newest_active_fw()
{
    global $xtfw_active_plugins;

    /**
     * @var object $newest_fw_data
     */
    $newest_fw_data = null;
    $newest_fw_path = null;

    foreach ($xtfw_active_plugins->plugins as $fw_relative_path => $data) {
        if (is_null($newest_fw_data) || version_compare($data->version, $newest_fw_data->version, '>')
        ) {
            // If plugin inactive or SDK starter file doesn't exist, remove SDK reference.

            $is_module_active = is_plugin_active($data->plugin_path);

            $is_fw_exists = file_exists(xtfw_normalize_path(WP_PLUGIN_DIR . '/' . $fw_relative_path . '/start.php'));

            if (!$is_module_active || !$is_fw_exists) {
                unset($xtfw_active_plugins->plugins[$fw_relative_path]);

                // No need to store the data since it will be stored in xtfw_update_fw_newest_version()
                // or explicitly with update_option().
            } else {
                $newest_fw_data = $data;
                $newest_fw_path = $fw_relative_path;
            }
        }
    }

    if (is_null($newest_fw_data)) {
        // Couldn't find any SDK reference.
        $xtfw_active_plugins = new stdClass();
        update_option('xtfw_active_plugins', $xtfw_active_plugins);
    } else {
        xtfw_update_fw_newest_version($newest_fw_path, $newest_fw_data->plugin_path);
    }
}

/**
 * Queue some JavaScript code to be output in the footer.
 *
 * @param string $code Code.
 */
function xtfw_enqueue_js($code)
{

    global $xtfw_queued_js;

    if (empty($xtfw_queued_js)) {
        $xtfw_queued_js = '';
    }

    $xtfw_queued_js .= "\n" . $code . "\n";
}

/**
 * Output any queued javascript code in the footer.
 */
function xtfw_print_queued_js()
{

    global $xtfw_queued_js;

    if (!empty($xtfw_queued_js)) {

        // Sanitize.
        $xtfw_queued_js = wp_check_invalid_utf8($xtfw_queued_js);
        $xtfw_queued_js = preg_replace('/&#(x)?0*(?(1)27|39);?/i', "'", $xtfw_queued_js);
        $xtfw_queued_js = str_replace("\r", '', $xtfw_queued_js);

        $js = "jQuery(function($) { $xtfw_queued_js });";

        /**
         * Queued jsfilter.
         *
         * @param string $js JavaScript code.
         *
         * @since 21.0.0
         */
        $js = apply_filters('xtfw_queued_js', $js);

        $handle = 'xtfw-queued-js';
        $version = defined( 'XTFW_VERSION' ) ? XTFW_VERSION : null;

        wp_register_script( $handle, false, array( 'jquery' ), $version, true );
        wp_add_inline_script( $handle, trim( $js ) );
        wp_enqueue_script( $handle );
    }
}

add_action('admin_print_footer_scripts', 'xtfw_print_queued_js', 1);
add_action('wp_print_footer_scripts', 'xtfw_print_queued_js', 1);
