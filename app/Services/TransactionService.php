<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService 
{
    private $transactionRepository;
    
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getTransactions() {
        return $this->transactionRepository->getTransactions();
    }
}