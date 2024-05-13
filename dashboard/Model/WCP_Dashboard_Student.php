<?php

class WCP_Dashboard_Student
{
    private $db,
        $studentTable;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->studentTable = $this->db->prefix . 'wcp_course_students';
        add_action('wp_ajax_deleteStudent', [$this, 'deleteStudent']);
    }

    public function find()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->studentTable} ORDER BY id DESC");
        if($stmt){
            return $stmt;
        }
        return false;
    }

    public function deleteStudent()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $where = ['id' => intval($_POST['id'])];
        $where_format = ['%d'];
        $stmt = $this->db->delete($this->studentTable, $where, $where_format);
        if($stmt){
            wp_send_json([
                'success' => true,
                'message' => 'دانشجو مورد نظر حذف شد.'
            ], 200);
        }else{
            wp_send_json([
                'error' => true,
                'message' => 'خطایی در حذف دانشجو مورد نظر رخ داده است.'
            ], 403);
        }
    }
}
