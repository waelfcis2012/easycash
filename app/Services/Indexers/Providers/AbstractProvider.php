<?php

namespace App\Services\Indexers\Providers;

use App\Services\StorageService;
use App\Repositories\TransactionRepository;
use \JsonMachine\Items;

abstract class AbstractProvider 
{
    // const KEY_ID = "id";
    // const KEY_AMOUNT = "amount";
    // const KEY_CURRENCY = "currency";
    // const KEY_PHONE = "phone";
    // const KEY_STATUS = "status";
    // const KEY_DATE = "created_at";

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