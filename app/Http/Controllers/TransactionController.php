<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTransactionsRequest;
use App\Services\TransactionService;
use App\DTO\GetTransactionDTO;

class TransactionController extends Controller
{

    private $transactionService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(GetTransactionsRequest $request) {
        $dto = new GetTransactionDTO($request->params["provider"] ?? null, 
            $request->params["statusCode"] ?? null, 
            $request->params["amounteMin"] ?? null, 
            $request->params["amounteMax"] ?? null, 
            $request->params["currency"] ?? null);
        return $this->transactionService->getTransactions($dto);
    }

    //
}
