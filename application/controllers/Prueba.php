<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
    public function index(){
        echo "Hola mundo";
    }

    public function obtener_arreglo($index){
        $arreglo = array( "manzana", "pera", "piña" );

        echo json_encode( $arreglo[$index] );
    }
}