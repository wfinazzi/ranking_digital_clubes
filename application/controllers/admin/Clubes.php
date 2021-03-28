<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubes extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$clubes_model = $this->load->model('clubes_model');		
        $coletas_model = $this->load->model('coletas_model');	
        $user_data = $this->session->userdata();
        
        $this->dados['user_data'] = $user_data;
        $this->load->vars($this->dados);
		
	}

	
	public function index()
	{

       
        $this->dados['clubes'] = $this->clubes_model->getClubes();
        $this->dados['divisoes'] = $this->clubes_model->getDivisoes();
        $this->dados['municipios'] = $this->clubes_model->getMunicipios();
        $this->dados['escudos'] = $this->clubes_model->getEscudos();
        
        
        $this->load->vars($this->dados);

        $this->load->view("template/header_admin");
        $this->load->view('admin/clubes');
        $this->load->view("modal/modal_clubes");  
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

        redirect("/admin/Clubes");
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

        redirect("/admin/Clubes");
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

        redirect("/admin/Clubes");
    }
    
    public function clube($clube)
	{

        $dados['clube'] = $this->clubes_model->getClube($clube);
        $dados['municipio'] = $this->clubes_model->getMunicipio($dados['clube']->MUNICIPIO); 
        $dados['clubes_municipio'] = $this->clubes_model->getClubesMunicipio($dados['municipio']->ID);
        $dados['clubes_divisao'] = $this->clubes_model->getClubesDivisao($dados['clube']->DIVISAO);
        $dados['clubes_redes'] = $this->clubes_model->getClubesRedes($clube);   
       

        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $dados['coletas'] = $this->coletas_model->getColetasClube($clube);
        $dados['header'] = $this->load->view("template/header_admin");
        $dados['historia'] = $this->clubes_model->getHistoria($clube);   
        $dados['footer'] = $this->load->view("template/footer");      


		$this->load->view('historia',$dados);
	}
}
