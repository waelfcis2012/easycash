<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StorageService 
{
    public function save($fileName, $contents) {
        Storage::disk('local')->put($fileName, $contents);
    }
}