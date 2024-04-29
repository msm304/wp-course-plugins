<?php

class WCP_User
{
    public $db;
    public $table;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course_students';
    }

    public function is_user_student()
    {
        $user_id = get_current_user_id();
        $stmt = $this->db->get_row($this->db->prepare("SELECT user_id FROM {$this->table} WHERE user_id =%d LIMIT 1", $user_id));
        if ($stmt) {
            return true;
        }
        return false;
    }
}
