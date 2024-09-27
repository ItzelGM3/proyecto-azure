<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Ubicacion extends REST_Controller {
    
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
         $data = $this->db->get_where("ubicacion", array('id_ubicacion' => $id))->row_array();
      }else{
         $data = $this->db->get("ubicacion")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "Ubicacion(es) recuperados",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $json = $this->input->raw_input_stream;
      $ubicacion = json_decode($json);
      $this->db->insert('ubicacion',$ubicacion);
      $data = array(
         "status"    => "ok",
         "message"   => "Ubicacion agregada"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_put($id)
   {
      $json = $this->input->raw_input_stream;
      $ubicacion = json_decode($json);
      $this->db->update('ubicacion', $ubicacion, array('id_ubicacion'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "Ubicacion actualizado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete('ubicacion', array('id_ubicacion'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "Ubicacion eliminada"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

}