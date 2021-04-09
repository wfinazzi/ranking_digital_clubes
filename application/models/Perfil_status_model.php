<?php


class Perfil_Status_model extends CI_Model {


public function get_perfis()
{
        $query = $this->db->get('perfis');
        $resultado = $query->result();	

		return $resultado;

}

public function get_perfil($id)
{
        $query = $this->db->get_where('perfis', array('ID' => $id));        
        return $query->row();
}


public function get_all_status()
{
		$query = $this->db->get('status');
		$resultado = $query->result();	

		return $resultado;

}

public function get_status($id)
{
        $query = $this->db->get_where('status', array('ID' => $id));
        return $query->row();
}


}
?>