<?php


class Google_login_model extends CI_Model {

    function is_already_register($id){

        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('usuarios');
        
        if($query->num_rows() > 0){
            return true;        
        }else {
            return false;
        }
    }

    function update_user_data($data, $id){
        $this->db->where('login_oauth_uid',$id);
        $this->db->update('usuarios',$data);
    }

    function insert_user_data($data){
        $this->db->insert('usuarios',$data);
    }
}
?>