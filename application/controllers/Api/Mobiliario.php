<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mobiliario extends REST_Controller {
    
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
         $data = $this->db->get_where("mobiliario", array('id_mobiliario' => $id))->row_array();
      }else{
         $data = $this->db->get("mobiliario")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "Mobiliario recuperado",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
{
    $json = $this->input->raw_input_stream;
    $mobiliario = json_decode($json);

    
    if (isset($mobiliario->id_ubicacion) && !empty($mobiliario->id_ubicacion)) {
        $id = $mobiliario->id_ubicacion;

        
        $data = $this->db->get_where("ubicacion", array('id_ubicacion' => $id))->row_array();

        
        if (empty($data)) {
            $response = array(
                "status"  => "error",
                "message" => "Ubicación no encontrada"
            );
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
            return;
        }
    } else {
       
        $data = $this->db->get("ubicacion")->result();
    }
    $this->db->insert('mobiliario', $mobiliario);
    $response = array(
        "status"  => "ok",
        "message" => "Mobiliario agregado"
    );
    
    $this->response($response, REST_Controller::HTTP_OK);
}
public function index_put($id)
{
    $json = $this->input->raw_input_stream;
    $mobiliario = json_decode($json);

    if (isset($mobiliario->id_ubicacion) && !empty($mobiliario->id_ubicacion)) {
        $ubicacion_id = $mobiliario->id_ubicacion; 
        
        $data = $this->db->get_where("ubicacion", array('id_ubicacion' => $ubicacion_id))->row_array();
        if (empty($data)) {
            $response = array(
                "status"  => "error",
                "message" => "Ubicación no encontrada"
            );
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
            return;
        }
    }

    $this->db->update('mobiliario', $mobiliario, array('id_mobiliario' => $id));

    if ($this->db->affected_rows() > 0) {
        $data = array(
            "status"  => "ok",
            "message" => "Mobiliario actualizado"
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
   
    $mobiliario = $this->db->get_where('mobiliario', array('id_mobiliario' => $id))->row_array();

    if (empty($mobiliario)) {
      
        $response = array(
            "status"  => "error",
            "message" => "Mobiliario no encontrado"
        );
        $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        return; 
    }

    $this->db->delete('mobiliario', array('id_mobiliario' => $id));

    $data = array(
        "status"  => "ok",
        "message" => "Mobiliario eliminada"
    );
    $this->response($data, REST_Controller::HTTP_OK);
}

}