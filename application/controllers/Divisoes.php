<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisoes extends CI_Controller {

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
             
        $this->dados['divisoes'] = $this->clubes_model->getDivisoes();       
       
        $this->load->view("template/header");
        $this->load->view('divisoes',$this->dados);      
        $this->load->view("template/footer");   	        
    }

    
    
   
}
