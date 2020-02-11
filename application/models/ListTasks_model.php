<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListTasks_model extends CI_Model{

    public function listTasks($id = null){
		if(empty($id)){
			$tasks = $this->db->query("select * from cad_tarefa")->result();
		}else{
			$tasks = $this->db->query("select * from cad_tarefa where cod_tarefa={$id}")->row();
		}        

        return $tasks;
	}
	
	public function num_rows(){
		$tasks = $this->db->query("select * from cad_tarefa")->num_rows();
		if($tasks > 0){
			return $tasks;
		} else{
			return false;
		}
	}

	public function save($cod_tarefa,
						 $cod_categoria,
						 $nome,
						 $previsao,
						 $texto,
						 $valor,
						 $cod_usuario_c,
						 $data_c,
						 $cod_usuario_a,
						 $data_a){
		$this->db->trans_start();
		$this->db->set('cod_categoria', "{$cod_categoria}", FALSE);
		$this->db->set('nome', "'{$nome}'", FALSE);
		$this->db->set('previsao', "{$previsao}", FALSE);
		$this->db->set('texto', "'{$texto}'", FALSE);
		$this->db->set('valor', "{$valor}", FALSE);
		$this->db->set('cod_usuario_c', "{$cod_usuario_c}", FALSE);
		$this->db->set('data_c', "'{$data_c}'", FALSE);
		$this->db->set('cod_usuario_a', "{$cod_usuario_a}", FALSE);
		$this->db->set('data_a', "'{$data_a}'", FALSE);
		$this->db->where('cod_tarefa', $cod_tarefa);
		$this->db->update('cad_tarefa');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			return json_encode('error');
		}else{
			return json_encode('ok');
		}
	}

	public function insert($cod_categoria,
						   $nome,
						   $previsao,
						   $texto,
						   $valor,
						   $cod_usuario_c,
						   $data_c,
						   $cod_usuario_a,
						   $data_a){
		$data = [
			'cod_categoria' => $cod_categoria,
			'nome' => $nome,
			'previsao' => $previsao,
			'texto' => $texto,
			'valor' => $valor,
			'cod_usuario_c' => $cod_usuario_c,
			'data_c' => $data_c,
			'cod_usuario_a' => $cod_usuario_a,
			'data_a' => $data_a
		];
		
		$this->db->trans_start();
		$this->db->insert('cad_tarefa', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			return json_encode('error');
		}else{
			return json_encode('ok');
		}
	}

}
