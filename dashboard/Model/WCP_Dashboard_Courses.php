<?php
class WCP_Dashboard_Courses
{
    private $db,
        $courseTable,
        $courseMetaTable;
    public $course_result;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->courseTable = $this->db->prefix . 'wcp_course';
        $this->courseMetaTable = $this->db->prefix . 'wcp_coursemeta';
    }

    public function findCourses()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->courseTable} INNER JOIN {$this->courseMetaTable} ON {$this->courseTable}.c_id = {$this->courseMetaTable}.c_id");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function findCourseById($course_id)
    {
        $stmt = $this->db->get_row($this->db->prepare("SELECT * FROM {$this->courseTable} INNER JOIN {$this->courseMetaTable} ON {$this->courseTable}.c_id = {$this->courseMetaTable}.c_id WHERE {$this->courseTable}.c_id = %d", $course_id));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function findCoursesByName()
    {
        $stmt = $this->db->get_results("SELECT id, c_title, c_slug, c_id FROM {$this->courseTable} ORDER BY c_id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function update($data, $cid)
    {

        $format_course = ['%s', '%s', '%d', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s'];
        $format_course_meta = ['%s', '%d', '%d', '%s', '%s', '%s', '%s'];
        $where = ['c_id' => $cid];
        $where_format = ['%d'];

        $course = $this->db->update($this->courseTable, $data['course'], $where, $format_course, $where_format);
        // var_dump($this->db->last_error);
        // var_dump($course);
        $course_meta = $this->db->update($this->courseMetaTable, $data['course_meta'], $where, $format_course_meta, $where_format);
        if ($course && $course_meta) {
            FlashMessage::addMsg('دوره مورد نظر با موفقیت بروز رسانی گردید.', 1);
        } else {
            FlashMessage::addMsg('خطایی در بروز رسانی دوره مورد نظر رخ داده است !!!', 0);
        }
    }

    public function add($data)
    {
        // var_dump($data);
        $format_course = ['%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s'];
        $format_course_meta = ['%d', '%s', '%d', '%d', '%s', '%s', '%s', '%s'];

        $course = $this->db->insert($this->courseTable, $data['course'], $format_course);
        $course_meta = $this->db->insert($this->courseMetaTable, $data['course_meta'], $format_course_meta);
        if ($course && $course_meta) {
            FlashMessage::addMsg('دوره مورد نظر با موفقیت اضافه گردید.', 1);
        } else {
            FlashMessage::addMsg('خطایی در افزودن دوره رخ داده است !!!', 0);
        }
    }
}
