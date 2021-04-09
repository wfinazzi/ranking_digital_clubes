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

        $login_model = $this->load->model('login_model');		

        if($this->login_model->is_logged_in() == false){
            redirect("Login");
        }
		
	}

	
	public function index()
	{

        $this->dados['municipios'] = $this->clubes_model->getMunicipios();

        $this->load->vars($this->dados);        

        $this->load->view("template/header_admin");
        $this->load->view('admin/municipios');
        $this->load->view("modal/modal_municipios");    
        $this->load->view("template/footer"); 
    
    }

    public function incluir()
	{
        $this->dados = $this->input->post();
        
        if($this->clubes_model->incluir_municipio($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Município incluído com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir o Município. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }
    }

    public function editar($id)
	{          
        $this->dados['municipio'] = $this->clubes_model->getMunicipio($id);  
        echo json_encode($this->dados['municipio']);       
    }

    public function atualizar()
	{
        $this->dados = $this->input->post();
        
        if($this->clubes_model->update_municipio($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Município editada com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar o Município. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Municipios");
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

        redirect("/admin/Municipios");
    }
    
   
}
