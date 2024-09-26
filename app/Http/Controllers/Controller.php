<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function makApiCall($endPoint=NULL, $param=NULL)
    {
        try {
            $response = Http::timeout(50)->withHeaders([
                'Mak_Authorization' => 'YWxocGxAbWFrcnV6ei5jb20tMTdPaXRFMm4=',
                'Accept' => 'application/json'
            ])
            ->withoutVerifying()
            ->post('https://staging.makruzz.com/booking_api/' . $endPoint, $param);
            $data = json_decode($response);
            return $data;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $data = [];
            return $data;
        }
 
        // $data = json_decode($response);
        // return $data;
    }
 
    public function nautikaApiCall($endPoint=NULL, $param=NULL)
    {
        $authParam = array('userName' => 'Asmithatours', 'token' => 'U2FsdGVkX1/iQw6SQpnUnD1/IyFmD9HwnrYwwaQRegkhTR8wtx5JoBk/LJhKAplhJ9RPJQDH0dnuTUWoyrH1IU1yNZI/nojPoHcf2gOKREw=');
        $paramAll = array_merge($param, $authParam);
        
        //$response = Http::post('http://api.dev.gonautika.com:8012/' . $endPoint, $paramAll);

        try {
            $response = Http::timeout(50)->post('http://api.dev.gonautika.com:8012/'. $endPoint, $paramAll);
            $data = json_decode($response);
            return $data;

        } catch (\Illuminate\Http\Client\RequestException $e) {
            $data = [];
            return $data;
        }

         $data = json_decode($response);
        return $data;

    }
}
