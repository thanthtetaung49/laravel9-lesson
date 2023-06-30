<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function adminData(Request $request, $greeting, $number){
        $customeArray = [
            "name" => $request->userName,
            "age" => $request->userAge,
            "address" => $request->userAddress,
            "gender" => $request->userGender
        ];

        dd($request, $request->all(), $customeArray, $greeting, $number);
    }

    public function compactTest(){
        $testCompact = "This is compact message";
        $name = "This is name";
        $age = 12;
        $message = "Hello World, this is message for you";

        return view('compactTest', compact('testCompact', 'name', 'age', 'message'));
    }
}
