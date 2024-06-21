<?php

class edit_courseController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $course = new WCP_Dashboard_Courses();
        $teacher = new WCP_Dashboard_Teacher();
        $teachers = $teacher->find();
        $get_param = Helper::getUrlParam($_SERVER['REQUEST_URI']);

        $course_data = $course->findCourseById(intval($get_param));
        // if ($course_data) {
        //     $course_data = (array) $course_data; // تبدیل شیء به آرایه
        // } else {
        //     $course_data = []; // تنظیم آرایه خالی اگر داده‌ای موجود نبود
        // }

        $params = [
            'find_course_by_ID' => $course_data,
            'teachers' => $teachers
        ];
        View::LoadView('View.EditCourseView', $params);
    }

    public static function updateAction()
    {
        if (isset($_POST['course_update'])) {
            if (empty($_POST['_update_course']) || !wp_verify_nonce($_POST['_update_course'], '_update_course')) {
                die('access denied !!!');
            }
            foreach ($_POST as $item) {
                if (empty($item) && !is_numeric($item)) {
                    FlashMessage::addMsg('تکمیل تمامی فیلدها الزامی است.', 0);
                    return;
                }
            }
            // var_dump($_POST);
        }
        // var_dump($_POST['c_title']);
        // $c_title = $_POST['c_title'];
        // $c_slug = $_POST['c_slug'];
        $teacher_data = explode('|', isset($_POST['t_name']) ? sanitize_text_field($_POST['t_name']) : '',);
        $data = [
            'course' => [
                'c_title' =>
                isset($_POST['c_title']) ? sanitize_text_field($_POST['c_title']) : '',
                'c_slug' =>
                isset($_POST['c_slug']) ? sanitize_text_field($_POST['c_slug']) : '',
                't_id' =>
                isset($teacher_data[0]) ? intval($teacher_data[0]) : '',
                'c_tags' =>
                isset($_POST['c_tags']) ? sanitize_text_field($_POST['c_tags']) : '',
                'c_price' =>
                isset($_POST['c_price']) ? sanitize_text_field($_POST['c_price']) : '',
                'c_thumbnail'
                => isset($_POST['c_thumbnail']) ? sanitize_text_field($_POST['c_thumbnail']) : '',
                'c_discount' =>
                isset($_POST['c_discount']) ? sanitize_text_field($_POST['c_discount']) : '',
                'c_type' =>
                isset($_POST['c_type']) ? intval($_POST['c_type']) : '',
                'c_status' =>
                isset($_POST['c_status']) ? intval($_POST['c_status']) : '',
                'c_demo' =>
                isset($_POST['c_demo']) ? sanitize_text_field($_POST['c_demo']) : '',
                'c_title_desc' =>
                isset($_POST['c_title_desc']) ? wp_kses($_POST['c_title_desc'], Helper::allowHtmlTag(), Helper::allowProtocols()) : '',
                'c_desc'
                => isset($_POST['c_desc']) ? wp_kses($_POST['c_desc'], Helper::allowHtmlTag(), Helper::allowProtocols()) : '',
            ],
            'course_meta' => [
                'c_slug' =>
                isset($_POST['c_slug']) ? sanitize_text_field($_POST['c_slug']) : '',
                'c_level' =>
                isset($_POST['c_level']) ? intval($_POST['c_level']) : '',
                'c_lang' =>
                isset($_POST['c_lang']) ? intval($_POST['c_lang']) : '',
                't_name' =>
                isset($teacher_data[1]) ? sanitize_text_field($teacher_data[1]) : '',
                'c_student' =>
                isset($_POST['c_student']) ? sanitize_text_field($_POST['c_student']) : '',
                'c_session' =>
                isset($_POST['c_session']) ? sanitize_text_field($_POST['c_session']) : '',
                'c_duration' =>
                isset($_POST['c_duration']) ? sanitize_text_field($_POST['c_duration']) : '',
            ]
        ];
        // var_dump($c_title, $c_slug);
        $cid =  isset($_POST['cid']) ? intval($_POST['cid']) : '';
        $course = new WCP_Dashboard_Courses();
        $course->update($data, $cid);
    }
}
