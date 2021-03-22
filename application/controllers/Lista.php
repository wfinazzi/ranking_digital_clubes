<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$coletas_model = $this->load->model('coletas_model');
        $clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function coleta()
	{

        $dados['header'] = $this->load->view("template/header");
        
        $data = $this->input->post();

        $dados['parametros'] = $data;

        // print_r($dados['parametros']);

        $dados['divisoes'] = $this->clubes_model->getDivisoes();
        $dados['municipios'] = $this->clubes_model->getMunicipios();
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $coleta = $this->coletas_model->get_ultima_coleta();
        $dados['coleta'] = $this->clubes_model->getColeta($coleta);
        $dados['coletas'] = $this->clubes_model->getColetas();
        $dados['coletas_clube'] = $this->coletas_model->getColetasBusca($data);
        
        $this->load->vars($dados);

        $dados['modal'] = $this->load->view("modal/modal_clubes");  
        $this->load->view('lista');
        $this->load->view("template/footer"); 		
    }

}