<?php

class Course
{
    public $db;
    public $table;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course';
    }
    public function find($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->table} WHERE c_slug = %s", $c_slug));
        if ($stmt) {
            return $stmt;
        }
        return false; 
    }
}
