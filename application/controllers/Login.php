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
        return;
     }

     $condiciones = array('usuario' => $data['usuario'],
                          'password' => $data['password'] );

     $query = $this->db->get_where('usuario', $condiciones);
     $usuario = $query->row();

     if( !isset( $usuario)){
        $respuesta = array(
            'error' => TRUE,
            'mensaje' => 'Usuario y/o password invalido.'
        );
        $this->response( $respuesta);
        return;
     }

     // usuario valido
     //TOKEN
     $token = bin2hex( openssl_random_pseudo_bytes(20));
     //$token = hash( 'ripemd160', $data['usuario'] );
     $token = hash( 'ripemd160', $usuario->email );


     //Guardar en db el token
     $this->db->reset_query();
     $actualizar_token = array('token'=> $token);
     $this->db->where( 'id', $usuario->id );

     $hecho = $this->db->update( 'usuario', $actualizar_token);

     $respuesta = array(
        'error' => FALSE,
        'token' => $token,
        'id_usuario' => $usuario->id
    );

     $this->response($respuesta);

   }


}