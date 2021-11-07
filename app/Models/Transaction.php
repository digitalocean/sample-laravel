<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'txHash',
        'amount',
        'status',
    ];

    /**
     * Get ALl Pending Transactions
     *
     * @return mixed
     */
    public function pendingTransactions()
    {
        return $this->where('status', 1)->where('created_at', '<', Carbon::NOW()->subMinutes(20))->get();
    }
}
