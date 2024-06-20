<?php

class Helper
{
    public static function accountType($type)
    {
        switch ($type) {
            case 1:
                return 'طلایی';
                break;
            case 2:
                return 'نقره ای';
                break;
            case 3:
                return 'برنزی';
                break;
        }
    }

    public static function dropZero($price)
    {
        return rtrim($price, '0');
    }

    public static function benefits($benefits)
    {
        $benefits = explode('|', $benefits);
        $item = '';
        foreach ($benefits as $benefit) {
            $item .= '<li>' . $benefit . '</li>';
        }
        return $item;
    }

    public static function orderNumber()
    {
        return jdate('Ynj', '', '', '', 'en') . rand(10000, 99999);
    }

    public static function vipStatus($status)
    {
        switch ($status) {
            case 0:
                return '<span class="uk-badge">غیرفعال</span>';
                break;
            case 1:
                return '<span class="uk-badge">فعال</span>';
        }
    }

    public static function vipTransactioStatus($status)
    {
        switch ($status) {
            case 0:
                return '<span class="uk-badge">ناموفق</span>';
                break;
            case 1:
                return '<span class="uk-badge">موفق</span>';
        }
    }

    public static function toJalali($date, $separator)
    {
        $date = explode(" ", $date);
        $date = explode('-', $date[0]);
        $year = intval($date[0]);
        $month = intval($date[1]);
        $day = intval($date[2]);
        $date = [$year, $month, $day];
        $date = implode('-', $date);
        if (empty($date)) {
            return 'تاریخی ثبت نشده است!';
        }
        switch ($separator) {
            case '-':
                $date = explode('-', $date);
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                return gregorian_to_jalali($year, $month, $day, '-');
                break;
            case '/':
                $date = explode('-', $date);
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                return gregorian_to_jalali($year, $month, $day, '/');
                break;
        }
    }

    public static function toGregorian($date, $separator)
    {
        if (empty($date)) {
            return 'تاریخی ثبت نشده است!';
        }
        switch ($separator) {
            case '-':
                $date = explode('-', $date);
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                return jalali_to_gregorian($year, $month, $day, '-');
                break;
            case '/':
                $date = explode('-', $date);
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
                return jalali_to_gregorian($year, $month, $day, '/');
                break;
        }
    }

    public static function calculateRemainingVipCredit($expiredDate)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $expiredDate = strtotime($expiredDate);
        $remainingTime = round(($expiredDate - $currentDate) / (60 * 60 * 24))  . ' روز';
        if ($remainingTime >= 0) {
            return $remainingTime;
        } else {
            return 'منقضی شده';
        }
    }

    public static function getSlug($uri)
    {
        $uri = rtrim($uri, '/');
        $slug = explode('/', $uri);
        return end($slug);
    }

    public static function explodeString($string)
    {
        return explode('|', $string);
    }

    public static function calculateDiscount($price, $discount)
    {
        return $price - ($price * $discount) / 100;
    }

    public static function getUrlParam($url)
    {
        $baseUrl = parse_url($url, PHP_URL_PATH);
        $getParam = explode('/', $baseUrl);
        return end($getParam);
    }
    public static function allowHtmlTag(): array
    {
        return array(
            'a' => array(
                'class' => array(),
                'id' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
            ),
            'abbr' => array(
                'title' => array(),
            ),
            'b' => array(),
            'blockquote' => array(
                'cite'  => array(),
            ),
            'cite' => array(
                'title' => array(),
            ),
            'code' => array(),
            'pre' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array(),
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(),
            'h2' => array(),
            'h3' => array(),
            'h4' => array(),
            'h5' => array(),
            'h6' => array(),
            'i' => array(),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'id'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ),
            'li' => array(
                'class' => array(),
                'id' => array(),
            ),
            'ol' => array(
                'class' => array(),
                'id' => array(),
            ),
            'p' => array(
                'class' => array(),
                'id' => array(),
            ),
            'q' => array(
                'cite' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
                'id' => array(),
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array(),
                'id' => array(),
            ),
        );
    }
    public static function allowProtocols(): array
    {
        return array(
            'data'     => array(),
            'http'    => array(),
            'https' => array(),
        );
    }
    public static function getUserDataBy($fielde, $value)
    {
        return get_user_by($fielde, $value);
    }
    public static function countCourse()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'wcp_course';
        $stmt = $wpdb->get_var("SELECT COUNT(id) FROM $table");
        if ($stmt) {
            return $stmt;
        }
        return '0';
    }
    public static function countStudent()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'wcp_course_students';
        $stmt = $wpdb->get_var("SELECT COUNT(id) FROM $table");
        if ($stmt) {
            return $stmt;
        }
        return '0';
    }
    public static function aveSales()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'wcp_user_transactions';
        $stmt = $wpdb->get_var("SELECT AVG(price) FROM $table WHERE status = 1");
        if ($stmt) {
            return $stmt;
        }
        return '0';
    }
    public static function totalSales()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'wcp_user_transactions';
        $stmt = $wpdb->get_var("SELECT SUM(price) FROM $table WHERE status = 1");
        if ($stmt) {
            return $stmt;
        }
        return '0';
    }
}
