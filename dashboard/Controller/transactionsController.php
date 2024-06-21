<?php

class transactionsController extends Handler
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $params = [];
        $transactions = new WCP_Dashboard_Transactions();
        // $students->keyword = sanitize_text_field($_POST['wcp_keyword']);
        $params = [
            'transactions' => $transactions->find(),
            // 'student_search_results' => $students->searchStudent(),
        ];
        View::LoadView('View.TransactionsView', $params);
    }
}
