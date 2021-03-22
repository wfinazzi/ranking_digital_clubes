<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coletas extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$coletas_model = $this->load->model('coletas_model');
        $clubes_model = $this->load->model('clubes_model');		
		
	}

	
	public function index()
	{
        $dados['header'] = $this->load->view("template/header");        
        $dados['coletas'] = $this->coletas_model->getColetas();
        $dados['anos'] = Intervalo_De_Anos_Inicial_E_Final(2015, 2026);
        $dados['meses'] = Meses_Do_Ano();

        $this->load->vars($dados);

        $this->load->view('coletas');
        $dados['modal'] = $this->load->view("modal/modal_coletas");    
        $dados['footer'] = $this->load->view("template/footer");   		
    }

    public function coleta($id)
	{

        $dados['header'] = $this->load->view("template/header");
             
        $dados['clubes'] = $this->clubes_model->getClubes();
        $dados['divisoes'] = $this->clubes_model->getDivisoes();
        $dados['municipios'] = $this->clubes_model->getMunicipios();
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $dados['coleta'] = $this->clubes_model->getColeta($id);
        $dados['coletas_clube'] = $this->coletas_model->getColetasClube($id);
        
        $this->load->vars($dados);

        $dados['modal'] = $this->load->view("modal/modal_clubes");  
        $this->load->view('coleta');
        $this->load->view("template/footer"); 		
    }

    public function incluir()
	{
        $dados = $this->input->post();        
        
        if($this->coletas_model->incluir_coleta($dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Coletas");
    }

    public function incluir_coleta()
	{
        $dados = $this->input->post();        

        //print_r($dados);
        
        if($this->coletas_model->incluir_coleta_clube($dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Coletas/coleta/".$dados['coleta']);
    }

    public function editar($id)
	{          
        $dados['coleta'] = $this->coletas_model->getColeta($id);  
        echo json_encode($dados['coleta']);     
    }

    public function atualizar()
	{
        $dados = $this->input->post();
        
        if($this->coletas_model->update_coleta($dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta editado com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Coletas");
    }

    public function excluir($id)
	{                
        if($this->coletas_model->delete_coleta($id) == true){
            $this->session->set_flashdata('mensagem', 'Coleta excluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao excluir a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/Coletas");
    }
    
   
}
