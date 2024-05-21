<?php
class add_courseController extends Handler
{
    public function index()
    {
        // $course = new WCP_Dashboard_Courses();
        $params = [];
        View::LoadView('View.AddCourseView', $params);
    }
    public static function addAction()
    {
        if (isset($_POST['course_add'])) {
            if (empty($_POST['_add_course']) || !wp_verify_nonce($_POST['_add_course'], '_add_course')) {
                die('access denied !!!');
            }
            foreach ($_POST as $item) {
                if (empty($item) && !is_numeric($item)) {
                    FlashMessage::addMsg('تکمیل تمامی فیلدها الزامی است.', 0);
                    return;
                }
            }
        }
        $data = [
            'course' => [
                'c_title' => sanitize_text_field($_POST['c_title']),
                'c_slug' => sanitize_text_field($_POST['c_slug']),
                'c_tags' => sanitize_text_field($_POST['c_tags']),
                'c_price' => sanitize_text_field($_POST['c_price']),
                'c_thumbnail' => sanitize_text_field($_POST['c_thumbnail']),
                'c_discount' => sanitize_text_field($_POST['c_discount']),
                'c_type' => intval($_POST['c_type']),
                'c_status' => intval($_POST['c_status']),
                'c_demo' => sanitize_text_field($_POST['c_demo']),
                'c_title_desc' => wp_kses($_POST['c_title_desc'], Helper::allowHtmlTag(), Helper::allowProtocols()),
                'c_desc' => wp_kses($_POST['c_desc'], Helper::allowHtmlTag(), Helper::allowProtocols()),
            ],
            'course_meta' => [
                'c_slug' => sanitize_text_field($_POST['c_slug']),
                'c_level' => intval($_POST['c_level']),
                'c_lang' => intval($_POST['c_lang']),
                't_name' => sanitize_text_field($_POST['t_name']),
                'c_student' => sanitize_text_field($_POST['c_student']),
                'c_session' => sanitize_text_field($_POST['c_session']),
                'c_duration' => sanitize_text_field($_POST['c_duration']),
            ]
        ];
        $course = new WCP_Dashboard_Courses();
        $course->add($data);
        var_dump($data);
    }
}
