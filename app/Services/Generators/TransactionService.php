<?php

namespace App\Services\Generators;

class TransactionService 
{
    public function saveTransactionFiles(): void {
        foreach(config("providers") as $provider) {
            app($provider["generator"])->saveTransactionFiles();
        }
    }
}