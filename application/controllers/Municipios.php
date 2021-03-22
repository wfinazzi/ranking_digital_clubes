<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function index()
	{

        $dados['header'] = $this->load->view("template/header");
        $dados['modal'] = $this->load->view("modal/modal_municipios");      
        $dados['municipios'] = $this->clubes_model->getMunicipios();
        $this->load->view('municipios',$dados);
        $dados['footer'] = $this->load->view("template/footer"); 
        // print_r($dados['clubes']);
        // exit;


		
    }

    public function incluir()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->incluir_municipio($dados) == true){
            $this->session->set_flashdata('mensagem', 'Município incluído com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir o Município. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }
    }

    public function editar($id)
	{          
        $dados['municipio'] = $this->clubes_model->getMunicipio($id);  
        echo json_encode($dados['municipio']);       
    }

    public function atualizar()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->update_municipio($dados) == true){
            $this->session->set_flashdata('mensagem', 'Município editada com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar o Município. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/");
    }

    public function excluir($id)
	{                
        if($this->clubes_model->delete_municipio($id) == true){
            $this->session->set_flashdata('mensagem', 'Município excluído com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao excluir o Município. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/");
    }
    
   
}
