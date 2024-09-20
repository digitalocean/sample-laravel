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
    public function index() {
        $kiosks = Kiosk::all();
        $kiosk = $kiosks->groupBy('Status');
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
    #[OpenApi\Parameters(factory: CreateKioskParameters::class)]
    public function createKiosk(Request $request){

        $request->validate([
            'account_id' => 'required|string|max:255',
        ]);

        $kiosk = Kiosk::create([
            'account_id' => $request->account,
            'KioskType' => $request->KioskType,
            'KioskNumber' => $request->KioskNumber,
            'TradeNO' => $request->TradeNO,
            'MachineID' => $request->MachineID,
        ]);

        $output = [
            'kioks' => $kiosk,
        ];

        return $this->sendResponse($output, 'Kiosk retrieved successfully.');  
    }

    /**
     * Update Kiosk.
     *
     * Returns Kiosks
     */
    #[OpenApi\Operation(tags: ['Kiosk'])]
    public function editKiosk(Kiosk $kiosk){

        $kl = Kiosk::find($kiosk);

        $output = [
            'kiosk' => $kl,
        ];
        return $this->sendResponse($output, 'Kiosk retrieved succesfully');
    }


     /**
     * Retrieves all Kiosk.
     *
     * Returns all kiosk by status
     */
    #[OpenApi\Operation(tags: ['Kiosk'])]
    #[OpenApi\Parameters(factory: CreateKioskParameters::class)]
    public function updateKiosk(Request $request, $id) {
        $k = $request->all();
        $kl = Kiosk::find($id);
        if($k['Account_id'] != Null){$kl->KioskType = $k['Account_id'];}
        if($k['KioskType'] != Null){$kl->KioskType = $k['KioskType'];}
        if($k['KioskNumber'] != Null){$kl->KioskType = $k['KioskNumber'];}
        if($k['KioskAddress'] != Null){$kl->KioskType = $k['KioskAddress'];}
        if($k['city'] != Null){$kl->KioskType = $k['City'];}
        if($k['State'] != Null){$kl->KioskType = $k['State'];}
        if($k['Zip'] != Null){$kl->KioskType = $k['Zip'];}
        if($k['Latitude'] != Null){$kl->KioskType = $k['Latitude'];}
        if($k['Longitude'] != Null){$kl->KioskType = $k['Longitude'];}
        if($k['Status'] != Null){$kl->KioskType = $k['Status'];}
        if($k['TotalMeals'] != Null){$kl->KioskType = $k['TotalMeals'];}
        if($k['TotalSold'] != Null){$kl->KioskType = $k['TotalSold'];}
        $kl->save();

        $output = [
            'kioks' => $kl,
        ];

        return $this->sendResponse($output, 'Kiosk updated successfully.');  
    }

    /**
     * Destroy Meal.
     *
     * Deleted meal response
     */
    #[OpenApi\Operation(tags: ['Meals'])]
    public function delete($id) {
        $kiosk = Kiosk::destroy($id);

        $output = [
            'kiosk' => 'Success',
        ];
        return $this->sendResponse($output, 'Kiosk has been deleted');
    }

    public function kioskMachine(Request $request, ?string $funCode = null) {
        if($funCode = '50011011') {
            $j = 'hello';
        }
        $k = $request->all();

        $output = [
            'body' => [$k, $j],
            'message' => 'Success',
        ];

        return $this->sendResponse($output, 'data recieved');
    }



}
