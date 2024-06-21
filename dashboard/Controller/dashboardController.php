<?php

class dashboardController extends Handler
{

    public function index()
    {
        // $user_course = new WCP_Dashboard_User();
        // $params = [
        //     'user_courses' => $user_course->findUserCourse()
        // ];
        $current_user = wp_get_current_user();
        View::LoadView('View.DashboardView', []);
    }
}
