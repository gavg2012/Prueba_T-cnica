<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

session(['filtros' => '']);

class UsodeApi extends Controller
{
  public function InicioApi(Request $request)
  {
    //Array para almanecar datos obtenidos como respuesta del api.
    //Separar marcas, modelos, tipo y año para la carga de los filtros.
    $CarS = array();
    $marcas = array();
    $modelos = array();
    $tipos = array();
    $years = array();

    //Variables para el control de array()
    $j=0;
    $k=0;
    $m=0;
    $n=0;

    //inicio de consumo de api
    $key = 'VLbzjFUqGE4MmBU';

    $url = 'http://54.207.126.58:10000/getCars';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'api-key: '.$key,
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
    $response = json_decode($output);
    //fin de consumo de api
    
    //inicio de carga de datos
    for($i=0; $i<count($response); $i++)
    {
        $CarS[$i]['idCar']        = $response[$i]->idCar;
        $CarS[$i]['brand']        = $response[$i]->brand;
        $CarS[$i]['model']        = $response[$i]->model;
        $CarS[$i]['year']         = $response[$i]->year;
        $CarS[$i]['typeVehicle']  = $response[$i]->typeVehicle;
        $CarS[$i]['img']          = $response[$i]->img;

        //inicio de carga de datos para filtros
        if (!in_array($response[$i]->brand, $marcas)) 
        {
          $marcas[$j] = $response[$i]->brand;
          $j++;
        }

        if (!in_array($response[$i]->model, $modelos)) 
        {
          $modelos[$k] = $response[$i]->model;
          $k++;
        }

        if (!in_array($response[$i]->typeVehicle, $tipos)) 
        {
          $tipos[$m] = $response[$i]->typeVehicle;
          $m++;
        }

        if (!in_array($response[$i]->year, $years)) 
        {
          $years[$n] = $response[$i]->year;
          $n++;
        }
        //fin de carga de datos para para los filtros

    }
    //fin de carga de datos

    //inicio Almacenamiento en session de los datos
    session(['datos' => $CarS]);
    
    session(['marcas' => $marcas]);
    session(['modelos' => $modelos]);
    session(['tipos' => $tipos]);
    session(['years' => $years]);
    //fin Almacenamiento en session de los datos

    //indico al framework la vista a mostrar.
    return view('index');

  }

  public function Filtrar(Request $request)
  {
    //carga de filtros
    $filtros = session('datos');
    $CarS = array();
    $j = 0;
    foreach ($request->filtros as $subject)
    {
      for($i=0; $i<count($filtros); $i++)
      {
        //Busco en mi array de datos la coincidencia con los filtros
        if (in_array($subject, $filtros[$i])) 
        {
          //De ser verdadero, cargo un array temporal con los datos correspondientes a los filtros
          $CarS[$j] = $filtros[$i];
          $j++;
        }
      }
    }
    //Almacenamiento en session de los filtros
    session(['filtros' => $CarS]);
  }
}
