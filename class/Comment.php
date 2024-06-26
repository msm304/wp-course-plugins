<?php

class Comment
{
    public $db;
    public $table;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $this->db->prefix . 'wcp_course_comments';
        add_action('wp_ajax_add_student_comment', [$this, 'add_student_comment']);
    }

    public function find()
    {
        $stmt = $this->db->get_results("SELECT c_slug, full_name, email, comment, rate  FROM {$this->table} ORDER BY rand() LIMIT 5");
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function find_by_slug($c_slug)
    {
        $c_slug = sanitize_text_field($c_slug);
        $stmt = $this->db->get_results($this->db->prepare("SELECT * FROM {$this->table} WHERE c_slug = %s ORDER BY id DESC", $c_slug));
        if ($stmt) {
            return $stmt;
        }
        return false;
    }

    public function rating_star($rate)
    {
        switch ($rate) {
            case 1:
                return '
                    <i class="ti-star active"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                ';
                break;
            case 2:
                return '
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                ';
                break;
            case 3:
                return '
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                ';
                break;
            case 4:
                return '
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star"></i>
                ';
                break;
            case 5:
                return '
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                    <i class="ti-star active"></i>
                ';
                break;
        }
    }

    public function count_comment($c_slug)
    {
        $slug = sanitize_text_field($c_slug);
        $row_count = $this->db->get_var($this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE c_slug = %s", $slug));
        if ($row_count) {
            return $row_count;
        }
        return false;
    }

    public function comment_rate_avg($c_slug)
    {
        $slug = sanitize_text_field($c_slug);
        // var_dump($slug);
        $row_avg = $this->db->get_var($this->db->prepare("SELECT AVG(rate) FROM {$this->table} WHERE c_slug = %s", $slug));
        // var_dump($row_avg);
        if ($row_avg) {
            return $row_avg;
        }
        return false;
    }

    // public function comment_rate_by_percent($c_slug, $rate)
    // {
    //     $slug = sanitize_text_field($c_slug);
    //     switch ($rate) {
    //         case 1:
    //             $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $c_slug, $rate));
    //             break;
    //         case 2:
    //             $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $c_slug, $rate));
    //             break;
    //         case 3:
    //             $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $c_slug, $rate));
    //             break;
    //         case 4:
    //             $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $c_slug, $rate));
    //             break;
    //         case 5:
    //             $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $c_slug, $rate));
    //             break;
    //     }
    //     $count_course_comment = $this->db->get_var($this->db->prepare("SELECT  COUNT(c_slug) FROM {$this->table} WHERE c_slug = %s", $slug));

    //     return $count_rate / $count_course_comment * 100;
    // }

    public function comment_rate_by_percent($c_slug, $rate)
    {
        $slug = sanitize_text_field($c_slug);
        // $count_rate = 0; // مقداردهی اولیه به متغیر

        switch ($rate) {
            case 1:
                $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $slug, $rate));
                break;
            case 2:
                $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $slug, $rate));
                break;
            case 3:
                $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $slug, $rate));
                break;
            case 4:
                $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $slug, $rate));
                break;
            case 5:
                $count_rate = $this->db->get_var($this->db->prepare("SELECT COUNT(rate) FROM {$this->table} WHERE c_slug = %s AND rate = %d", $slug, $rate));
                break;
            // default:
                // return 0; // اگر امتیاز خارج از محدوده 1 تا 5 باشد
        }

        $count_course_comment = $this->db->get_var($this->db->prepare("SELECT COUNT(c_slug) FROM {$this->table} WHERE c_slug = %s", $slug));

        if ($count_course_comment > 0) {
            return ($count_rate / $count_course_comment) * 100;
        }

        // return 0; // در صورتی که هیچ نظری وجود نداشته باشد
    }


    public function add_student_comment()
    {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            die('access denied!!!');
        }
        if (empty($_POST['comment_body'])) {
            wp_send_json([
                'error' => true,
                'message' => 'دیدگاه خود را وارد نمایید.',
            ], 403);
        }
        if (empty($_POST['rate'])) {
            wp_send_json([
                'error' => true,
                'message' => 'امتیاز خود را وارد نمایید.',
            ], 403);
        }
        $c_id = intval($_POST['c_id']);
        $c_slug = sanitize_text_field($_POST['c_slug']);
        $full_name = wp_get_current_user()->display_name;
        $email = wp_get_current_user()->user_email;
        $comment_body = sanitize_textarea_field($_POST['comment_body']);
        $rate = intval($_POST['rate']);
        $data = [
            'c_id' => $c_id,
            'c_slug' => $c_slug,
            'full_name' => $full_name,
            'email' => $email,
            'rate' => $rate,
            'comment' => $comment_body
        ];
        $date_format = ['%d', '%s', '%s', '%s', '%d', '%s'];
        $stmt = $this->db->insert($this->table, $data, $date_format);
        if ($stmt) {
            wp_send_json([
                'success' => true,
                'message' => 'دیدگاه شما با موفقیت ثبت شد.'
            ], 200);
        } else {
            wp_send_json([
                'error' => true,
                'message' => 'خطایی در ثبت دیدگاه شما رخ داده است.'
            ], 403);
        }
    }
}
