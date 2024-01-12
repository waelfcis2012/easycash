<?php

namespace App\Services\Indexers;

class TransactionService 
{
    public function indexTransactions() {
        foreach(config("providers") as $provider) {
            app($provider["indexer"])->indexTransactions();
        }
    }
}