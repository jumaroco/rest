<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
//use Restserver\libraries\REST_Controller;

class Login extends REST_Controller {

    public function __construct(){

        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");

      parent::__construct();
      $this->load->database();
    }
    
   public function index_post(){

       $data = $this->post();

       if( !isset( $data['usuario']) OR !isset( $data['password'])){
        $respuesta = array(
            'error' => TRUE,
            'mensaje' => 'La información enviada no es válida'
     );
        $this->response( $respuesta, REST_Controller::HTTP_BAD_REQUEST);
     }

   }


}