<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Personas extends REST_Controller {
    
	/**
   * Get All Data from this method.
   *
   * @return Response
   */
   
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0){
      if(!empty($id)){
         $data = $this->db->get_where("personas", array('id_persona' => $id))->row_array();
      }else{
         $data = $this->db->get("personas")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "personas recuperados",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $json = $this->input->raw_input_stream;
      $persona = json_decode($json);
      $data = $this->db->insert('personas',$persona);
      if ($data>0){
         $agregado = $this->db->select_max('id_persona');
         $id =$this->db->get('personas')->row_array()["id_personagit remote add origin"];
         $data = array(
            "status"    => "ok",
            "message"   => "persona agregada",
            "data" => array (
               "id_persona" => $id
            )
         );
         $this->response($data, REST_Controller::HTTP_OK);
      
      }

   }

   public function index_put($id)
   {
      $json = $this->input->raw_input_stream;
      $personas = json_decode($json);
      $this->db->update('personas', $personas, array('id_persona'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "persona actualizado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete('personas', array('id_persona'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "persona eliminada"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

}