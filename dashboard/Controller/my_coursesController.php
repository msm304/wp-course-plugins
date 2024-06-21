<?php

class my_coursesController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user_course = new WCP_Dashboard_User();
        $params = [
            'user_courses' => $user_course->findUserCourses()
        ];
        $current_user = wp_get_current_user();
        View::LoadView('View.MyCourseView', $params);
    }
}
