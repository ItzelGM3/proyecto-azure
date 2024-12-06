<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Resguardos extends REST_Controller {
    
	/**
   * Get All Data from this method.
   *
   * @return Response
   */
   
   public function __construct() {
      parent::__construct();
      $this->load->database();
      header('Access-Control-Allow-Origin: *');   
      header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
      header('Access-Control-Allow-Headers: Content-Type, Authorization');
      
       
      if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          exit();  
      }
 }

   public function index_get($id = 0){
      if(!empty($id)){
         $data = $this->db->get_where("resguardos", array('id_resguardo' => $id))->row_array();
      }else{
         $data = $this->db->get("resguardos")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "Resguardos recuperados",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
       $json = $this->input->raw_input_stream;
       $resguardo = json_decode($json);
   
       if (empty($resguardo->id_persona) || empty($resguardo->id_mobiliario)) {
           $response = array(
               "status"  => "error",
               "message" => "Faltan llaves foráneas: id_persona o id_mobiliario"
           );
           $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
           return; 
       }
   
       $persona = $this->db->get_where('personas', array('id_persona' => $resguardo->id_persona))->row_array();
       if (empty($persona)) {
           $response = array(
               "status"  => "error",
               "message" => "Persona no encontrada"
           );
           $this->response($response, REST_Controller::HTTP_NOT_FOUND);
           return;
       }
   
       $mobiliario = $this->db->get_where('mobiliario', array('id_mobiliario' => $resguardo->id_mobiliario))->row_array();
       if (empty($mobiliario)) {
           $response = array(
               "status"  => "error",
               "message" => "Mobiliario no encontrado"
           );
           $this->response($response, REST_Controller::HTTP_NOT_FOUND);
           return;
       }
   
       $this->db->insert('resguardos', $resguardo);
       if ($this->db->affected_rows() > 0) {
           $id = $this->db->insert_id();
           $data = array(
               "status"  => "ok",
               "message" => "Resguardo agregado",
               "data"    => array(
                   "id_resguardo" => $id
               )
           );
           $this->response($data, REST_Controller::HTTP_OK);
       } else {
           $response = array(
               "status"  => "error",
               "message" => "No se pudo agregar el resguardo"
           );
           $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
       }
   }
   
   public function index_put($id)
   {
       $json = $this->input->raw_input_stream;
       $resguardo = json_decode($json);
   
       $existing_resguardo = $this->db->get_where('resguardos', array('id_resguardo' => $id))->row_array();
       if (empty($existing_resguardo)) {
           $response = array(
               "status"  => "error",
               "message" => "Resguardo no encontrado"
           );
           $this->response($response, REST_Controller::HTTP_NOT_FOUND);
           return; 
       }
   
       if (isset($resguardo->id_persona) && !empty($resguardo->id_persona)) {
           $persona = $this->db->get_where('personas', array('id_persona' => $resguardo->id_persona))->row_array();
           if (empty($persona)) {
               $response = array(
                   "status"  => "error",
                   "message" => "Persona no encontrada"
               );
               $this->response($response, REST_Controller::HTTP_NOT_FOUND);
               return; 
           }
       }
   
       if (isset($resguardo->id_mobiliario) && !empty($resguardo->id_mobiliario)) {
           $mobiliario = $this->db->get_where('mobiliario', array('id_mobiliario' => $resguardo->id_mobiliario))->row_array();
           if (empty($mobiliario)) {
               $response = array(
                   "status"  => "error",
                   "message" => "Mobiliario no encontrado"
               );
               $this->response($response, REST_Controller::HTTP_NOT_FOUND);
               return; 
           }
       }
   
       $this->db->update('resguardos', $resguardo, array('id_resguardo' => $id));
       
       if ($this->db->affected_rows() > 0) {
           $data = array(
               "status"  => "ok",
               "message" => "Resguardo actualizado"
           );
       } else {
           $data = array(
               "status"  => "error",
               "message" => "No se realizó ninguna actualización"
           );
       }
   
       $this->response($data, REST_Controller::HTTP_OK);
   }
   

   public function index_delete($id)
   {
       $existing_resguardo = $this->db->get_where('resguardos', array('id_resguardo' => $id))->row_array();
       if (empty($existing_resguardo)) {
           $response = array(
               "status"  => "error",
               "message" => "Resguardo no encontrado"
           );
           $this->response($response, REST_Controller::HTTP_NOT_FOUND);
           return; 
       }
   
       $this->db->delete('resguardos', array('id_resguardo' => $id));
   
       if ($this->db->affected_rows() > 0) {
           $data = array(
               "status"  => "ok",
               "message" => "Resguardo eliminado"
           );
       } else {
           $data = array(
               "status"  => "error",
               "message" => "No se pudo eliminar el resguardo"
           );
       }
   
       // Responder
       $this->response($data, REST_Controller::HTTP_OK);
   }
   

}