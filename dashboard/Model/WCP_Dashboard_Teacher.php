<?php

class WCP_Dashboard_Teacher
{
    private $db,
        $teacherTable;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->teacherTable = $this->db->prefix . 'wcp_course_teacher';
    }
    public function find()
    {
        $stmt = $this->db->get_results("SELECT t_id , t_fullname FROM {$this->teacherTable} ORDER BY id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
}
