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
        
        $this->load->view("template/header_admin");
        $this->load->view('redes_sociais');
        $this->load->view("modal/modal_redes_sociais"); 
        $this->load->view("template/footer");  
       
        
		
    }

    public function incluir()
	{
        $this->dados = $this->input->post();

        // print_r($this->dados);
        // exit;
        
        if($this->clubes_model->incluir_rede($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Rede Social incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');           
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Rede Social. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');            
        }

        redirect("/admin/RedesSociais");
    }


    public function editar($id)
	{          
        $this->dados['rede_social'] = $this->clubes_model->getRedeSocial($id);       
        echo json_encode($this->dados['rede_social']); 
    }

    public function atualizar()
	{
        $this->dados = $this->input->post();
        
        if($this->clubes_model->update_rede($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Rede Social editada com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editada a Rede Social. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/RedesSociais");
    }

    public function excluir($id)
	{                
        if($this->clubes_model->delete_rede($id) == true){
            $this->session->set_flashdata('mensagem', 'Rede Social excluida com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao excluir a Rede Social. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/RedesSociais");
    }
    
   
}
