<?php

namespace App\Services\Indexers\Providers;

use App\Services\StorageService;
use App\Repositories\TransactionRepository;

abstract class AbstractProvider 
{
    private String $fileName;
    protected $faker;
    protected String $key;
    private StorageService $storageService;
    private TransactionRepository $transactionRepository;

    public function __construct(StorageService $storageService, TransactionRepository $transactionRepository)
    {
        $this->storageService = $storageService;
        $this->transactionRepository = $transactionRepository;
        $this->faker = \Faker\Factory::create();
        $this->fileName = config("providers." . $this->key . ".file");
    }


    public function indexTransactions(): Void {
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

    protected function formatTransaction($transaction): Array {
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

    abstract protected function getStatus(String $status): Int;
}