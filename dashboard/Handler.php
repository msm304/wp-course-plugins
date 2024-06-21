<?php

abstract class Handler
{
    public function __construct()
    {
        $this->checkIsUserLoggedIn();
        $this->checkIsUserAdmin();
    }
    abstract protected function index();

    protected function checkIsUserLoggedIn()
    {
        if (!is_user_logged_in()) {
            wp_redirect(site_url());
        }
    }
    protected function checkIsUserAdmin()
    {
        if (!current_user_can('manage_options')) {
            wp_redirect(site_url());
        }
    }
}
