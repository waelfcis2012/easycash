<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;

class XProvider extends AbstractProvider
{
    protected $key = "X";

    protected function formatTransaction($transaction) {
        return [
            "amount" => $transaction->transactionAmount,
            "currency" => $transaction->Currency,
            "phone" => $transaction->senderPhone,
            "status" => $this->getStatus($transaction->transactionStatus),
            "transaction_id" => $transaction->transactionIdentification,
            "provider" => $this->key,
            "created_at" => $transaction->transactionDate,
        ];
    }
    
    protected function getStatus($status) {
        switch($status) {
            case 1:
                return 1;
            case 2:
                return 0;
            case 3:
                return -1;
            }
    }
}