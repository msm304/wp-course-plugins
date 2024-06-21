<?php

class ProfileController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params = [
            'current_user_display_name' => $this->get_current_user_display_name(),
            'current_user_email' => $this->get_current_user_email()
        ];
        View::LoadView('dashboard.ProfileView', $params);
    }

    private function get_current_user_display_name()
    {
        return wp_get_current_user()->display_name;
    }

    private function get_current_user_email()
    {
        return wp_get_current_user()->user_email;
    }
}
