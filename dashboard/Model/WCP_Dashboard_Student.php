<?php

class WCP_Dashboard_Student
{
    private $db,
        $studentTable;
    public $keyword = '';

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->studentTable = $this->db->prefix . 'wcp_course_students';
        add_action('wp_ajax_deleteStudent', [$this, 'deleteStudent']);
        add_action('wp_ajax_statusStudent', [$this, 'statusStudent']);
        add_action('wp_ajax_updateStudent', [$this, 'updateStudent']);
        add_action('wp_ajax_addStudent', [$this, 'addStudent']);
    }

    public function find()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->studentTable} ORDER BY id DESC");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function deleteStudent()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $where = ['id' => intval($_POST['row_id'])];
        $where_format = ['%d'];
        $stmt = $this->db->delete($this->studentTable, $where, $where_format);
        if ($stmt) {
            wp_send_json([
                'success' => true,
                'message' => 'دانشجو مورد نظر حذف شد.'
            ], 200);
        } else {
            wp_send_json([
                'error' => true,
                'message' => 'خطایی در حذف دانشجو مورد نظر رخ داده است.'
            ], 403);
        }
    }

    // public function statusStudent()
    // {
    //     if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
    //         die('access denied !!!');
    //     }
    //     $row_id = intval($_POST['row_id']);
    //     $status = intval($_POST['status']);
    //     $data = [
    //         'status' => $status,
    //     ];
    //     $where = ['id' => $row_id];
    //     $where_format = ['%d'];
    //     $stmt = $this->db->update($this->studentTable, $data, $where, $where_format);
    //     if ($stmt) {
    //         wp_send_json([
    //             'success' => true,
    //             'message' => 'تغییر وضعیت دانشجو انجام شد..'
    //         ], 200);
    //     } else {
    //         wp_send_json([
    //             'error' => true,
    //             'message' => 'خطایی در تغییر وضعیت دانشجو رخ داده است.'
    //         ], 403);
    //     }
    // }

    public function updateStudent()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $row_id = intval($_POST['row_id']);
        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_text_field($_POST['email']);
        $title = sanitize_text_field($_POST['title']);
        $phone = sanitize_text_field($_POST['phone']);
        $price = sanitize_text_field($_POST['price']);
        $date = sanitize_text_field($_POST['date']);
        $status = sanitize_text_field($_POST['status']);

        $data = [
            'full_name' => $full_name,
            'email' => $email,
            'c_title' => $title,
            'phone' => $phone,
            'price' => $price,
            'create_at' => $date,
            'status' => $status
        ];
        $where = ['id' => $row_id];
        $where_format = ['%s', '%s', '%s', '%s', '%s', '%s', '%d'];
        $stmt = $this->db->update($this->studentTable, $data, $where, $where_format);

        if ($stmt) {
            wp_send_json([
                'success' => true,
                'message' => 'اطلاعات بروز شد.'
            ], 200);
        }
        wp_send_json([
            'error' => true,
            'message' => 'خطایی در ویرایش اطلاعات رخ داده است.'
        ], 403);
        // var_dump([$row_id,$full_name,$email,$title,$phone,$price,$date,$status]);
    }

    public function searchStudent()
    {
        if (empty($this->keyword)) {
            return false;
        }
        $stmt = $this->db->get_results($this->db->prepare("SELECT * FROM {$this->studentTable} WHERE email LIKE %s OR phone LIKE %s", '%' . $this->keyword . '%', '%' . $this->keyword . '%'));
        // var_dump($stmt);
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    // Add Student
    public function addStudent()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_text_field($_POST['email']);
        $title = sanitize_text_field($_POST['title']);
        $slug = sanitize_text_field($_POST['slug']);
        $IdCourse = intval($_POST['IdCourse']);
        $IdStudent = intval($_POST['IdStudent']);
        $phone = sanitize_text_field($_POST['phone']);
        $price = sanitize_text_field($_POST['price']);
        $status = intval($_POST['status']);
        foreach ($_POST as $field) {
            if (empty($field)) {
                wp_send_json([
                    'error' => true,
                    'message' => 'تکمیل تمامی فیلد ها الزامی است.'
                ], 403);
            }
        }
        $data = [
            'full_name' => $full_name,
            'email' => $email,
            'c_title' => $title,
            'c_slug' => $slug,
            'c_id' => $IdCourse,
            'user_id' => $IdStudent,
            'phone' => $phone,
            'price' => $price,
            'status' => $status
        ];
        $format = ['%s', '%s', '%s', '%d', '%d', '%s', '%s', '%d'];
        $stmt = $this->db->insert($this->studentTable, $data, $format);

        if ($stmt) {
            wp_send_json([
                'success' => true,
                'message' => 'دانشجو جدید ثبت شد.'
            ], 200);
        }
        wp_send_json([
            'error' => true,
            'message' => 'خطایی در ثبت اطلاعات رخ داده است.'
        ], 403);
    }

}
