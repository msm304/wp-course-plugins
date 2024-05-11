<?php

class WCPAutoLoad
{
    private static $_instance = null;

    private function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    public static function _instance()
    {
        if (!self::$_instance) {
            self::$_instance = new WCPAutoLoad();
        }
        return self::$_instance;
    }

    public function load($class)
    {
        if (is_readable(trailingslashit(WCP_PLUGIN_DIR . 'class') . $class . '.php') || is_readable(trailingslashit(WCP_PLUGIN_DIR . 'dashboard') . $class . '.php')|| is_readable(trailingslashit(WCP_PLUGIN_DIR . 'dashboard/Model') . $class . '.php')) {
            if (file_exists(trailingslashit(WCP_PLUGIN_DIR . 'class') . $class . '.php')) {
                include_once trailingslashit(WCP_PLUGIN_DIR . 'class') . $class . '.php';
            }
            if (file_exists(trailingslashit(WCP_PLUGIN_DIR . 'dashboard') . $class . '.php')) {
                include_once trailingslashit(WCP_PLUGIN_DIR . 'dashboard') . $class . '.php';
            }
            if (file_exists(trailingslashit(WCP_PLUGIN_DIR . 'dashboard/Model') . $class . '.php')) {
                include_once trailingslashit(WCP_PLUGIN_DIR . 'dashboard/Model') . $class . '.php';
            }
        }
        return;
    }
}

WCPAutoLoad::_instance();
