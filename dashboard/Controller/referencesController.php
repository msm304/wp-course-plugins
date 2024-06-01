<?php
class referencesController extends Handler
{

    public function index()
    {
        $courses = new WCP_Dashboard_Courses();
        $find_course_item = $courses->findCoursesByName();
        $params = [
            'find_course_item' => $find_course_item,
        ];
        View::LoadView('View.ReferencesView', $params);
    }
}
