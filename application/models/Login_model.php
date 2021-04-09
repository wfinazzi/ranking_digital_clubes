<?php


class Login_model extends CI_Model {

public $staidcodigo;
public $stanome;

public function efetuar_login($email, $senha){

	$query = $this->db->get_where('usuarios', array('email_address' => $email, 'password' => $senha, 'status' => 1));	
   

	if ($query->num_rows() > 0) {
		return $query->row();
	}else{
		return false;
	}
}

public function is_logged_in(){
	if($this->session->userdata("logged_in") == true){
		return true;
	}else{
		return false;
	}
}

public function assinatura(){
	$id_usuario = $this->session->userdata('id');
	$horario = date('Ymdhis');
	$assinatura = $horario.$id_usuario;
	return $assinatura;	
}

}