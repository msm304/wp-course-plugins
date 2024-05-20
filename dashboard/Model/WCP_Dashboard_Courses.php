<?php

class WCP_Dashboard_Courses
{
    private $db,
        $courseTable,
        $courseMetaTable;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->courseTable = $this->db->prefix . 'wcp_course';
        $this->courseMetaTable = $this->db->prefix . 'wcp_coursemeta';
    }
    public function findCourses()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->courseMetaTable} INNER JOIN 
        {$this->courseTable} ON {$this->courseMetaTable} . c_id = {$this->courseTable} . c_id");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function findCoursesById($course_id)
    {
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->courseTable} INNER JOIN 
        {$this->courseMetaTable} ON {$this->courseTable} . c_id = {$this->courseMetaTable} . c_id 
        WHERE {$this->courseMetaTable} . c_id = %d", $course_id));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function update()
    {
        
    }
}
