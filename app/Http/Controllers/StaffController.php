<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StaffController extends Controller
{
    // Utility functions to encode and decode base64
    private function encodeID($id)
    {
        return base64_encode($id);
    }

    private function decodeID($encodedID)
    {
        return base64_decode($encodedID);
    }

    // Show the index page (you can replace this with actual content)
    public function index()
    {
        return view('index');
    }

    // Fetch staff data by encoded ID
    public function showStaff($encodedName)
    {
        // Decode the ID
        $decodedName = $this->decodeID($encodedName);

        // Build the API URL
        $mainURL = "http://staff-system.rupp.edu.kh/api/resource/Employee/{$decodedName}";

        try {
            // Make the API request with the token
            $response = Http::withHeaders([
                'Authorization' => 'token 758918cedd8ac69:2129ee1699a8f2a',
            ])->get($mainURL);

            // Check if the response is successful and contains data
            $data = $response->json(); // Get the entire response data

            if ($response->successful() && isset($data['data'])) {
                return view('staff', [
                    'data' => $data['data'],
                    'encodedName' => $encodedName
                ]);
            } else {
                return redirect(url('/404'));
            }
        } catch (Exception $e) {
            // Check if the exception has a valid response and the status code is 404
            $response = $e->getResponse();

            if ($response !== null && $response->getStatusCode() === 404) {
                return redirect(url('/404'));
            }

            // Return generic error if the API request fails
            return redirect(url('/404'));
        }
    }


    // Redirect from the original to encoded URL
    public function redirectToEncoded($originalID)
    {
        // Encode the original ID
        $encodedID = $this->encodeID($originalID);

        // Redirect to the encoded URL
        return redirect()->route('staff.show', ['encodedName' => $encodedID]);
    }
}
