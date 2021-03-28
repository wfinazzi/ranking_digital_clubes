<?php


class Clubes_model extends CI_Model {

    public function getClube($id){
        $query = $this->db->get_where('clubes', array('ID' => $id));
        return $query->row();
    }

    public function getClubes(){
        $query = $this->db->get('clubes');

        $resultado = $query->result();

        foreach($resultado as $item){
            $item->DIVISAO = $this->getDivisao($item->DIVISAO)->TITULO;    
            $item->MUNICIPIO = $this->getMunicipio($item->MUNICIPIO)->MUNICIPIO;           
        }

        return $resultado;
    }

    public function getClubesMunicipio($municipio){
        $query = $this->db->get_where('clubes', array('MUNICIPIO' => $municipio));

        $resultado = $query->result();

        foreach($resultado as $item){
            $item->COLETAS = $this->coletas_model->getColetasClube($item->ID);                           
        }

        return $resultado;
    }

    public function getClubesDivisao($divisao){
        $query = $this->db->get_where('clubes', array('DIVISAO' => $divisao));

        $resultado = $query->result();

        foreach($resultado as $item){
            $item->COLETAS = $this->coletas_model->getColetasClube($item->ID);    
            $item->DIVISAO = $this->clubes_model->getDivisao($divisao);                         
        }

        return $resultado;
    }

    public function incluir_clube($dados){
        
        $data = array(            
            'CLUBE' => $dados['clube'],
            'NOME_COMPLETO' => $dados['nome_completo'],
            'IMAGEM' => $dados['imagem'],
            'DIVISAO' => $dados['divisao'],
            'MUNICIPIO' => $dados['municipio'],
            'LINK_FACEBOOK' => $dados['link_facebook'],
            'LINK_INSTAGRAM' => $dados['link_instagram'],
            'LINK_YOUTUBE' => $dados['link_youtube'],
            'LINK_TWITTER' => $dados['link_twitter']
        );
    
        
        if($dados['id']){
            $this->db->where('id', $dados['id']);
            return $this->db->update('clubes', $data);
            
            
        }else{
            return $this->db->insert('clubes', $data);
        }
    }

    public function getColetasClube($clube){

        extract($dados);

        if(isset($clube)){
            $where_clube = " WHERE CRM.ID_CLUBE = $clube ";
        }

        $select = "SELECT CRM.* FROM clube_rede_mes CRM ".$where_clube;
                      


        return $dados;

    }

    public function getClubesRedes($clube){

        //extract($dados);

        if(isset($clube)){
            $where_clube = " WHERE C.ID = $clube ";
        }

        $select = "SELECT LINK_FACEBOOK, LINK_INSTAGRAM, LINK_YOUTUBE, LINK_TWITTER FROM clubes C ".$where_clube;
                      
        $query = $this->db->query($select);

        $resultado = $query->result_array(); 

        return $resultado;

    }

    public function getEscudos(){
        $path = "img/escudos";
        $diretorio = dir($path);
        $escudos = [];
       
        while($arquivo = $diretorio -> read()){

            array_push($escudos,$arquivo);
            //echo "<option value='".$arquivo."'>".$arquivo."</option>";
        }
        $diretorio -> close();

        return $escudos;
    }

    public function delete_clube($id){       
    
        return $this->db->delete('clubes', array('id' => $id));
    }

    public function getClubeRedeMes($clube, $rede, $coleta){
        $query = $this->db->get_where('clubes', array('ID_CLUBE' => $clube, 'ID_REDE' => $rede, 'ID_COLETA' => $coleta));
        return $query->row();        
    }    

    public function getColeta($id){
        $query = $this->db->get_where('coletas', array('ID' => $id));
        return $query->row();
    }

    public function getColetas(){
        $query = $this->db->get('coletas');
        return $query->result();
    }

    public function getDivisao($divisao){
        $query = $this->db->get_where('divisoes', array('ID' => $divisao));
        return $query->row();
    }

    public function getDivisoes(){
        $query = $this->db->get('divisoes');
        return $query->result();    
    }

    public function incluir_divisao($dados){
        
        $data = array(            
            'TITULO' => $dados['divisao']            
        );

        if($dados['id']){
            $this->db->where('id', $dados['id']);
            return $this->db->update('divisoes', $data);
        }else{
            return $this->db->insert('divisoes', $data);
        }
    
        
    }

    public function delete_divisao($id){       
    
        return $this->db->delete('divisoes', array('id' => $id));
    }

    public function getHistoria($clube){
        $query = $this->db->get_where('historias', array('ID_CLUBE' => $clube));
        return $query->row();
    }

    public function getHistorias(){
        $query = $this->db->get('historias');
        return $query->result();   
    }
   

    public function getMunicipio($municipio){
        $query = $this->db->get_where('municipios', array('ID' => $municipio));
        return $query->row();
    }

    public function getMunicipios(){
        $query = $this->db->get('municipios');
        return $query->result();  
    }

    public function getRedesSociais(){
        $query = $this->db->get('redes_sociais');
        return $query->result();  
    }
    
    public function getRedeSocial($rede_social){
        $query = $this->db->get_where('redes_sociais', array('ID' => $rede_social));
        return $query->row();
    }

    public function incluir_rede($dados){
        
        $data = array(            
            'NOME' => $dados['nome']            
        );
            
        if($dados['id']){
            $this->db->where('id', $dados['id']);
            return $this->db->update('redes_sociais', $data);
        }else{
            return $this->db->insert('redes_sociais', $data);
        }
    }

    public function delete_rede($id){       
    
        return $this->db->delete('redes_sociais', array('id' => $id));
    }

    public function getTemporadas(){
        $query = $this->db->get('temporadas');
        return $query->result();
    }
    
    public function getTemporada($temporada){
        $query = $this->db->get_where('temporadas', array('ID' => $temporada));
        return $query->row();
    }

    public function getTemporadasClubes(){
        $query = $this->db->get_where('temporadas_clubes', array('ID_TEMPORADA' => $temporada));
        return $query->result();
    }

    public function getTemporadaClube($temporada, $clube){
        $query = $this->db->get_where('temporadas_clubes', array('ID_TEMPORADA' => $temporada, 'id_clube' => $clube));
        return $query->row();
    }
    
    public function getUsuarios(){
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function getUsuario($usuario){
        $query = $this->db->get_where('usuarios', array('ID' => $usuario));
        return $query->row();
    }
    
    
    




}


?>

