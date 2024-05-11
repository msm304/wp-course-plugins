<?php

class UserController extends Handler
{
    public function __construct()
    {
    }

    public function index()
    {
        var_dump(123456);
        echo $_GET['user_id'];
    }
}
