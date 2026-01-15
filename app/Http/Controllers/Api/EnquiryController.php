<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'destination' => 'required|string',
            'travel_date' => 'nullable|date',
            'number_of_travelers' => 'required|integer|min:1',
            'budget' => 'nullable|numeric',
            'special_requests' => 'nullable|string',
            'terms_agreed' => 'required|boolean|accepted',
        ]);

        $enquiry = Enquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Enquiry submitted successfully',
            'data' => [
                'enquiry_id' => $enquiry->id,
                'redirect_url' => '/thank-you'
            ]
        ]);
    }

}
