<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Tasks extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    //    $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("cad_tarefa", ['cod_tarefa' => $id])->row_array();
        }else{
            $data = $this->db->get("cad_tarefa")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('cad_tarefa',$input);
     
        $this->response(['Tarefa criada.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('cad_tarefa', $input, array('cod_tarefa'=>$id));
     
        $this->response(['Tarefa atualizada.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('cad_tarefa', array('cod_tarefa'=>$id));
       
        $this->response(['Tarefa Deletada.'], REST_Controller::HTTP_OK);
    }
    	
}
