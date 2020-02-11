<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListTasks extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model("ListTasks_model", "modeltasks");
	}
	
	public function index()
	{
		// $tarefas = $this->modeltasks->listTasks();
		// $mpdf = new \Mpdf\Mpdf();
		$this->load->view('list');

        // $html = $this->load->view('list',[],true);
        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
		
	}		

	function list(){
		$tasks = $this->modeltasks->listTasks();
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));      

		$data = array();

		foreach($tasks as $r) {
			$edit = "<a href='ListTasks/edit/".$r->cod_tarefa."'>Editar</a>";
			$data[] = array(
				$r->cod_tarefa,
				$r->cod_categoria,
				$r->nome,
				$r->previsao,
				$r->texto,
				$r->valor,
				$r->cod_usuario_c,
				$r->data_c,
				$r->cod_usuario_a,
				$r->data_a,
				$edit
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $this->modeltasks->num_rows(),
			"recordsFiltered" => $this->modeltasks->num_rows(),
			"data" => $data
		);
		
		echo json_encode($output);
		exit();
	}

	public function save(){
		$cod_tarefa 	= $this->input->post('cod_tarefa');
		$cod_categoria 	= $this->input->post('cod_categoria');
		$nome 			= $this->input->post('nome');
		$previsao 		= $this->input->post('previsao') == "" ? "null" : $this->input->post('previsao');
		$texto 			= $this->input->post('texto') == "" ? "null" : $this->input->post('texto');
		$valor 			= $this->input->post('valor') == "" ? "null" : $this->input->post('valor');
		$cod_usuario_c 	= $this->input->post('cod_usuario_c') == "" ? "null" : $this->input->post('cod_usuario_c');
		$data_c 		= $this->input->post('data_c') == "" ? "null" : $this->input->post('data_c');
		$cod_usuario_a 	= $this->input->post('cod_usuario_a') == "" ? "null" : $this->input->post('cod_usuario_a');
		$data_a 		= $this->input->post('data_a') == "" ? "null" : $this->input->post('data_a');

		$return = $this->modeltasks->save(
			$cod_tarefa,
			$cod_categoria,
			$nome,
			$previsao,
			$texto,
			$valor,
			$cod_usuario_c,
			$data_c,
			$cod_usuario_a,
			$data_a
		);
		echo $return;
	}

	public function insert(){
		$cod_tarefa 	= $this->input->post('cod_tarefa');
		$cod_categoria 	= $this->input->post('cod_categoria');
		$nome 			= $this->input->post('nome');
		$previsao 		= $this->input->post('previsao') == "" ? "null" : $this->input->post('previsao');
		$texto 			= $this->input->post('texto') == "" ? "null" : $this->input->post('texto');
		$valor 			= $this->input->post('valor') == "" ? "null" : $this->input->post('valor');
		$cod_usuario_c 	= $this->input->post('cod_usuario_c') == "" ? "null" : $this->input->post('cod_usuario_c');
		$data_c 		= $this->input->post('data_c') == "" ? "null" : $this->input->post('data_c');
		$cod_usuario_a 	= $this->input->post('cod_usuario_a') == "" ? "null" : $this->input->post('cod_usuario_a');
		$data_a 		= $this->input->post('data_a') == "" ? "null" : $this->input->post('data_a');

		$return = $this->modeltasks->insert(
			$cod_tarefa,
			$cod_categoria,
			$nome,
			$previsao,
			$texto,
			$valor,
			$cod_usuario_c,
			$data_c,
			$cod_usuario_a,
			$data_a
		);
		echo $return;
	}
	public function edit($id = null){
		$data['tasks'] = $this->modeltasks->listTasks($id);

		$this->load->view('edit', $data);
	}

	public function create(){
		$this->load->view('create');
	}

	
}
