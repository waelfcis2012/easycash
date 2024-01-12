<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;
use App\Enums\TransactionStatusEnum;

class XProvider extends AbstractProvider
{
    protected String $key = "X";

    protected function formatTransaction($transaction): Array {
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
    
    protected function getStatus(String $status): Int {
        switch($status) {
            case 1:
                return TransactionStatusEnum::PAID->value;
            case 2:
                return TransactionStatusEnum::PENDING->value;
            case 3:
                return TransactionStatusEnum::FAILED->value;
            }
    }
}