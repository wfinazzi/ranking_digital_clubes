<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubes extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function index()
	{

        $dados['header'] = $this->load->view("template/header");
             
        $dados['clubes'] = $this->clubes_model->getClubes();
        $dados['divisoes'] = $this->clubes_model->getDivisoes();
        $dados['municipios'] = $this->clubes_model->getMunicipios();
        $this->load->vars($dados);

        $dados['modal'] = $this->load->view("modal/modal_clubes");  
        $this->load->view('clubes');
        $this->load->view("template/footer"); 
        // print_r($dados['divisoes']);
        // exit;


		
    }

    public function incluir()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->incluir_clube($dados) == true){
            $this->session->set_flashdata('mensagem', 'Clube incluído com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao incluir o clube. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Clubes");
    }

    public function editar($id)
	{          
        $dados['clube'] = $this->clubes_model->getClube($id);   
        echo json_encode($dados['clube']);      
    }

    public function atualizar()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->update_clube($dados) == true){
            $this->session->set_flashdata('mensagem', 'Clube editado com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar o Clube. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Clubes");
    }

    public function excluir($id)
	{                
        if($this->clubes_model->delete_clube($id) == true){
            $this->session->set_flashdata('mensagem', 'Clube excluído com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao excluir o Clube. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Clubes");
    }
    
    public function historia($clube)
	{

        $dados['header'] = $this->load->view("template/header");
        $dados['historia'] = $this->clubes_model->getHistoria($clube);   
        $dados['footer'] = $this->load->view("template/footer");      


		$this->load->view('historia',$dados);
	}
}
