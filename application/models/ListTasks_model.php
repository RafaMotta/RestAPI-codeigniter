<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListTasks_model extends CI_Model{

    public function listTasks(){
        $tarefas = $this->db->query("select * from cad_tarefa")->result();

        return $tarefas;
    }

}