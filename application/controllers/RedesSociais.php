<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedesSociais extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function index()
	{

        $dados['header'] = $this->load->view("template/header");
        $dados['modal'] = $this->load->view("modal/modal_redes_sociais");      
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $this->load->view('redes_sociais',$dados);
        $dados['footer'] = $this->load->view("template/footer"); 
        
		
    }

    public function incluir()
	{
        $dados = $this->input->post();

        // print_r($dados);
        // exit;
        
        if($this->clubes_model->incluir_rede($dados) == true){
            $this->session->set_flashdata('mensagem', 'Rede Social incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');           
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Rede Social. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');            
        }

        redirect("/RedesSociais");
    }


    public function editar($id)
	{          
        $dados['rede_social'] = $this->clubes_model->getRedeSocial($id);       
        echo json_encode($dados['rede_social']); 
    }

    public function atualizar()
	{
        $dados = $this->input->post();
        
        if($this->clubes_model->update_rede($dados) == true){
            $this->session->set_flashdata('mensagem', 'Rede Social editada com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editada a Rede Social. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/RedesSociais");
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

        redirect("/RedesSociais");
    }
    
   
}
