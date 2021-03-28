<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedesSociais extends CI_Controller {

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
           
        $this->dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        
        $this->load->vars($this->dados);
        
        $this->load->view("template/header");
        $this->load->view('redes_sociais');
        $this->load->view("modal/modal_redes_sociais"); 
        $this->load->view("template/footer");         
		
    }

    
   
}
