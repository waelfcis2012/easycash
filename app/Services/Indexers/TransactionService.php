<?php

namespace App\Services\Indexers;

class TransactionService 
{
    public function indexTransactions() {
        app(\App\Services\Indexers\Providers\WProvider::class)->indexTransactions();
        // app(\App\Services\Indexers\Providers\XProvider::class)->indexTransactions();
        // app(\App\Services\Indexers\Providers\YProvider::class)->indexTransactions();
    }
}