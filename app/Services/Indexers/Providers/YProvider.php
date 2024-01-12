<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;
use App\Enums\TransactionStatusEnum;

class YProvider extends AbstractProvider
{
    protected String $key = "Y";

    protected function getStatus(String $status): Int {
        switch($status) {
            case 100:
                return TransactionStatusEnum::PAID->value;
            case 200:
                return TransactionStatusEnum::PENDING->value;
            case 300:
                return TransactionStatusEnum::FAILED->value;
            }
    }

}