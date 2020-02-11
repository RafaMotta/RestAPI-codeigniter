<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListTasks extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model("ListTasks_model", "modeltasks");
	}
	
	public function index()
	{
		$tarefas = $this->modeltasks->listTasks();
		
		$this->load->view('list', $tarefas);
	}
}
