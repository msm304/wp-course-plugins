<?php

class my_TransactionsController extends Helper
{
    public function index()
    {
        $user_transactions = new WCP_Dashboard_User(); 
        $params = [
            'user_transactions' => $user_transactions->findUserTransactions(),
        ];
        View::LoadView('View.MyTransactionsView', $params);
    }
}
