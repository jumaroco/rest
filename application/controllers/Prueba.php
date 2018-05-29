<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
//use Restserver\libraries\REST_Controller;

class Prueba extends REST_Controller {
    public function index(){
        echo "Hola mundo";
    }

    public function obtener_arreglo_get($index){
        $arreglo = array( "manzana", "pera", "piña" );

        $this->response( $arreglo[$index] );
    }
}