<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Restock;
use App\Models\Kiosk;
use App\Http\Controllers\API\BaseController as BaseController;
use Vyuldashev\LaravelOpenApi\Attributes as OpenAPI;

class RestockController extends BaseController
{
    /**
     * Retrieves all restock transactions.
     *
     * All restock orders with attached kiosk
     */
    #[OpenApi\Operation(tags: ['Restock'])]
    public function restock(Kiosk $kiosk){

        $restock = Restock::where('kiosk_id', $kiosk)->get();

        $output = [
            'restock' => $restock,
        ];
        return $this->sendResponse($output, 'Restock transactions retrieved successfully.');         

    }

    // Create restock transaction

    // Store restock tranction

    //update restock transaction

    
}
