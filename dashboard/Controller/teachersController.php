<?php

class teachersController extends Handler
{

    public function index()
    {
        $teachers = new WCP_Dashboard_Teacher();
        $params = [
            'teachers' => $teachers->find(),
        ];
        View::LoadView('View.TeachersView', $params);
    }
}
