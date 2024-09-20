<?php

use MannikJ\Laravel\Wallet\Models\Transaction;
use MannikJ\Laravel\Wallet\Models\Wallet;

return [
    /*
     * Disable auto-loading of the vendor migrations
     * You can then publish the migrations and
     * change them for more flexibility
     */
    'load_migrations' => env('WALLET_LOAD_MIGRATIONS', true),
    /*
     * Change this to specify the money amount column types
     *
     * @deprecated Trying to support multiple column types is too complex and makes it harder to improve the package.
     *             Will be removed in the next version
     */
    'column_type' => env('WALLET_COLUMN_TYPE', 'decimal'),

    /*
     * Change this if you need to extend the default Wallet Model
     */
    'wallet_model' => Wallet::class,

    /*
     * Change this if you need to extend the default Transaction Model
     */
    'transaction_model' => Transaction::class,

    /*
     * Activate automatic recalculation of the wallet balance
     * from the transaction history after wallet balance has
     * changed to ensure correct value.
     *
     * @deprecated Recalculating balance over all tranactions is default behavior.
     *             Will be removed in the next version
     */
    'auto_recalculate_balance' => env('WALLET_AUTO_RECALCULATE_BALANCE', false),

    /*
     * Transaction types that are subtracted from the wallet balance.
     * All amounts will be converted to a positive value
     */
    'adding_transaction_types' => ['deposit', 'refund'],

    /*
     * Transaction types that are subtracted from the wallet balance
     * All amounts will be converted to a negative value
     */
    'subtracting_transaction_types' => ['withdraw', 'payout'],

    /*
     * Transaction types that can be positive or negative
     * Per default all types that are not explicitly specified
     * as positive or negative are treated as unbiased types.
     * It still might be convenient to specify your the available
     * unbiased types here explicitly so you can show the options
     */
    'unbiased_transaction_types' => [],
];
