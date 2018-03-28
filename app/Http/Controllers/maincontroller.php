<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\Custom\CloudwaysAPIClient;

class maincontroller extends Controller
{
    public function index()
    {
    	$cliente = new CloudwaysAPIClient();
    	$result = $cliente->get_persons();
    	// echo "<pre>";
    	// dd($result);
    	// echo "</pre>";
    	$resultado = json_decode($result);
        return view('index')->with(['persons' => $resultado]);
    }
}
