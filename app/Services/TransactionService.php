<?php

namespace App\Services;

class TransactionService 
{
    public function saveTransactionFiles() {
        app(\App\Services\Providers\WProvider::class)->saveTransactionFiles();
        app(\App\Services\Providers\XProvider::class)->saveTransactionFiles();
        app(\App\Services\Providers\YProvider::class)->saveTransactionFiles();
    }
}