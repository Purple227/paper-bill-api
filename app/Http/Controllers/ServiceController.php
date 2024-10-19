<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    public function listService() {

                // Define the API endpoint
                $url = 'https://sandbox.vtpass.com/api/service-categories';

                // Set your API and public keys
                $apiKey = 'a39e799a687ba09d141c3fcfca784b2e';
                $publicKey = 'PK_667c96d4f13663e0d0a28da1ad29e6814e98f683ced';
        
                // Make the API call with headers
                $response = Http::withHeaders([
                    'api-key' => $apiKey,
                    'public-key' => $publicKey,
                ])->get($url);

                return $response;
    }

    public function listServiceProvider($identifier) {

        // Define the API endpoint
        $url = "https://sandbox.vtpass.com/api/services?identifier={$identifier}";

        // Set your API and public keys
        $apiKey = 'a39e799a687ba09d141c3fcfca784b2e';
        $publicKey = 'PK_667c96d4f13663e0d0a28da1ad29e6814e98f683ced';

        // Make the API call with headers
        $response = Http::withHeaders([
            'api-key' => $apiKey,
            'public-key' => $publicKey,
        ])->get($url);

        return $response;
}

public function listServiceVariation($service) {

    // Define the API endpoint
    $url = "https://sandbox.vtpass.com/api/service-variations?serviceID={$service}";

    // Set your API and public keys
    $apiKey = 'a39e799a687ba09d141c3fcfca784b2e';
    $publicKey = 'PK_667c96d4f13663e0d0a28da1ad29e6814e98f683ced';

    // Make the API call with headers
    $response = Http::withHeaders([
        'api-key' => $apiKey,
        'public-key' => $publicKey,
    ])->get($url);

    return $response;
}

public function payService(Request $request) {

        // Define the API endpoint
        $url = "https://sandbox.vtpass.com/api/pay";

        // Set your API and secret keys
        $apiKey = 'a39e799a687ba09d141c3fcfca784b2e';
        $secretKey = 'SK_3985db90e83d4e8bd2356268f23db726ba4d2bc44c2'; // Replace 'public-key' with 'secret-key'
    
        // Data to send in the POST request
        $postData = [
            // Include any required fields for the POST request
            'serviceID' => $request->service_id, // Replace with your actual data
            'request_id' => $request->service_id,
            'amount' => $request->amount,
            'phone' => $request->phone,
        ];
    
        // Make the POST request with headers
        $response = Http::withHeaders([
            'api-key' => $apiKey,
            'secret-key' => $secretKey,
        ])->post($url, $postData);
    
        return $response->json(); // Return the response as JSON    
}


}
