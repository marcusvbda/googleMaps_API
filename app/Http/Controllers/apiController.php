<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class apiController extends Controller
{
    public function index()
    {  
        try
        {
            $token = "";
            if(isset($_POST['_token']))
               $token =  $_POST['_token'];
            if(!authController::checkToken($token))
                return response()->json([
                    "statusCode" => 401,
                    "message" => "invalid token"
                ],401);

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );  

                
            $cep = $_POST['cep'];
            if(!$content = @file_get_contents("https://viacep.com.br/ws/{$cep}/json/"))
                return response()->json([
                    "statusCode" => 505,
                    "message" => "invalid cep"
                ],401);

            $json = json_decode($content, true);
            return response($json,202);
        }
        catch(\Exception $e)
        {
            return response($e->getMessage(),500);
        }
        
    }

}