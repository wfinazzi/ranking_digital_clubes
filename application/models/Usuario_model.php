<?php


class Usuario_model extends CI_Model {



public function get_usuarios()
{
        $query = $this->db->get('usuarios');

        $resultado = $query->result();
        
        foreach($resultado as $item){
            
           // echo $item->STATUS;
            $item->STATUS_NOME = $this->perfil_status_model->get_status($item->status)->STATUS;
            $item->PERFIL_NOME = $this->perfil_status_model->get_perfil($item->perfil)->PERFIL;
        }
       
        return $resultado;
}

public function get_usuario($id)
{
        $query = $this->db->get_where('usuarios', array('user_id' => $id));
        return $query->row();
}

public function insert_usuario($parametros)
{

        extract($parametros);

        $candidato = $this->candidato_model->get_candidato($id);
       
        $this->login_oauth_uid     = $candidato->login_oauth_uid;
        $this->first_name          = $candidato->NOME;         
        $this->email_address         = $candidato->EMAIL;
        $this->password         = gerar_senha(6, true, true, true, false); 
        $this->perfil      = $perfil;
        
        if($this->db->insert('usuarios', $this)){
                if(isset($id)){
                        $this->candidato_model->update_status_candidato($id,1);
                }

                $data = [	
                      'login_oauth_uid' => $this->login_oauth_uid, 
                           'first_name' => $this->first_name,			
                        'email_address' => $this->email_address,
                        'perfil' => $perfil,
                        'senha' => $this->password								
                ];		

                return $data;
        }else{
		    return false;
        }        
}

public function update_usuario($id,$parametros)
{       

        extract($parametros);       

        $this->db->set('first_name',$nome); 
        $this->db->set('email_address',$email);      
        
       
        if($this->db->update('usuarios')){
		    return true;
        }else{
		    return false;
        }        
}

public function inativar_usuario($id)
{        
        $usustatus        = 0;        
	
        $this->db->set('status', $usustatus);
        $this->db->where('user_id', $id);
        $this->db->update('usuarios');
        //echo $this->db->last_query();
}

public function ativar_usuario($id)
{        
        $usustatus        = 1;        
	
        $this->db->set('status', $usustatus);
        $this->db->where('user_id', $id);
        $this->db->update('usuarios');
        //echo $this->db->last_query();
}






}