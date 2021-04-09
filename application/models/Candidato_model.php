<?php


class Candidato_model extends CI_Model {

public $nome;
public $email;




public function get_candidatos()
{
		$query = $this->db->get_where('candidatos', array('status' => 0));
		$resultado = $query->result();	

		return $resultado;

}

public function get_candidato($id)
{
        $query = $this->db->get_where('candidatos', array('id' => $id));
        return $query->row();
}

public function update_status_candidato($id, $status)
{			
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('candidatos');        
}

public function excluirCandidato($id)
{
		
		$this->db->where('id', $id);
		if($this->db->delete('candidatos')){
			return true;
		}else{
			return false;
		}
}

public function insert_candidato($parametros)
{

	extract($parametros);

	$query = $this->db->get_where('candidatos', array('email' => $email));

	if ($query->num_rows() > 0) {
		return false;
	}else {
		$this->nome            = $nome; // please read the below note
		$this->email           = $email;      		

		if($this->db->insert('candidatos', $this)){
				return true; 
		}else {
				return "erro";
		}
	}       
        
}



}