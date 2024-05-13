<?php

class studentsController extends Handler
{
    public function __construct()
    {
    }

    public function index()
    {
        $students = new WCP_Dashboard_Student();
        $params = [
            'students' => $students->find()
        ];
        View::LoadView('View.StudentsView', $params);
    }
}
