<?php


class coursesController extends Handler
{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
        parent::checkIsUserAdmin();
        $courses = new WCP_Dashboard_Courses();
        
        $params = [
            'courses' => $courses->findCourses(),
        ];
        View::LoadView('View.CoursesView', $params);
    }
}
