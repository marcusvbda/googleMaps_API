<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class mapsController extends Controller
{
    public function index()
    {  
        try
        {
            $token = $_POST['_token'];

            if(!authController::checkToken($token))
                return response()->json([
                    "statusCode" => 401,
                    "message" => "invalid token"
                ],401);

            $endereco = $_POST['logradouro'].", ".$_POST['numero'].", ".$_POST['cidade'].", ".$_POST['estado'];
            $Address = urlencode($endereco);

            $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?key="
                .env("googleMapsToken")."&address=".$Address;
            $xml = simplexml_load_file($request_url);
            $status = $xml->status;
            if ($status=="OK") {
                $Lat = $xml->result->geometry->location->lat;
                $Lon = $xml->result->geometry->location->lng;

                return view('maps',compact('Lat','Lon'));
            }
        }
        catch(\Exception $e)
        {
            return response($e->getMessage(),500);
        }
        
    }

}