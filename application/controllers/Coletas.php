<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coletas extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$coletas_model = $this->load->model('coletas_model');
        $clubes_model = $this->load->model('clubes_model');	
        $user_data = $this->session->userdata();
        
        $this->dados['user_data'] = $user_data;	
        $this->load->vars($this->dados);
		
	}

	
	public function index()
	{
        $this->dados['header'] = $this->load->view("template/header");        
        $this->dados['coletas'] = $this->coletas_model->getColetas();
        $this->dados['anos'] = Intervalo_De_Anos_Inicial_E_Final(2015, 2026);
        $this->dados['meses'] = Meses_Do_Ano();

        $this->load->vars($this->dados);

        $this->load->view('coletas');            
        $this->dados['footer'] = $this->load->view("template/footer");   		
    }

    public function coleta($id)
	{

        $this->dados['header'] = $this->load->view("template/header_admin");
             
        $this->dados['clubes'] = $this->clubes_model->getClubes();
        $this->dados['divisoes'] = $this->clubes_model->getDivisoes();
        $this->dados['municipios'] = $this->clubes_model->getMunicipios();
        $this->dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $this->dados['coleta'] = $this->clubes_model->getColeta($id);
        $this->dados['coletas_clube'] = $this->coletas_model->getColetasMes($id);
        
        $this->load->vars($this->dados);

        $this->dados['modal'] = $this->load->view("modal/modal_clubes");  
        $this->load->view('coleta');
        $this->load->view("template/footer"); 		
    }

    
   
}
