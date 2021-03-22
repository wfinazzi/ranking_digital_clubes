<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisoes extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function index()
	{
        $dados['header'] = $this->load->view("template/header");        
        $dados['divisoes'] = $this->clubes_model->getDivisoes();
        $this->load->view('divisoes',$dados);
        $dados['modal'] = $this->load->view("modal/modal_divisoes");    
        $dados['footer'] = $this->load->view("template/footer");   		
    }

    public function incluir()
	{
        $dados = $this->input->post();        
        
        if($this->clubes_model->incluir_divisao($dados) == true){
            $this->session->set_flashdata('mensagem', 'Divisão incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Divisão. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Divisoes");
    }

    public function editar($id)
	{          
        $dados['divisao'] = $this->clubes_model->getDivisao($id);  
        echo json_encode($dados['divisao']);     
    }

    public function atualizar()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->update_divisao($dados) == true){
            $this->session->set_flashdata('mensagem', 'Divisão editado com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar o Divisão. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Divisoes");
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

        redirect("/Divisoes");
    }
    
   
}
