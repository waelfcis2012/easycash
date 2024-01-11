<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function save($transactions) {
        Transaction::insert($transactions);
    }

    public function clearTransactions() {
        Transaction::Truncate();
    }
}