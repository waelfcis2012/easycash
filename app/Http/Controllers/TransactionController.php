<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;

class TransactionController extends Controller
{

    private $transactionService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index() {
        return $this->transactionService->getTransactions();
    }

    //
}
