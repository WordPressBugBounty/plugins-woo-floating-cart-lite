<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * IMPORTANT:
 *      This file will be loaded based on the order of the plugins load.
 *      If there's a plugin using XT Framework, the plugin's essential
 *      file will always load first.
 *
 * @package     XTFW_Framework
 * @copyright   Copyright (c) 2019, XplodedThemes, Inc.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * @since       1.0.0
 */


#region Core Redirect (copied from BuddyPress) -----------------------------------------

if (!function_exists('xtfw_redirect')) {
    /**
     * Redirects to another page, with a workaround for the IIS Set-Cookie bug.
     *
     * @link  http://support.microsoft.com/kb/q176113/
     * @since 1.5.1
     * @uses  apply_filters() Calls 'wp_redirect' hook on $location and $status.
     *
     * @param string $location The path to redirect to.
     * @param bool $exit If true, exit after redirect (Since 1.2.1.5).
     * @param int $status Status code to use.
     *
     * @return bool False if $location is not set
     */
    function xtfw_redirect($location, $exit = true, $status = 302)
    {
        global $is_IIS;

        $file = '';
        $line = '';
        if (headers_sent($file, $line)) {
            if (XTFW_DEBUG && class_exists('XTFW_Admin_Notices')) {
                $notices = new XTFW_Admin_Notices();

                $notices->add_error("XT Framework failed to redirect the page because the headers have been already sent from line <b><code>{$line}</code></b> in file <b><code>{$file}</code></b>. If it's unexpected, it usually happens due to invalid space and/or EOL character(s).");
            }

            return false;
        }

        if (defined('DOING_AJAX')) {
            // Don't redirect on AJAX calls.
            return false;
        }

        if (!$location) // allows the wp_redirect filter to cancel a redirect
        {
            return false;
        }

        $location = xtfw_sanitize_redirect($location);

        if ($is_IIS) {
            header("Refresh: 0;url=$location");
        } else {
            if (php_sapi_name() != 'cgi-fcgi') {
                status_header($status);
            } // This causes problems on IIS and some FastCGI setups
            header("Location: $location");
        }

        if ($exit) {
            exit();
        }

        return true;
    }

    if (!function_exists('xtfw_sanitize_redirect')) {
        /**
         * Sanitizes a URL for use in a redirect.
         *
         * @param string $location
         *
         * @return string redirect-sanitized URL
         * @since 2.3
         *
         */
        function xtfw_sanitize_redirect($location)
        {
            $location = preg_replace('|[^a-z0-9-~+_.?#=&;,/:%!]|i', '', $location);
            $location = xtfw_kses_no_null($location);

            // remove %0d and %0a from location
            $strip = array('%0d', '%0a');
            $found = true;
            while ($found) {
                $found = false;
                foreach ((array)$strip as $val) {
                    while (strpos($location, $val) !== false) {
                        $found = true;
                        $location = str_replace($val, '', $location);
                    }
                }
            }

            return $location;
        }
    }

    if (!function_exists('xtfw_kses_no_null')) {
        /**
         * Removes any NULL characters in $string.
         *
         * @param string $string
         *
         * @return string
         * @since 1.0.0
         *
         */
        function xtfw_kses_no_null($string)
        {
            $string = preg_replace('/\0+/', '', $string);
            $string = preg_replace('/(\\\\0)+/', '', $string);

            return $string;
        }
    }
}

#endregion Core Redirect (copied from BuddyPress) -----------------------------------------


if (!function_exists('xtfw_dir_url')) {
    /**
     * Generates an absolute URL to the given path. This function ensures that the URL will be correct whether the dir
     * is inside a plugin's folder.
     *
     * @param string $dir_abs_path Dir's absolute path.
     *
     * @return string Dir's URL.
     * @author XplodedThemes
     * @since  1.0.0
     *
     */
    function xtfw_dir_url($dir_abs_path)
    {
        // plugins_url() resolves the URL of the folder holding the given file, including
        // custom plugin directories, mu-plugins and symlinked plugins.
        $dir_abs_path = untrailingslashit(xtfw_normalize_path($dir_abs_path));

        return untrailingslashit(plugins_url('', $dir_abs_path . '/index.php'));
    }
}

if (!function_exists('xtfw_get_plugins')) {
    /**
     * @param bool $delete_cache
     *
     * @return array
     * @author XplodedThemes
     * @since 1.0.0
     *
     */
    function xtfw_get_plugins($delete_cache = false)
    {
        $cached_plugins = wp_cache_get('plugins', 'plugins');
        if (!is_array($cached_plugins)) {
            $cached_plugins = array();
        }

        $plugin_folder = '';
        if (isset($cached_plugins[$plugin_folder])) {
            $plugins = $cached_plugins[$plugin_folder];
        } else {
            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            $plugins = get_plugins();

            if ($delete_cache && is_plugin_active('woocommerce/woocommerce.php')) {
                wp_cache_delete('plugins', 'plugins');
            }
        }

        return $plugins;
    }
}

if (!function_exists('xtfw_normalize_path')) {
    if (function_exists('wp_normalize_path')) {
        /**
         * Normalize a filesystem path.
         *
         * Replaces backslashes with forward slashes for Windows systems, and ensures
         * no duplicate slashes exist.
         *
         * @param string $path Path to normalize.
         *
         * @return string Normalized path.
         */
        function xtfw_normalize_path($path)
        {
            return wp_normalize_path($path);
        }
    } else {
        function xtfw_normalize_path($path)
        {
            $path = str_replace('\\', '/', $path);
            $path = preg_replace('|/+|', '/', $path);

            return $path;
        }
    }
}


if (!function_exists('xtfw_get_plugins')) {
    /**
     * @param bool $delete_cache
     *
     * @return array
     * @author XplodedThemes
     * @since 1.0.0
     *
     */
    function xtfw_get_plugins($delete_cache = false)
    {
        $cached_plugins = wp_cache_get('plugins', 'plugins');
        if (!is_array($cached_plugins)) {
            $cached_plugins = array();
        }

        $plugin_folder = '';
        if (isset($cached_plugins[$plugin_folder])) {
            $plugins = $cached_plugins[$plugin_folder];
        } else {
            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            $plugins = get_plugins();

            if ($delete_cache && is_plugin_active('woocommerce/woocommerce.php')) {
                wp_cache_delete('plugins', 'plugins');
            }
        }

        return $plugins;
    }
}

#endregion Core Redirect (copied from BuddyPress) -----------------------------------------
