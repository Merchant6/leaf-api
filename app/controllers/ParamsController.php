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
        
        // $validatedData = $request->validate([
        //     'first-name' => 'required|textOnly',
        //     'last-name' => 'required|textOnly',
        //     'email' => 'required|email',
        //     'phone' => 'required|number',
        //     'address' => 'required|text',
        //     'city' => 'required|text',
        //     'state' => 'required|text',
        //     'zip' => 'required|number',
        //     'cc' => 'required|creditCard',
        //     'cvv' => 'required|number',
        //     'expiry-month' => 'required|number|between:[1,12]',
        //     'expiry-year' => 'required|number',
        // ]);

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

        return response()->json([
            'message' => $insert,
        ], 200);
    }
}