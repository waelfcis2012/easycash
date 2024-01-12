<?php

return [
    'W' => [
        "file" => "DataProviderW.json",
        "generator" =>  \App\Services\Generators\Providers\WProvider::class,
        "indexer" => \App\Services\Indexers\Providers\WProvider::class,
    ],
    'X' => [
        "file" => "DataProviderX.json",
        "generator" =>  \App\Services\Generators\Providers\XProvider::class,
        "indexer" => \App\Services\Indexers\Providers\XProvider::class
    ],
    'Y' => [
        "file" => "DataProviderY.json",
        "generator" =>  \App\Services\Generators\Providers\YProvider::class,
        "indexer" => \App\Services\Indexers\Providers\YProvider::class,
    ],
];