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

    public function getColetasMes($id){
        $query = $this->db->get_where('clube_rede_mes', array('ID_COLETA' => $id));

        $resultado = $query->result();   
        
        //print_r($resultado);
        //exit;
        $acumulado = 0;
        foreach($resultado as $item){

            $acumulado += $item->VALOR;
            $coletas[$item->ID_CLUBE][$item->ID_REDE] = $item->VALOR;
            $coletas[$item->ID_CLUBE]['ACUMULADO'] = $acumulado;
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


        $select = "SELECT CRM.*, C.ID as CLUBE_ID, C.CLUBE, C.IMAGEM, D.ID AS DIVISAO, D.TITULO, M.ID AS MUNICIPIO_ID FROM clube_rede_mes CRM
                      INNER JOIN clubes C ON CRM.ID_CLUBE = C.ID
                      INNER JOIN coletas COL ON CRM.ID_COLETA = COL.ID 
                      INNER JOIN municipios M ON M.ID = C.MUNICIPIO 
                      INNER JOIN divisoes D ON C.DIVISAO = D.ID ".$where_coleta.$where_divisao.$where_municipios;
        $query = $this->db->query($select);

        $resultado = $query->result();  
        
        //echo $this->db->last_query();
        foreach($resultado as $key => $item){
            $total += $item->VALOR;
        }
        
        //$total = [];
        foreach($resultado as $key => $item){                   
            $coletas[$item->ID_CLUBE]['REDES'][$item->ID_REDE] = $item->VALOR;
            $coletas[$item->ID_CLUBE]['IMAGEM'] = $item->IMAGEM;
            $coletas[$item->ID_CLUBE]['CLUBE'] = $item->CLUBE;            
            $coletas[$item->ID_CLUBE]['CLUBE_ID'] = $item->CLUBE_ID;
            $coletas[$item->ID_CLUBE]['ACUMULADO'] += $item->VALOR;
            $coletas[$item->ID_CLUBE]['PORCENTAGEM'] = ($coletas[$item->ID_CLUBE]['ACUMULADO'] / $total) * 100;
        }          
        
        foreach($resultado as $item){
            $divisoes[$item->DIVISAO]['NOME'] = $item->TITULO;    
            $divisoes[$item->DIVISAO]['REDES'][$item->ID_REDE] += $item->VALOR;
            $divisoes[$item->DIVISAO]['ACUMULADO'] += $item->VALOR;             
        }

        foreach($resultado as $item){             
            $redes_sociais[$item->ID_REDE]->VALOR += $item->VALOR;  
            $redes_sociais[$item->ID_REDE]->NOME = $this->clubes_model->getRedeSocial($item->ID_REDE)->NOME;
            $redes_sociais['TOTAL'] += $item->VALOR;  
        }

        foreach($redes_sociais as $key => $item){     
            $redes_sociais[$key]->PORCENTAGEM = ($redes_sociais[$key]->VALOR / $total) * 100;
        }

        

        /*
        $redes = $this->clubes_model->getRedesSociais();
        $redes = count($redes);
        
        foreach($resultado as $item){              
            $rede = $item->ID_REDE;            
            $municipio[$item->MUNICIPIO_ID]->MUNICIPIO = $this->clubes_model->getMunicipio($item->MUNICIPIO_ID);                     
            $municipio[$item->MUNICIPIO_ID]->REDES->$rede += $item->VALOR;
            $municipio[$item->MUNICIPIO_ID]->ACUMULADO += $item->VALOR;
        }
        */

        // foreach($resultado as $item){ 
        //     $municipio[$item->MUNICIPIO_ID]->MILHAR = $municipio[$item->MUNICIPIO_ID]->MUNICIPIO->POPULACAO / 1000;                     
        //     $municipio[$item->MUNICIPIO_ID]->MEDIA = $municipio[$item->MUNICIPIO_ID]->ACUMULADO / $redes;
        //     $municipio[$item->MUNICIPIO_ID]->CURTIDA_HABITANTE = $municipio[$item->MUNICIPIO_ID]->MEDIA / $municipio[$item->MUNICIPIO_ID]->MILHAR; 
        // }

        // echo "<pre>";
        // print_r($municipio);
        // echo "</pre>";

        
        

        
        
        
        

        $dados['coletas'] = $coletas; 
        $dados['divisoes'] = $divisoes;
        $dados['redes'] = $redes_sociais;
        
        
        //$dados['municipios'] = $municipio;
       
        
        /*        
         
        
        */
        
        

        return $dados;
    }

    public function getColetasClube($clube){

        //extract($dados);

        if(isset($clube)){
            $where_clube = " WHERE CRM.ID_CLUBE = $clube ";
        }

        $select = "SELECT CRM.* FROM clube_rede_mes CRM ".$where_clube;

        $query = $this->db->query($select);

        $resultado = $query->result(); 

        $acumulado = 0;
        
        
        foreach($resultado as $item){

            // print_r($item);
            // exit;
            
            $mes_coleta = Nome_do_Mes($this->clubes_model->getColeta($item->ID_COLETA)->MES);
            $ano_coleta = $this->clubes_model->getColeta($item->ID_COLETA)->ANO;
            
            $coletas[$item->ID_COLETA]['ID'] = $item->ID_COLETA;
            $coletas[$item->ID_COLETA]['MES'] = $mes_coleta." de ".$ano_coleta;
            
            $rede = $item->ID_REDE;
            
            $acumulado += $item->VALOR;
            $coletas[$item->ID_COLETA]['ACUMULADO'] = $acumulado;
            $coletas[$item->ID_COLETA]['REDES'][$rede]['NOME'] = $this->clubes_model->getRedeSocial($item->ID_REDE)->NOME;
            $coletas[$item->ID_COLETA]['REDES'][$rede]['VALOR'] = $item->VALOR;
            
            
        }

        foreach($resultado as $item){
            $rede = $item->ID_REDE;
            $porcentagem = ($item->VALOR / $acumulado) * 100;
            $coletas[$item->ID_COLETA]['REDES'][$rede]['PORCENTAGEM']= number_format($porcentagem, 2, '.', ' ');
        }

        return $coletas;

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