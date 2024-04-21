<?php

class Course
{
    public $db;
    public $table;
    public $meta_table;
    public $references_table;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course';
        $this->meta_table = $this->db->prefix . 'wcp_coursemeta';
        $this->references_table = $this->db->prefix . 'wcp_course_references';
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
    public function find_course_meta($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->meta_table} WHERE c_slug = %s", $c_slug));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function course_level($level)
    {
        switch ($level) {
            case 0:
                return '<p class="text-primary">مقدماتی</p>';
                break;
            case 1:
                return '<p class="text-warning">متوسط</p>';
                break;
            case 2:
                return '<p class="text-danger">پیشرفته</p>';
                break;
        }
    }
    public function course_lang($lang)
    {
        switch ($lang) {
            case 0:
                return '<p>فارسی</p>';
                break;
            case 1:
                return '<p>انگلیسی</p>';
                break;
        }
    }
    public function course_type($type)
    {
        switch ($type) {
            case 0:
                return '<p>رایگان</p>';
                break;
            case 1:
                return '<p>غیر رایگان</p>';
                break;
        }
    }
    public function find_references($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_results($this->db->prepare("SELECT * FROM {$this->references_table} WHERE c_slug = %s", $c_slug));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
}
