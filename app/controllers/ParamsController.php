<?php

namespace App\Controllers;
use Leaf\Http\Headers;
use Leaf\Http\Request;

class ParamsController extends Controller
{
    public function store()
    {   
        $request = request();
        $data = $request->params();
        
        $validatedData = $request->validate([
            'first-name' => 'required|textOnly',
            'last-name' => 'required|textOnly',
            'email' => 'required|email',
            'phone' => 'required|number',
            'address' => 'required',
            'city' => 'required|textOnly',
            'state' => 'required|textOnly',
            'zip' => 'required|number',
            'cc' => 'required|number',
            'cvv' => 'required|number',
            'expiry-month' => 'required|number',
            'expiry-year' => 'required|number',
          ]);
          
          $paramsObject = [
            'params' => $validatedData
          ];
          
          $encoded = json_encode($paramsObject, JSON_PRETTY_PRINT);

          $insert = \App\Models\Data::create([
            'payload' => $encoded
          ]);

        if($insert){
          return response()->json([
            'message' => 'Your message has been sent successfully.',
          ], 200);
        }

        return response()->json([
          'message' => 'There was an error sending your message, please try again later.',
        ], 422);
    }
}