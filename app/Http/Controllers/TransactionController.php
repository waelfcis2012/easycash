<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTransactionsRequest;
use App\Services\{TransactionService, ResponseService};
use App\DTO\GetTransactionDTO;

class TransactionController extends Controller
{

    private $transactionService;
    private $responseService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionService $transactionService, ResponseService $responseService)
    {
        $this->transactionService = $transactionService;
        $this->responseService = $responseService;
    }

    public function index(GetTransactionsRequest $request) {
        $dto = new GetTransactionDTO(
            $request->params["provider"] ?? null, 
            $request->params["statusCode"] ?? null, 
            $request->params["amounteMin"] ?? null, 
            $request->params["amounteMax"] ?? null, 
            $request->params["currency"] ?? null);
            return $this->responseService->
                getSuccessResponse($this->transactionService->getTransactions($dto));
    }

    //
}
