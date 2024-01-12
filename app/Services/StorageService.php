<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use \JsonMachine\Items;

class StorageService 
{
    public function save($fileName, $contents) {
        Storage::disk('local')->put($fileName, $contents);
    }

    public function read($fileName) {
        return Items::fromFile(Storage::path($fileName));
    }
}