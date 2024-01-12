<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
 
class GenerateDummyTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:generate';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and save dummy transactions';

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
        $this->transactionService->saveTransactionFiles();
    }
}