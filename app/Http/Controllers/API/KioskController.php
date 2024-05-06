<?php

namespace App\Http\Controllers\API;

use App\Models\Kiosk;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class KioskController extends BaseController {
    //
    public function index() {
        $kiosk = Kiosk::all();

        $output = [
            'kioks' => $kiosk,
        ];
        return $this->sendResponse($output, 'Franchisee Kiosk retrieved successfully.');
        
    }
}
