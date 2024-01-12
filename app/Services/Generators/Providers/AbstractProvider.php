<?php

namespace App\Services\Generators\Providers;

use App\Services\StorageService;

abstract class AbstractProvider 
{
    const KEY_ID = "id";
    const KEY_AMOUNT = "amount";
    const KEY_CURRENCY = "currency";
    const KEY_PHONE = "phone";
    const KEY_STATUS = "status";
    const KEY_DATE = "created_at";

    private $fileName;
    protected $faker;
    protected $key;
    private $storageService;

    public function __construct(StorageService $storageService)
    {
        $this->storageService = $storageService;
        $this->faker = \Faker\Factory::create();
        $this->fileName = config("providers." . $this->key . ".file");
    }

    public function saveTransactionFiles(): void {
        $count = config("transactions.json-file-size");
        for ($i = 0; $i < $count; $i++) {
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

    abstract protected function gernerateId(): String;
    abstract protected function gernerateAmount(): Float;
    abstract protected function gernerateCurrency(): String;
    abstract protected function gerneratePhone(): String;
    abstract protected function gernerateStatus(): String;
    abstract protected function gernerateDate(): String;
}