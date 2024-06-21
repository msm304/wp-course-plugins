<?php

class studentsController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $students = new WCP_Dashboard_Student();
        if (isset($_POST['wcp_keyword'])) {
            $students->keyword = sanitize_text_field($_POST['wcp_keyword']);
        }
        $params = [
            'students' => $students->find(),
            'student_search_results' => $students->searchStudent(),
        ];
        View::LoadView('View.StudentsView', $params);
    }
}
