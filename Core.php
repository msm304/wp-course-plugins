<?php

/*
Plugin Name: پلاگین فروش دوره های آموزشی
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
        define('WCP_DASHBOARD_VIEW', WCP_PLUGIN_DIR . 'dashboard/');
    }
    private function init()
    {
        include_once WCP_PLUGIN_DIR . 'class/AutoLoad.php';
        register_activation_hook(__FILE__, [$this, 'wp_wcp_activation']);
        register_deactivation_hook(__FILE__, [$this, 'wp_wcp_deactivation']);
        add_action('get_header', [$this, 'wp_wcp_register_course_header_assets']);
        // add_action('admin_enqueue_scripts', [$this, 'wp_wcp_register_assets_admin']);
        add_action('wp_enqueue_scripts', [$this, 'wp_wcp_register_assets_dashboard']);
        add_action('init', [$this, 'wp_wcp_is_jdate_exists']);
        add_filter('template_redirect', [$this, 'ob_start']);

        // Include
        include_once(ABSPATH . 'wp-includes/pluggable.php');
        include_once WCP_PLUGIN_DIR . 'dashboard/router.php';
        include_once WCP_PLUGIN_VIEW . 'front/course-page/course-page.php';
        include_once WCP_PLUGIN_VIEW . 'front/course-sliders/course-slider.php';
        include_once WCP_PLUGIN_VIEW . 'front/course-sliders/course-feedback-slider.php';
    }
    public function wp_wcp_register_assets()
    {
        // CSS
        wp_register_style('wcp-main-style', WCP_PLUGIN_URL . '/assets/css/styles.css', '', '1.0.0');
        wp_enqueue_style('wcp-main-style');
        wp_register_style('wcp-dashboard-style', WCP_PLUGIN_URL . '/assets/css/dashboard/styles.css', '', '1.0.0');
        wp_enqueue_style('wcp-dashboard-style');

        // JS
        wp_register_script('wcp-bootstrap-js', WCP_PLUGIN_URL . '/assets/js/bootstrap.min.js', ['jquery'], '4.6.0', true);
        wp_enqueue_script('wcp-bootstrap-js');
        wp_register_script('wcp-slick-js', WCP_PLUGIN_URL . '/assets/js/slick.js', ['jquery'], '1.6.0', true);
        wp_enqueue_script('wcp-slick-js');
        wp_register_script('toast-js', WCP_PLUGIN_URL . '/assets/js/jquery.toast.js', ['jquery'], '1.6.0', true);
        wp_enqueue_script('toast-js');
        wp_register_script('countMe', WCP_PLUGIN_URL . '/assets/js/countMe.min.js', ['jquery'], '1.6.0', true);
        wp_enqueue_script('countMe');
        wp_register_script('wcp-main-js', WCP_PLUGIN_URL . '/assets/js/main.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('wcp-main-js');
        wp_enqueue_script('wcp-ajax', WCP_PLUGIN_URL . 'assets/js/ajax.js', ['jquery'], '1.0.0', '');
        wp_localize_script('wcp-ajax', 'wcp_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            '_nonce' => wp_create_nonce()
        ]);
    }
    public function wp_wcp_register_assets_dashboard()
    {
        //CSS
        wp_register_style('jalali-datepicker', 'https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css', '', '1.0.0');
        wp_enqueue_style('jalali-datepicker');
        wp_register_style('bootstrap-5-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', '', '5.0.2');
        wp_enqueue_style('bootstrap-5-style');
        wp_register_style('wcp-style-dashboard', WCP_PLUGIN_URL . '/assets/dashboard/css/style.css', '', '1.0.0');
        wp_enqueue_style('wcp-style-dashboard');

        //JS
        wp_register_script('wcp-bootstrap-5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', '', '5.0.2', true);
        wp_enqueue_script('wcp-bootstrap-5-js');
        wp_register_script('jalali-datepicker-js', 'https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js', '', '1.0.0', true);
        wp_enqueue_script('jalali-datepicker-js');
        wp_register_script('jquery.toast-js', WCP_PLUGIN_URL . '/assets/dashboard/js/jquery.toast.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('jquery.toast-js');
        wp_register_script('main-dashboard-js', WCP_PLUGIN_URL . '/assets/dashboard/js/main.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('main-dashboard-js');
        wp_enqueue_script('wcp-ajax-dashboard', WCP_PLUGIN_URL . 'assets/dashboard/js/ajax.js', ['jquery'], '1.0.0', '');
        wp_localize_script('wcp-ajax-dashboard', 'wcp_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            '_nonce' => wp_create_nonce()
        ]);
    }
    public function wp_wcp_activation()
    {
        $this->wp_wcp_create_course_template_file();
        $this->wp_wcp_create_course_custome_header();
    }
    public function wp_wcp_deactivation()
    {
    }
    public function ob_start()
    {
        return ob_start(null, 0, 0);
    }
    public function wp_wcp_is_jdate_exists()
    {
        if (!function_exists('jdate')) {
            include_once WCP_PLUGIN_DIR . '_lib/jdf.php';
        } else {
        }
    }
    public function wp_wcp_create_course_template_file()
    {
        $theme_directory_path = get_template_directory();
        $file_name = 'course-template.php';
        $flie_contents = '<?php /* Template Name: دوره های آموزشی */ ?>' . PHP_EOL . '<?php get_header(); ?>' . PHP_EOL .
            '<?php' . PHP_EOL .
            'if (have_posts()) :' . PHP_EOL .
            'while (have_posts()) : the_post();' . PHP_EOL .
            'the_content();' . PHP_EOL .
            'endwhile;' . PHP_EOL .
            'endif;' . PHP_EOL .
            '?>' . PHP_EOL .
            '<?php get_footer(); ?>';
        if (!is_file($file_name && !file_exists($file_name))) {
            $create_file = fopen($theme_directory_path . '/' . $file_name, 'w+');
            fwrite($create_file, $flie_contents);
            fclose($create_file);
        }
    }
    public function wp_wcp_create_course_custome_header()
    {
        $theme_directory_path = get_template_directory();
        $file_name = 'header-course.php';
        $flie_contents = '<!DOCTYPE html> ' . PHP_EOL .
            '<html <?php language_attributes(); ?>>' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="UTF-8">' . PHP_EOL .
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL .
            '<title><?php echo wp_title(); ?></title>' . PHP_EOL .
            '<?php wp_head(); ?>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body <?php body_class(); ?>>;';
        if (!is_file($file_name && !file_exists($file_name))) {
            $create_file = fopen($theme_directory_path . '/' . $file_name, 'w+');
            fwrite($create_file, $flie_contents);
            fclose($create_file);
        }
    }
    public function wp_wcp_register_course_header_assets($name)
    {
        if ($name = 'course') {
            add_action('wp_enqueue_scripts', [$this, 'wp_wcp_register_assets']);
        }
    }
}
new WCPCore();
new Course();
new Comment();
new WCP_User();
