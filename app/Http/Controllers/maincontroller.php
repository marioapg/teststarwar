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
    	$all = json_decode($result);
    		
    	foreach ($all->results as &$rows) {
    		$x = '';
    		foreach ($rows->species as $value) {
    			$x .= $this->getSpecies($value)->name.",";
    		}
    		$rows->species = trim($x, ',');
    	}
        return view('index')->with(['persons' => $all]);
    }


    public function getSpecies( $urlparam='')
    {
    	$url = '';
    	if (!isset($urlparam)) {
    		$url = 'https://swapi.co/api/species/1/';
    	}else {
    		$url = $urlparam;
    	}
    	$url = urldecode($url);
    	$cliente = new CloudwaysAPIClient();
    	$result = $cliente->get_persons($url);
    	$species = json_decode($result);
        return $species;
    }

    public function detail( $urlparam='')
    {
    	if (!isset($_GET['urlparam'])) {
    		$urlparam = 'https://swapi.co/api/people/1';
    	}else {
    		$urlparam = $_GET['urlparam'];
    	}

    	$urlparam = urldecode($urlparam);

    	$cliente = new CloudwaysAPIClient();
    	$result = $cliente->get_persons($urlparam);
    	$individual = json_decode($result);
        return view('details')->with(['details' => $individual]);
    }
}
