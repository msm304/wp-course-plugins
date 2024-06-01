<?php

class add_teacherController extends Handler
{
    public function index()
    {
        $teachers = new WCP_Dashboard_Teacher();
        $params = [
            'teachers' => $teachers->find(),
        ];
        View::LoadView('View.AddTeacherView', $params);
    }

    public static function addAction()
    {
        if (isset($_POST['teacher_add'])) {
            if (empty($_POST['_add_teacher']) || !wp_verify_nonce($_POST['_add_teacher'], '_add_teacher')) {
                die('access denied !!!');
            }
            if (empty($_POST['t_fullname']) || empty($_POST['t_email']) || empty($_POST['t_phone']) || empty($_POST['t_desc'])) {
                FlashMessage::addMsg('تکمیل تمامی فیلدها الزامی است.', 0);
                return;
            }
            if (!is_email($_POST['t_email'])) {
                FlashMessage::addMsg('یک ایمیل معتبر وارد کنید.', 0);
                return;
            }
            if (!preg_match('/^(\+98|0)?9\d{9}$/', $_POST['t_phone'])) {
                FlashMessage::addMsg('یک شماره موبایل معتبر وارد کنید.', 0);
                return;
            }
        }

        $t_id = Helper::getUserDataBy('email', $_POST['t_email']);
        $data = [
            't_id' => $t_id->ID,
            't_fullname' =>
            isset($_POST['t_fullname']) ? sanitize_text_field($_POST['t_fullname']) : '',
            't_email' =>
            isset($_POST['t_email']) ? sanitize_text_field($_POST['t_email']) : '',
            't_phone' =>
            isset($_POST['t_phone']) ? sanitize_text_field($_POST['t_phone']) : '',
            't_desc' =>
            isset($_POST['t_desc']) ? wp_kses($_POST['t_desc'], Helper::allowHtmlTag(), Helper::allowProtocols()) : '',
            't_telegram' =>
            isset($_POST['t_telegram']) ? sanitize_text_field($_POST['t_telegram']) : '',
            't_twitter' =>
            isset($_POST['t_twitter']) ? sanitize_text_field($_POST['t_twitter']) : '',
            't_instagram' =>
            isset($_POST['t_instagram']) ? sanitize_text_field($_POST['t_instagram']) : '',
            't_linkedin' =>
            isset($_POST['t_linkedin']) ? sanitize_text_field($_POST['t_linkedin']) : '',
        ];
        $teacher = new WCP_Dashboard_Teacher();
        $teacher->add($data);
    }
}
