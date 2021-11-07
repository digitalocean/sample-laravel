<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionsController extends Controller
{
    /**
     * Metamask Payment Page
     *
     * @return void
     */
    public function index()
    {
        $response['transactions'] = Transaction::all();
        return view('games.games')->with($response);
    }

    /**
     * create New Transaction
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request)
    {
        return Transaction::create([
            'txHash' => $request->txHash,
            'amount' => $request->amount
        ]);
    }
}
