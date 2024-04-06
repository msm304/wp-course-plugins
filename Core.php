<?php

/*
Plugin Name: پلاگین فروش دروره های آموزشی
Plugin URI: https://owebra.com/plugins/wp-course-plugin
Description: پلاگین فروش دروره های آموزشی
Author: Amirhosein Soltani
Version: 1.0.0
Licence: GPLv2 or Later
Author URI: https://owebra.com/resume
*/

use WpOrg\Requests\Exception\Transport;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

defined('ABSPATH') || exit;

class WCPCore
{
    public function __construct()
    {
        $this->define_constants();
        $this->init();
    }
    private function define_constants()
    {
        define('WCP_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('WCP_PLUGIN_URL', plugin_dir_url(__FILE__));
        define('WCP_PLUGIN_VIEW', WCP_PLUGIN_DIR . 'view/');
    }
    private function init()
    {
        include_once WCP_PLUGIN_DIR . 'class/AutoLoad.php';
        register_activation_hook(__FILE__, [$this, 'wp_wcp_activation']);
        register_deactivation_hook(__FILE__, [$this, 'wp_wcp_deactivation']);
        add_action('wp_enqueue_scripts', [$this, 'wp_wcp_register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'wp_wcp_register_assets_admin']);
        add_action('init', [$this, 'is_jdate_exists']);
        add_filter('template_redirect', [$this, 'ob_start']);

        // Include
        include_once(ABSPATH . 'wp-includes/pluggable.php');
        include_once WCP_PLUGIN_VIEW . 'front/course-page/course-page.php';
    }
    public function wp_wcp_register_assets()
    {
        // CSS
        wp_register_style('wcp-style', WCP_PLUGIN_URL . '/assets/css/styles.css', '', '1.0.0');
        wp_enqueue_style('wcp-style');

        // JS
        wp_register_script('vip-main-js', VIP_PLUGIN_URL . '/assets/js/front/main.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('vip-main-js');
    }
    public function wp_wcp_register_assets_admin()
    {
    }
    public function wp_wcp_activation()
    {
    }
    public function wp_wcp_deactivation()
    {
    }
    public function ob_start()
    {
        return ob_start(null, 0, 0);
    }
    public function is_jdate_exists()
    {
        if (!function_exists('jdate')) {
            include_once WCP_PLUGIN_DIR . '_lib/jdf.php';
        } else {
        }
    }
}
new WCPCore();
