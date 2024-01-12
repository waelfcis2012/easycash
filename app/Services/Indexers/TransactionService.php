<?php

namespace App\Services\Indexers;
use App\Repositories\TransactionRepository;

class TransactionService 
{
    private $transactionRepository;
    
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function indexTransactions() {
        $this->transactionRepository->clearTransactions();
        foreach(config("providers") as $provider) {
            app($provider["indexer"])->indexTransactions();
        }
    }
}