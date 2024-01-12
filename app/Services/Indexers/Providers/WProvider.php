<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;
use App\Enums\TransactionStatusEnum;

class WProvider extends AbstractProvider
{
    protected String $key = "W";

    protected function getStatus(string $status) : Int{
        switch($status) {
            case "done":
                return TransactionStatusEnum::PAID->value;
            case "wait":
                return TransactionStatusEnum::PENDING->value;
            case "nope":
                return TransactionStatusEnum::FAILED->value;
            }
    }
}