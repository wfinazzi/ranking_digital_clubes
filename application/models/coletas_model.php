<?php


class Coletas_model extends CI_Model {

    public function getColeta($id){
        $query = $this->db->get_where('coletas', array('ID' => $id));
        return $query->row();
    }

    public function getColetas(){
        $query = $this->db->get('coletas');

        $resultado = $query->result();        

        return $resultado;
    }

    public function getColetasClube($id){
        $query = $this->db->get_where('clube_rede_mes', array('ID_COLETA' => $id));

        $resultado = $query->result();    
        
        foreach($resultado as $item){
            $coletas[$item->ID_CLUBE][$item->ID_REDE] = $item->VALOR;
            $coletas[$item->ID_CLUBE]['ACUMULADO'] += $item->VALOR;

        }       
        

        return $coletas;
    }

    public function getColetasBusca($dados){

        extract($dados);

        if(isset($coleta)){
            $where_coleta = " WHERE CRM.ID_COLETA = $coleta ";
        }else{
            $coleta = $this->get_ultima_coleta();
            $where_coleta = " WHERE CRM.ID_COLETA = $coleta ";
        }

        $where_divisao = (isset($divisao) && $divisao !== "") ? " AND C.DIVISAO = $divisao " : "";
        $where_municipios = (isset($municipio) && $municipio !== "") ? " AND C.MUNICIPIO = $municipio " : "";


        $select = "SELECT CRM.*, C.ID as CLUBE_ID, C.CLUBE, D.ID AS DIVISAO, D.TITULO, M.ID AS MUNICIPIO_ID FROM clube_rede_mes CRM
                      INNER JOIN clubes C ON CRM.ID_CLUBE = C.ID
                      INNER JOIN coletas COL ON CRM.ID_COLETA = COL.ID 
                      INNER JOIN municipios M ON M.ID = C.MUNICIPIO 
                      INNER JOIN divisoes D ON C.DIVISAO = D.ID ".$where_coleta.$where_divisao.$where_municipios;
        $query = $this->db->query($select);

        $resultado = $query->result();  
        
        //echo $this->db->last_query();
        
        // foreach($resultado as $item){
        //     $coletas[$item->ID_CLUBE]['REDES'][$item->ID_REDE] = $item->VALOR;
        //     $coletas[$item->ID_CLUBE]['CLUBE'] = $item->CLUBE;
        //     $coletas[$item->ID_CLUBE]['CLUBE_ID'] = $item->CLUBE_ID;
        //     $coletas[$item->ID_CLUBE]['ACUMULADO'] += $item->VALOR;
        // }  
        
        // foreach($resultado as $item){
        //     $divisoes[$item->DIVISAO]['NOME'] = $item->TITULO;    
        //     $divisoes[$item->DIVISAO]['REDES'][$item->ID_REDE] += $item->VALOR;
        //     $divisoes[$item->DIVISAO]['ACUMULADO'] += $item->VALOR;             
        // }

        $municipio = [];
        foreach($resultado as $item){  
            
            $rede = $item->ID_REDE;
            
            $municipio[$item->MUNICIPIO_ID]->VALOR += $item->VALOR;  
            $municipio[$item->MUNICIPIO_ID]->MUNICIPIO = $this->clubes_model->getMunicipio($item->MUNICIPIO_ID);                     
            $municipio[$item->MUNICIPIO_ID]->REDES->$rede += $item->VALOR;
        }

        // foreach($resultado as $item){             
        //     $redes[$item->ID_REDE] += $item->VALOR;                      
        // }

        

        echo "<pre>";
        print_r($municipio);
        echo "</pre>";
        exit;

        
        
        $dados['coletas'] = $coletas; 
        $dados['divisoes'] = $divisoes;
        $dados['redes'] = $redes;

        return $dados;
    }

    public function get_ultima_coleta(){

        $query = $this->db->query("SELECT MAX(id) AS ID FROM coletas");
        $resultado = $query->row();
        return $resultado->ID;       
        
    }

    public function incluir_coleta($dados){
        
        $data = array(            
            'MES' => $dados['mes'],
            'ANO' => $dados['ano']            
        );

        if($dados['id']){
            $this->db->where('id', $dados['id']);
            return $this->db->update('coletas', $data);
        }else{
            return $this->db->insert('coletas', $data);
        }
    
        
    }

    public function incluir_coleta_clube($dados){       

        foreach($dados as $key => $item){
           
            $redes = explode("rede_", $key);           

            $rede = "rede_".$redes[1];
           
            if(!empty($redes[1])) {
                //echo $rede;

                $redes_sociais[$key]['ID'] = $redes[1];
                $redes_sociais[$key]['VALOR'] = $dados[$rede];
            }
            
        }       

        foreach($redes_sociais as $key => $item){
           
            $data = array(            
                'ID_COLETA' => $dados['coleta'],
                'ID_CLUBE' => $dados['clube'] ,
                'ID_REDE' => $item['ID'],
                'VALOR' => preg_replace("/[^0-9]/", "", $item['VALOR'])          
            );              

            if($this->tem_coleta($data) > 0){
                $this->db->where('ID_COLETA',  $data['ID_COLETA']);
                $this->db->where('ID_CLUBE',  $data['ID_CLUBE']);
                $this->db->where('ID_REDE',  $data['ID_REDE']);               
                $this->db->update('clube_rede_mes', $data);
            }else{
                $this->db->insert('clube_rede_mes', $data);   
            }
                     
        }      
        
        return true;
    }

    public function tem_coleta($data){
        
        $query = $this->db->get_where('clube_rede_mes', 
            array('ID_COLETA' => $data['ID_COLETA'],
                   'ID_CLUBE' => $data['ID_CLUBE'] ,
                    'ID_REDE' => $data['ID_REDE'])
                );
        //echo $this->db->last_query();
        return $query->num_rows();
    }

    public function delete_coleta($id){       
    
        return $this->db->delete('coletas', array('id' => $id));
    }

}


?>