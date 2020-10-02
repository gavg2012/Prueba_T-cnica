<?php

/**
 * Clase cliente del Api
 * @Filename: CarApi.php
 * @version: 1.0
 * @Author: Guillermo Valles Godoy
 * @Email: vallesguillermo@gmail.com
 * @Date: 01-10-2020 23:54
 */

class CarApi {

	protected $apiKey;


	public function __construct() {
		$this->apiKey = "VLbzjFUqGE4MmBU";
	}
	/**
	 * Funcion que invoca un servicio del Api
	 * @param string $service Nombre del servicio a ser invocado
	 * @param array $params datos a ser enviados
	 * @param string $method metodo http a utilizar
	 * @return string en formato JSON
	 */
	public function send($method) {
		//$method = strtoupper($method);
		$url = "http://54.207.126.58:10000/getCars";
		$params = 'VLbzjFUqGE4MmBU';
		//$data = $this->getPack($params, $method);
		//$sign = $this->sign($params);
		if($method == "GET") {
			$response = $this->httpGet($url, $params);
		} else {
			$response = $this->httpPost($url, $data, $sign);
		}
	}

		private function httpGet($url,$params)
		{
	    $url = 'http://54.207.126.58:10000/getCars';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	       'api-key: '.$params.',
	       'Content-Type: application/json',
	    ));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			$output = curl_exec($ch);
			if($output === false) {
				$error = curl_error($ch);
				throw new Exception($error, 1);
			}
			$info = curl_getinfo($ch);
			curl_close($ch);
	    //print_r($output);
			return $output;
		}


}
