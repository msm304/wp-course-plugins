<?php
class WCP_Dashboard_References
{

    private $db,
        $referencesTable,
        $courseVideoTable;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->referencesTable = $this->db->prefix . 'wcp_course_references';
        $this->courseVideoTable = $this->db->prefix . 'wcp_course_video';
    }
    public function find($c_id)
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->referencesTable} WHERE c_id = $c_id ORDER BY id");
        if ($stmt) {
            // var_dump($stmt);
            return $stmt;
        }
        return false;
    }

    public function findSubReference($c_id)
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->courseVideoTable} WHERE c_id = $c_id ORDER BY id");
        if ($stmt) {
            // var_dump($stmt);
            return $stmt;
        }
        return false;
    }

    public function deleteReference($cid, $rid)
    {
        $where = [
            'c_id' => $cid,
            'id' => $rid
        ];
        $where_format = ['%d', '%d'];
        $stmt = $this->db->delete($this->referencesTable, $where, $where_format);
        if ($stmt) {
            FlashMessage::addMsg('سرفصل مورد نظر با موفقیت حذف شد.', 1);
        } else {
            FlashMessage::addMsg('خطایی در حذف سرفصل مورد نظر رخ داده است.', 0);
        }
    }

    public function updateReferenceTitle($data)
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $format = ['%d', '%d', '%s'];
        $where = ['id' => $data['id']];
        $where_format = ['%d'];
        $stmt = $this->db->update($this->referencesTable, $data, $where, $format, $where_format);

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

    public function InsertReferenceTitle($data)
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied !!!');
        }
        $format = ['%d', '%s', '%d', '%s'];
        $stmt = $this->db->insert($this->referencesTable, $data, $format);

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
    }

    public function getCoursesTitle($data)
    {
        // var_dump($data['c_id']);
        $stmt = $this->db->get_results($this->db->prepare("SELECT c_id, c_slug, r_number, title FROM {$this->referencesTable} WHERE c_id = %d ORDER BY id", $data['c_id']));
        if ($stmt) {
            // return $stmt;
            // var_dump($stmt);
            foreach ($stmt as $row) {
                $outPut[] = [
                    'c_id' => $row->c_id,
                    'c_slug' => $row->c_slug,
                    'r_number' => $row->r_number,
                    'title' => $row->title
                ];
            }
            // var_dump($outPut);
            wp_send_json($outPut);
            wp_die();
        }
        return false;
    }

    public function addSession($data)
    {
        $format = ['%d', '%d', '%s', '%d', '%s', '%s', '%s', '%s', '%d', '%d'];
        $stmt = $this->db->insert($this->courseVideoTable, $data, $format);

        if ($stmt) {
            FlashMessage::addMsg('جلسه مورد نظر با موفقیت افزوده شد.', 1);
        } else {
            FlashMessage::addMsg('خطایی در افزودن جلسه به وجود آمده است.', 0);
        }
    }
}
