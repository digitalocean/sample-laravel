<?php

namespace App\Http\Controllers\API;

use App\Models\Kiosk;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\OpenApi\Parameters\Kiosk\CreateKioskParameters;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class KioskController extends BaseController {
     /**
     * Retrieves all Kiosk.
     *
     * Returns all kiosk by status
     */
    #[OpenApi\Operation(tags: ['Kiosk'])]
    #[OpenApi\Parameters(factory: CreateKioskParameters::class)]
    public function createKiosk(Request $request){

        $request->validate([
            'account_id' => 'required|string|max:255',
        ]);

        $kiosk = Kiosk::create([
            'account_id' => $request->account,
            'KioskType' => $request->KioskType,
            'KioskNumber' => $request->KioskNumber,
            'Status' => 'offline'
        ]);

        $output = [
            'kioks' => $kiosk,
        ];

        return $this->sendResponse($output, 'Kiosk retrieved successfully.');  
    }

     /**
     * Retrieves all Kiosk.
     *
     * Returns all kiosk by status
     */
    #[OpenApi\Operation(tags: ['Kiosk'])]
    public function index() {
        $kiosks = Kiosk::all();
        $kiosk = $kiosks->groupBy('Status');
        $output = [
            'kioks' => $kiosk,
        ];
        return $this->sendResponse($output, 'Kiosk retrieved successfully.');  
    }

}
