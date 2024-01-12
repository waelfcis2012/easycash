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

    private $fileName;
    protected $faker;
    protected $key;
    private $storageService;
    private $transactionRepository;

    public function __construct(StorageService $storageService, TransactionRepository $transactionRepository)
    {
        $this->storageService = $storageService;
        $this->transactionRepository = $transactionRepository;
        $this->faker = \Faker\Factory::create();
        $this->fileName = config("providers." . $this->key . ".file");
    }


    public function indexTransactions() {
        $limit = config("transactions.save-limit");
        $transactionsChunks = $this->storageService->read($this->fileName);
        foreach ($transactionsChunks as $transaction) {
            $formatedTransactions[] = $this->formatTransaction($transaction);
            if(count($formatedTransactions) === $limit) {
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
            "status" => $this->getStatus($transaction->status),
            "transaction_id" => $transaction->id,
            "provider" => $this->key,
            "created_at" => $transaction->created_at,
        ];
    }

    abstract protected function getStatus($status);
}