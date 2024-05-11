<?php

class WCP_Dashboard_User
{
    private $db,
        $user_id,
        $courseTable,
        $studentTable;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->user_id = get_current_user_id();
        $this->courseTable = $this->db->prefix . 'wcp_course';
        $this->studentTable = $this->db->prefix . 'wcp_course_students';
    }
    public function findUserCourse()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->courseTable} INNER JOIN 
        {$this->studentTable} ON {$this->courseTable} . c_id = {$this->studentTable} . c_id 
        WHERE {$this->studentTable} . user_id = {$this->user_id}");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
}
