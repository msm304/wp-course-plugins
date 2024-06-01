<?php
class add_courseController extends Handler
{
    public function index()
    {
        $teacher = new WCP_Dashboard_Teacher();
        $teachers = $teacher->find();
        $params = [
            'teachers' => $teachers
        ];
        View::LoadView('View.AddCourseView', $params);
    }
    public static function addAction()
    {
        if (isset($_POST['add_new_course'])) {
            if (empty($_POST['_course_add']) || !wp_verify_nonce($_POST['_course_add'], '_course_add')) {
                die('access denied !!!');
            }
            foreach ($_POST as $item) {
                if (empty($item) && !is_numeric($item)) {
                    FlashMessage::addMsg('تکمیل تمامی فیلدها الزامی است.', 0);
                    return;
                }
            }
        }

        $teacher_data = explode('|',isset($_POST['t_name']) ? sanitize_text_field($_POST['t_name']) : '',);
        // var_dump($teacher_data);

        $data = [
            'course' => [
                'c_title' =>
                isset($_POST['c_title']) ? sanitize_text_field($_POST['c_title']) : '',
                'c_id' =>
                isset($_POST['c_id']) ? intval($_POST['c_id']) : '',
                't_id' =>
                isset($teacher_data[0]) ? intval($teacher_data[0]) : '',
                'c_slug' =>
                isset($_POST['c_slug']) ? sanitize_text_field($_POST['c_slug']) : '',
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
                'c_id' =>
                isset($_POST['c_id']) ? intval($_POST['c_id']) : '',
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
        $course = new WCP_Dashboard_Courses();
        $course->add($data);
    }
}
