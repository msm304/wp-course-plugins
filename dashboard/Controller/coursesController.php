<?php


class coursesController extends Handler
{
    public function index()
    { 
        $courses = new WCP_Dashboard_Courses();
        
        $params = [
            'courses' => $courses->findCourses(),
        ];
        View::LoadView('View.CoursesView', $params);
    }
}
