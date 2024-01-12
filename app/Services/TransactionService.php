<?php

namespace App\Services;

use App\Repositories\TransactionRepository;
use App\DTO\GetTransactionDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TransactionService 
{
    private $transactionRepository;
    
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getTransactions(GetTransactionDTO $dto): LengthAwarePaginator{
        return $this->transactionRepository->getTransactions($dto);
    }
}