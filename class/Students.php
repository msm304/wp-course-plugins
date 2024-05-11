<?php

class Students
{
    public $db;
    public $table;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course_students';
    }

    public function find()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->table} ORDER BY id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function find_by_email($email, $key, $single = false)
    {
        $email = sanitize_text_field($email);
        $stmt = $this->db->get_row($this->db->prepare("SELECT {$key} FROM {$this->table} WHERE email = %d", $email));
        if ($stmt) {
            switch ($single) {
                case false:
                    return $stmt;
                    break;
                case true:
                    return $stmt->$key;
                    break;
            }
        }
        return false;
    }
}
