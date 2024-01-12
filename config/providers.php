<?php

return [
    'w' => [
        "file" => "",
        "generator" =>  \App\Services\Generators\Providers\WProvider::class,
        "indexer" => \App\Services\Indexers\Providers\WProvider::class,
    ],
    'x' => [
        "file" => "",
        "generator" =>  \App\Services\Generators\Providers\XProvider::class,
        "indexer" => \App\Services\Indexers\Providers\XProvider::class
    ],
    'y' => [
        "file" => "",
        "generator" =>  \App\Services\Generators\Providers\YProvider::class,
        "indexer" => \App\Services\Indexers\Providers\YProvider::class,
    ],
];