<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;

class YProvider extends AbstractProvider
{
    protected String $key = "Y";

    protected function getStatus(String $status): Int {
        switch($status) {
            case 100:
                return 1;
            case 200:
                return 0;
            case 300:
                return -1;
            }
    }

}