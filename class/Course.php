<?php

class Course
{
    public $db;
    public $table;
    public $meta_table;
    public $references_table;
    public $video_table;
    public $teacher_table;
    public $students_table;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course';
        $this->meta_table = $this->db->prefix . 'wcp_coursemeta';
        $this->references_table = $this->db->prefix . 'wcp_course_references';
        $this->video_table = $this->db->prefix . 'wcp_course_video';
        $this->teacher_table = $this->db->prefix . 'wcp_course_teacher';
        $this->students_table = $this->db->prefix . 'wcp_course_students';
    }
    public function find()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->table} ORDER BY id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function find_by_slug($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->table} WHERE c_slug = %s", $c_slug));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function find_course_title($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_row($this->db->prepare("SELECT  c_title FROM {$this->table} WHERE c_slug = %s", $c_slug));
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
    public function find_course_video($c_slug, $r_number)
    {
        $c_slug = sanitize_text_field($c_slug);
        $r_number = sanitize_text_field($r_number);
        $stmt = $this->db->get_results($this->db->prepare("SELECT * FROM {$this->video_table} WHERE c_slug = %s AND r_number = %d", $c_slug, $r_number));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function find_course_teacher($t_id)
    {
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->teacher_table} WHERE t_id = %d", $t_id));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function get_course_meta($course_id, $key, $single = false)
    {
        $stmt = $this->db->get_row($this->db->prepare("SELECT {$key} FROM {$this->meta_table} WHERE c_id = %d", $course_id));
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
    public function count_course_teacher($t_id)
    {
        $t_id = sanitize_text_field($t_id);
        $count_course_teacher = $this->db->get_var($this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE t_id = %d", $t_id));
        if ($count_course_teacher) {
            return $count_course_teacher;
        }
        return false;
    }
    public function count_course_students($c_id)
    {
        $c_id = sanitize_text_field($c_id);
        $count_course_students = $this->db->get_var($this->db->prepare("SELECT COUNT(*) FROM {$this->students_table} WHERE c_id = %d", $c_id));
        if ($count_course_students) {
            return $count_course_students;
        }
        return false;
    }
    public function count_course()
    {
        $count_course = $this->db->get_var($this->db->prepare("SELECT COUNT(id) FROM {$this->table}"));
        if ($count_course) {
            return $count_course;
        }
        return '0';
    }
    public function count_teacher()
    {
        $count_course = $this->db->get_var($this->db->prepare("SELECT COUNT(id) FROM {$this->teacher_table}"));
        if ($count_course) {
            return $count_course;
        }
        return '0';
    }
    public function count_student()
    {
        $count_course = $this->db->get_var($this->db->prepare("SELECT COUNT(id) FROM {$this->students_table}"));
        if ($count_course) {
            return $count_course;
        }
        return '0';
    }
}
