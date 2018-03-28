<?php 
namespace App\Custom;
use GuzzleHttp\Client;

Class CloudwaysAPIClient{
	private $client = null;
	const API_URL = "http://swapi.co/api/";


	public function __construct()
	{
		$this->client = new Client();
	}


	public function StatusCodeHandling($e) {
		if ($e->getResponse()->getStatusCode() == ‘400’)
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == ‘422’)
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == ‘500’)
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == ‘401’)
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == ‘403’)
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
		else
		{
			$response = json_decode($e->getResponse()->getBody(true)->getContents());
			return $response;
		}
	}


	Public function get_persons() {
		try
		{
			$url = self::API_URL ."people/";
			$option = array('exceptions' => false);
			$response = $this->client->get($url);
			$result = $response->getBody()->getContents();
			return $result;
		}
		catch (RequestException $e)
		{
			$response = $this->StatusCodeHandling($e);
			return $response;
		}
	}


}