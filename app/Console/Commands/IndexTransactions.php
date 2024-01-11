<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
 
class IndexTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:index';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save transactions in DB';

    private $transactionService;

    public function __construct(\App\Services\Generators\TransactionService $transactionService)
    {
        parent::__construct();
        $this->transactionService = $transactionService;
    }
 
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->transactionService->indexTransactions();
    }
}