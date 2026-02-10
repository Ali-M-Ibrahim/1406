<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FirstController extends Controller
{
    public function index(){
        return "Hello I am First Controller and i am index function";
    }

    public function index2(){
        return "Hello i am first controller and i am index 2";
    }

    public function index3(){
        return 10+10;
    }

    public function index4(){
        return response([
            "name"=>"Ali Ibrhaim",
            "address"=> "Beirut"
        ]);
    }

    public function index5(){
        return response()->json([
            "name"=>"Ali Ibrhaim",
            "address"=> "Beirut"
        ]);
    }

    public function index6(){
        $obj = ["course"=>"Web Development 2", "teacher"=>"Ali Ibrahim"];
        return response($obj,201);
    }


    public function index7(){
        $obj = ["course"=>"Web Development 2", "teacher"=>"Ali Ibrahim"];
        return response($obj,Response::HTTP_ACCEPTED);
    }


    public function index8(){
        $obj = ["course"=>"Web Development 2", "teacher"=>"Ali Ibrahim"];
        return response($obj,
            Response::HTTP_ACCEPTED,
            [
                'secret1'=>"This is my password",
                "secret2"=>"This is another message from server"
            ]);
    }

    public function index9(){
        return response()->json([
            "name"=>"Ali Ibrhaim",
            "address"=> "Beirut"
        ],200)->header("secret3","this is my message");
    }

    public function index10(Request $request){
        $headerValue = $request->header("password");
        error_log("------------------------ HEADER VALUE IS: ". $headerValue);
        if($headerValue=="123456789"){
            return response(["message"=>"sucess"],200);
        }else{
            return response(['message'=>"Missing key"],Response::HTTP_UNAUTHORIZED);
        }
    }


    public function index11(Request $request){

        $firstName = $request->first_name;
        $lastName = $request->last_name;

        $firstName2 = $request->input('first_name',"JOE");
        $lastName2 = $request->input("last_name","DOE");

        $fullName = $firstName2 . " " . $lastName2;
        error_log("the name is: " . $fullName);
        return response(["message"=>"success"],200);
    }


    public function index12($id){
        return "the value of the id is: " . $id;
    }

    public function index13($id, $name){
        return "the value of the id is: " . $id . "  and the name is: " . $name;
    }

    public function index14($id =0){
        return "the value of the id is: " . $id;
    }



}
