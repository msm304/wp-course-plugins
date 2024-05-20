<?php

class FlashMessage
{
    const ERROR = 0;
    const SUCCESS = 1;

    public static function addMsg($message = null, $type)
    {
        /* if (isset($_SESSION['flash_message'])) {
            $_SESSION['flash_message'] = [
                'message' => $message,
                'type' => $type
            ];
        } else {*/
        $_SESSION['flash_message'] = [];
        $_SESSION['flash_message'] = [
            'message' => $message,
            'type' => $type
        ];
        /* }*/
    }

    public static function showMsg()
    {
        $message = '';
        if (isset($_SESSION['flash_message'])) {
            if ($_SESSION['flash_message']['type'] === self::SUCCESS) {
                $message = '<div class="v-alert v-alert-success" uk-alert>' . $_SESSION['flash_message']['message'] . '</div>';
            } elseif ($_SESSION['flash_message']['type'] === self::ERROR) {
                $message = '<div class="v-alert v-alert-danger" uk-alert>' . $_SESSION['flash_message']['message'] . '</div>';
            }
            self::clearSession();
        }
        return $message;
    }

    public static function clearSession()
    {
        /*  $_SESSION['flash_message'] =null;*/
        unset($_SESSION['flash_message']);
    }
}
