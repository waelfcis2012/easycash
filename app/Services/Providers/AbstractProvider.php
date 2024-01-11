<?php

namespace App\Services\Providers;

use App\Services\StorageService;

abstract class AbstractProvider 
{
    const KEY_ID = "id";
    const KEY_AMOUNT = "amount";
    const KEY_CURRENCY = "currency";
    const KEY_PHONE = "phone";
    const KEY_STATUS = "status";
    const KEY_DATE = "created_at";

    protected $fileName;
    protected $faker;
    private $storageService;

    public function __construct(StorageService $storageService)
    {
        $this->storageService = $storageService;
        $this->faker = \Faker\Factory::create();
    }

    public function saveTransactionFiles() {
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                static::KEY_AMOUNT => $this->gernerateAmount(),
                static::KEY_CURRENCY => $this->gernerateCurrency(),
                static::KEY_PHONE => $this->gerneratePhone(),
                static::KEY_STATUS => $this->gernerateStatus(),
                static::KEY_DATE => $this->gernerateDate(),
                static::KEY_ID => $this->gernerateId(),
            ];
        }
        $this->storageService->save($this->fileName, json_encode($data));
    }

    abstract protected function gernerateId();
    abstract protected function gernerateAmount();
    abstract protected function gernerateCurrency();
    abstract protected function gerneratePhone();
    abstract protected function gernerateStatus();
    abstract protected function gernerateDate();
}