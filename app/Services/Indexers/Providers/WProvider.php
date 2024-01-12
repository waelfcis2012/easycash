<?php

namespace App\Services\Indexers\Providers;

use App\Services\Indexers\Providers\AbstractProvider;

class WProvider extends AbstractProvider
{
    protected $key = "W";

    protected function getStatus($status) {
        switch($status) {
            case "done":
                return 1;
            case "wait":
                return 0;
            case "nope":
                return -1;
            }
    }
}