<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
//use Restserver\libraries\REST_Controller;

class Pais extends REST_Controller {

    public function __construct(){

        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");

      parent::__construct();
      $this->load->database();
    }
    
   public function index_get(){
       $query = $this->db->query(' SELECT * FROM equipo');

       $respuesta = array(
           'error' => FALSE,
           'equipo' => $query->result_array()
    );


    $this->response( $respuesta );
   }

   public function todos_get( $pagina = 0 ){

    $pagina = $pagina * 10;

    $query = $this->db->query(' SELECT * FROM equipo limit '. $pagina .',10 ');

       $respuesta = array(
           'error' => FALSE,
           'equipo' => $query->result_array()
    );


    $this->response( $respuesta );
   }

   public function por_grupo_get( $tipo=0, $pagina=0 ){

   }

   public function buscar_get( $termino ){

   }
}