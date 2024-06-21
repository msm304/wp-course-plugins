<?php

class add_sessionController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $courses = new WCP_Dashboard_Courses();
        $params = [
            'find_course_title' => $courses->findCoursesByName(),
        ];
        View::LoadView('View.AddSessionView', $params);
    }

    public static function addAction()
    {
        if (isset($_POST['add_session'])) {
            if (empty($_POST['_add_session']) || !wp_verify_nonce($_POST['_add_session'], '_add_session')) {
                die('access denied !!!');
            }
            foreach ($_POST as $field) {
                if (empty($field) && !is_numeric($field)) {
                    FlashMessage::addMsg('تکمیل تمامی فیلد ها الزامی می باشد', 0);
                    return;
                }
            }
        }

        $course_cid_title = explode('|', $_POST['r_number']);

        $data = [
            'c_id' => intval($course_cid_title[0]),
            'r_number' => intval($course_cid_title[1]),
            'c_slug' => sanitize_text_field($course_cid_title[2]),
            'v_number' => intval($_POST['v_number']),
            'v_title' => sanitize_text_field($_POST['v_title']),
            'v_link' => sanitize_text_field($_POST['v_link']),
            'v_size' => sanitize_text_field($_POST['v_size']),
            'v_length' => sanitize_text_field($_POST['v_length']),
            'v_type' => intval($_POST['v_type']),
            'v_status' => intval($_POST['v_status']),
        ];
        $reference = new WCP_Dashboard_References();
        $reference->addSession($data);
    }
}
