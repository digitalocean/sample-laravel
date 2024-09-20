<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Faq;
use App\OpenApi\Parameters\FaqParameters;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;


class FaqController extends BaseController
{
    // index
    public function index() {
        $faq = Faq::get();

        $ouput = [
            'faq' => $faq,
        ];

        return $this->sendResponse($ouput, 'Faqs have been succesfully retrieved');
    }

    
    // create
    #[OpenApi\Operation(tags: ['faqs'])]
    #[OpenApi\Parameters(factory: FaqParameters::class)]
    public function createFaq(Request $request) {
        $request->validate([
            'question' => 'required|string|max:200',
            'answer' => 'required|string|max:300',
        ]);

        Faq::create([
            'question' => $request->answer,
            'answer' => $request->answer,
        ]);

        $success['true'] = 'success';

        return $this->sendResponse($success, 'Faq created successfully.');
    }

    // update
    #[OpenApi\Operation(tags: ['faqs'])]
    #[OpenApi\Parameters(factory: FaqParameters::class)]
    public function updateFaq(Request $request, Faq $faq) {
        $request->validate([
            'question' => 'required|string|max:200',
            'answer' => 'required|string|max:300',
        ]);

        $faq - Faq::find($faq->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $success['true'] = 'success';

        return $this->sendResponse($success, 'Faq updated successfully.');
    }

    // delete
    #[OpenApi\Operation(tags: ['faqs'])]
    #[OpenApi\Parameters(factory: FaqParameters::class)]
    public function deleteFaq(Faq $faq) {
        $faq - Faq::find($faq->id);
        $faq->delete();
        $success['true'] = 'success';

        return $this->sendResponse($success, 'Faq deleted successfully.');
    }
}
