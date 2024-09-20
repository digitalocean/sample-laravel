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
    
    /*
     * Create Restock entry.
     *
     * Returns restock entry
     */
    #[OpenApi\Operation(tags: ['Restock'])]
    //#[OpenApi\Parameters(factory: CreateMealsParameters::class)]
    public function createRestock(Request $request, Kiosk $kiosk) {
        $kl = Kiosk::find($kiosk);

        $request->validate([
            'restockId' => 'required|string|max:15',
            'kioskName' => 'required|string|max:150',
            'mealName' => 'required|string|max:50',
            'Category' => 'required|string|max:50',
            'qty' => 'required|string|max:10',
            'deliverName' => 'required|string|max:50',
            'status' => 'required|string|max:50', 
        ]);

        $rk = Restock::create([
            'kiosk_id' => $kl['id'],
            'machineID' => $kl['machineID'],
            'restockId' => $request->restockId,
            'kioskName' => $request->kioskName,
            'mealName' => $request->mealName,
            'Category' => $request->Category,
            'qty' => $request->qty,
            'deliverName' => $request->deliverName,
            'status' => $request->status,
        ]);

        $output = [
            'Restock' => $rk,
        ];
        return $this->sendResponse($output, 'Restock successfully saved.');
    }

    //update restock transaction

    //delete restock transaction

    
}
