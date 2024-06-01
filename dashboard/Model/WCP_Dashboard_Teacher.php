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
        $stmt = $this->db->get_results("SELECT * FROM {$this->teacherTable} ORDER BY id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }
    public function add($data)
    {
        if ($this->isTeacherExists($data['t_id'])) {
            FlashMessage::addMsg('کاربر مورد نظر قبلا به عنوان مدرس ثبت شده است.', 0);
            return;
        }
        $format_teacher = ['%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'];
        $teacher = $this->db->insert($this->teacherTable, $data, $format_teacher);
        if ($teacher) {
            FlashMessage::addMsg('مدرس مورد نظر با موفقیت اضافه گردید.', 1);
        } else {
            FlashMessage::addMsg('خطایی در افزودن مدرس جدید رخ داده است !!!', 0);
        }
    }

    public function isTeacherExists($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->teacherTable} WHERE t_id = %d", $id);
        $stmt = $this->db->get_row($query);
        if($stmt){
            return true;
        }
        return false;
    }

}
