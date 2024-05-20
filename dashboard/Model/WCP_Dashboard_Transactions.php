<?php

class WCP_Dashboard_Transactions
{
    private $db,
    $transactionsTable,
    $user_id,
    $plan_type,
    $first_name,
    $last_name,
    $email,
    $price,
    $order_number,
    $refNumber,
    $status,
    $create_at;
    public $keyword = '';

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->transactionsTable = $this->db->prefix . 'vip_transaction'; 
    }

    public function find()
    {
        $stmt = $this->db->get_results("SELECT * FROM {$this->transactionsTable} ORDER BY id DESC");
        if($stmt){
            return $stmt;
        }
        return false;
    }
}