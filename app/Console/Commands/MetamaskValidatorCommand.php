<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use Illuminate\Console\Command;

class MetamaskValidatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validate:metamask';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Metamask Transactions Validator Command';
    protected $transactions;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->transactions = new Transaction();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->validateTransactions();
    }

    /**
     * Validate Metamask Transaction
     *
     * @return void
     */
    public function validateTransactions()
    {
        $master_account = env('METAMASK_MASTER_ADDRESS');
        $transactions = $this->transactions->pendingTransactions(); //get Pending Transactions From Database [which are older than 20min]
        //Run foreach to check transactions one by one.
        foreach ($transactions as $transaction) {
            //get transaction information from etherscan
            $response = $this->checkWithEtherScan($transaction->txHash);
            //validate response
            if ($response && array_key_exists('result', $response)) {
                $tr_data = $response['result'];
                //validate transaction destination with our account [destination must be our master account].
                if (strtolower($tr_data['to']) == strtolower($master_account)) {
                    // Update Transaction As Success
                    $transaction->status = 2;
                    $transaction->update();
                } else {
                    // Update Transaction As Canceled
                    $transaction->status = 3;
                    $transaction->update();
                }
            } else {
                // Update Transaction As Canceled
                $transaction->status = 3;
                $transaction->update();
            }
        }
    }

    public function checkWithEtherScan($transaction_hash)
    {
        $api_key = env('ETHERSCAN_API_KEY'); // paste your api key here. which was copied from Etherscan.io
        $test_network = "https://api-ropsten.etherscan.io"; // in this tutorial we use only test networks
        $main_network = "https://etherscan.io"; // if you want to go live you must use main network.

        $response = Http::get($test_network . "/api/?module=proxy&action=eth_getTransactionByHash&txhash="
        . $transaction_hash . '&apikey=' . $api_key);
        return $response->json();
    }
}
