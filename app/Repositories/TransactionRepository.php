<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\DTO\GetTransactionDTO;

class TransactionRepository
{
    public function save($transactions) {
        Transaction::insert($transactions);
    }

    public function clearTransactions() {
        Transaction::Truncate();
    }

    public function getTransactions(GetTransactionDTO $dto) {
        $query = Transaction::query();
        
        if (isset($dto->provider) === true) {
            $query->where("provider", $dto->provider);
        }
        if (isset($dto->status) === true) {
            $query->where("status", $dto->status);
        }
        if (isset($dto->min) === true) {
            $query->where("amount", ">=", $dto->min);
        }
        if (isset($dto->max) === true) {
            $query->where("amount", "<=", $dto->max);
        }
        if (isset($dto->currency) === true) {
            $query->where("currency", $dto->currency);
        }
        // dd($dto->provider);
        return $query->paginate(config("transactions.per-page"));
    }
}