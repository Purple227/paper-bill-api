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
}
