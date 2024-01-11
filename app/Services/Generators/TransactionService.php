<?php

namespace App\Services\Generators;

class TransactionService 
{
    public function saveTransactionFiles() {
        app(\App\Services\Generators\Providers\WProvider::class)->saveTransactionFiles();
        app(\App\Services\Generators\Providers\XProvider::class)->saveTransactionFiles();
        app(\App\Services\Generators\Providers\YProvider::class)->saveTransactionFiles();
    }

    public function indexTransactions() {
        app(\App\Services\Generators\Providers\WProvider::class)->indexTransactions();
        // app(\App\Services\Generators\Providers\XProvider::class)->indexTransactions();
        // app(\App\Services\Generators\Providers\YProvider::class)->indexTransactions();
    }
}