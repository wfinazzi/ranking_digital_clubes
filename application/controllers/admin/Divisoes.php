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

        $login_model = $this->load->model('login_model');		

        if($this->login_model->is_logged_in() == false){
            redirect("Login");
        }
	}

	
	public function index()
	{
             
        $this->dados['divisoes'] = $this->clubes_model->getDivisoes();
        
        
       
        $this->load->view("template/header_admin");
        $this->load->view('admin/divisoes',$this->dados);             
        $this->load->view("modal/modal_divisoes");
        $this->load->view("template/footer");   	
        

        
    }

    public function incluir()
	{
        $this->dados = $this->input->post();        
        
        if($this->clubes_model->incluir_divisao($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Divisão incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Divisão. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Divisoes");
    }

    public function editar($id)
	{          
        $this->dados['divisao'] = $this->clubes_model->getDivisao($id);  
        echo json_encode($this->dados['divisao']);     
    }

    public function atualizar()
	{
        $this->dados = $this->input->post();
        
        if($this->clubes_model->update_divisao($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Divisão editado com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar o Divisão. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Divisoes");
    }

    public function excluir($id)
	{                
        if($this->clubes_model->delete_divisao($id) == true){
            $this->session->set_flashdata('mensagem', 'Divisão excluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao excluir a Divisão. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Divisoes");
    }
    
   
}
