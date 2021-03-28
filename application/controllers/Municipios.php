<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		

        $user_data = $this->session->userdata();
        
        $this->dados['user_data'] = $user_data;
        $this->load->vars($this->dados);
		
	}

	
	public function index()
	{

        $this->dados['municipios'] = $this->clubes_model->getMunicipios();

        $this->load->vars($this->dados);        

        $this->load->view("template/header");
        $this->load->view('municipios');        
        $this->load->view("template/footer"); 
    
    }

    
    
   
}
