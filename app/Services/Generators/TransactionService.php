<?php

namespace App\Services\Generators;

class TransactionService 
{
    public function saveTransactionFiles() {
        app(\App\Services\Generators\Providers\WProvider::class)->saveTransactionFiles();
        app(\App\Services\Generators\Providers\XProvider::class)->saveTransactionFiles();
        app(\App\Services\Generators\Providers\YProvider::class)->saveTransactionFiles();
    }
}