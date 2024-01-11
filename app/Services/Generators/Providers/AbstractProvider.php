<?php

namespace App\Services\Generators\Providers;

use App\Services\StorageService;
use App\Repositories\TransactionRepository;
use \JsonMachine\Items;

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
    private $transactionRepository;

    public function __construct(StorageService $storageService, TransactionRepository $transactionRepository)
    {
        $this->storageService = $storageService;
        $this->transactionRepository = $transactionRepository;
        $this->faker = \Faker\Factory::create();
    }

    public function saveTransactionFiles() {
        for ($i = 0; $i < 10005; $i++) {
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

    public function indexTransactions() {
        $this->transactionRepository->clearTransactions();
        $transactionsChunks = Items::fromFile(\Storage::path($this->fileName));
        foreach ($transactionsChunks as $transaction) {
            $formatedTransactions[] = $this->formatTransaction($transaction);
            if(count($formatedTransactions) === 1000) {
                $this->transactionRepository->save($formatedTransactions);
                $formatedTransactions = [];
            }
        }
         $this->transactionRepository->save($formatedTransactions);
    }

    protected function formatTransaction($transaction) {
        return [
            "amount" => $transaction->amount,
            "currency" => $transaction->currency,
            "phone" => $transaction->phone,
            "status" => 0,
            "transaction_id" => $transaction->id,
            "provider_id" => 1,
            "created_at" => $transaction->created_at,
        ];
    }
}