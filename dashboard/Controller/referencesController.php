<?php

class referencesController extends Handler
{
    public function __construct()
    {
        add_action('wp_ajax_updateReferenceAction', [$this, 'updateReferenceAction']);
        add_action('wp_ajax_insertReferenceAction', [$this, 'insertReferenceAction']);
        add_action('wp_ajax_getCoursesTitleAction', [$this, 'getCoursesTitleAction']);
    }
    public function index()
    {
        $courses = new WCP_Dashboard_Courses();
        $references = new WCP_Dashboard_References();
        $params = [
            'find_course_title' => $courses->findCoursesByName(),

        ];
        View::LoadView('View.ReferencesView', $params);
    }

    public static function getReferenceAction($c_id)
    {
        $reference = new WCP_Dashboard_References();
        return $reference->find($c_id);
    }

    public static function getSubReferenceAction($c_id)
    {
        $reference = new WCP_Dashboard_References();
        return $reference->findSubReference($c_id);
    }

    public static function deleteAction()
    {
        if (isset($_GET['cid']) && isset($_GET['rid']) && intval($_GET['cid']) && intval($_GET['rid'])) {
            $reference = new WCP_Dashboard_References();
            $reference->deleteReference($_GET['cid'], $_GET['rid']);
        }
    }

    public function updateReferenceAction()
    {

        // var_dump($_POST);
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied!!!');
        }
        if (empty($_POST['id']) || empty($_POST['r_number']) || empty($_POST['title'])) {
            wp_send_json([
                'error' => true,
                'message' => 'تکمیل تمامی فیلدها الزامی می باشد!'
            ], 403);
        }
        $data = [
            'id' => intval($_POST['id']),
            'r_number' => intval($_POST['r_number']),
            'title' => sanitize_text_field($_POST['title'])
        ];
        $reference = new WCP_Dashboard_References();
        $reference->updateReferenceTitle($data);
    }

    public function insertReferenceAction()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied!!!');
        }
        if (empty($_POST['course_id_slug']) || empty($_POST['course_id_slug']) || empty($_POST['title'])) {
            wp_send_json([
                'error' => true,
                'message' => 'تکمیل تمامی فیلدها الزامی می باشد!'
            ], 403);
        }
        $course_id_slug = explode('|', $_POST['course_id_slug']);
        $data = [
            'c_id' => intval($course_id_slug[0]),
            'c_slug' => sanitize_text_field($course_id_slug[1]),
            'r_number' => intval($_POST['r_number']),
            'title' => sanitize_text_field($_POST['title'])
        ];
        $reference = new WCP_Dashboard_References();
        $reference->InsertReferenceTitle($data);
    }

    public function getCoursesTitleAction()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied!!!');
        }
        if (empty($_POST['cid'])) {
            wp_send_json([
                'error' => true,
                'message' => 'تکمیل تمامی فیلدها الزامی می باشد!'
            ], 403);
        }
        $data = ['c_id' => intval($_POST['cid'])];
        $reference = new WCP_Dashboard_References();
        $reference->getCoursesTitle($data);
    }
}
