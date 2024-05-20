<?php

class editController extends Handler
{
    public function index()
    {
        $course = new WCP_Dashboard_Courses();
        $get_param = Helper::getUrlParam($_SERVER['REQUEST_URI']);
        // var_dump($get_param);
        $params = [
            'find_course_by_ID' => $course->findCoursesById(intval($get_param))
        ];
        View::LoadView('View.EditCourseView', $params);
    }

    public static function updateAction()
    {
        if(isset($_POST['course_update'])){
            if(empty($_POST['_update_course']) || !wp_verify_nonce($_POST['_update_course'], '_update_course')){
                die('access denied !!!');
            }
                foreach($_POST as $item){
                    if(empty($item) && !is_numeric($item)){
                        FlashMessage::addMsg('تکمیل تمامی فیلدها الزامی است.', 0);
                        return;
                    }
                }
            // var_dump($_POST);
        }
        $course = new WCP_Dashboard_Courses();
        $course->update();
    }
}
