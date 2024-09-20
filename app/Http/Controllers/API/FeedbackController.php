<?php

namespace App\Http\Controllers\API;
use App\Models\Feedback;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

class FeedbackController extends BaseController

{
    /**
     * Retrieven all Feedback.
     *
     * Returns application submitted
     */
    #[OpenApi\Operation(tags: ['feedback'])]
    public function allFeedback() {
        
        $feedback = Feedback::get();

        $output = [
            'feedback' => $feedback,
        ];

        return $this->sendResponse($output, 'All Feedback retrieve succesfully.'); 

    }

    /**
     * Retrieven Feedback by account.
     *
     * Returns application submitted
     */
    #[OpenApi\Operation(tags: ['feedback'])]
    public function accountUserFeedback(Account $account) {
        
        $feedback = Feedback::find($account->id);

        $output = [
            'feedback' => $feedback,
        ];

        return $this->sendResponse($output, 'Franchisee feedback retrieved succesfully.'); 
    }
    /**
     * Submitted Feedback.
     *
     * Returns application submitted
     */
    #[OpenApi\Operation(tags: ['feedback'])]
    public function feedbackFranchisee(Request $request, Account $account) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $submit = Feedback::Create([
            'Name' => $request->name,
            'Account_id' => $account->id,
            'Body' => $request->body,
            'Status' => 'submitted',
        ]);

        $output = [
            'feedback' => $submit->Status,
        ];

        return $this->sendResponse($output, 'Feedback submitted succesfully.'); 

    }

    /**
     * delete Feedback.
     *
     * Returns application submitted
     */
    #[OpenApi\Operation(tags: ['feedback'])]
    public function deleteFeedback(Feedback $feedback) {
        
        $feedback = Feedback::find($feedback);
        $feedback->delete();
        $output = [
            'feedback' => 'destroyed',
        ];

        return $this->sendResponse($output, 'Current Feeadbak entry destroyed succesfully.'); 

    }

    
}
