<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\Custom\CloudwaysAPIClient;

class maincontroller extends Controller
{
    public function index( $urlparam='')
    {
    	if (!isset($_GET['urlparam'])) {
    		$urlparam = 'https://swapi.co/api/people/';
    	}else {
    		$urlparam = $_GET['urlparam'];
    	}

    	$urlparam = urldecode($urlparam);

    	$cliente = new CloudwaysAPIClient();
    	$result = $cliente->get_persons($urlparam);
    	// echo "<pre>";
    	// dd($result);
    	// echo "</pre>";
    	$resultado = json_decode($result);
        return view('index')->with(['persons' => $resultado]);
    }
}
