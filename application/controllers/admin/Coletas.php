<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coletas extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$coletas_model = $this->load->model('coletas_model');
        $clubes_model = $this->load->model('clubes_model');	
        $user_data = $this->session->userdata();
        
        $this->dados['user_data'] = $user_data;	
        $this->load->vars($this->dados);
		
	}

	
	public function index()
	{
        $this->dados['header'] = $this->load->view("template/header_admin");        
        $this->dados['coletas'] = $this->coletas_model->getColetas();
        $this->dados['anos'] = Intervalo_De_Anos_Inicial_E_Final(2015, 2026);
        $this->dados['meses'] = Meses_Do_Ano();

        $this->load->vars($this->dados);

        $this->load->view('admin/coletas');
        $this->dados['modal'] = $this->load->view("modal/modal_coletas");    
        $this->dados['footer'] = $this->load->view("template/footer");   		
    }

    public function coleta($id,$divisao = null)
	{

        $this->dados['header'] = $this->load->view("template/header_admin");
             
        $this->dados['clubes'] = $this->clubes_model->getClubes($divisao);
        $this->dados['divisoes'] = $this->clubes_model->getDivisoes();
        $this->dados['municipios'] = $this->clubes_model->getMunicipios();
        $this->dados['redes_sociais'] = $this->clubes_model->getRedesSociais();
        $this->dados['coleta'] = $this->clubes_model->getColeta($id);
        $this->dados['coletas_clube'] = $this->coletas_model->getColetasMes($id);
        $this->dados['divisao'] = $divisao;
        
        $this->load->vars($this->dados);

        $this->dados['modal'] = $this->load->view("modal/modal_clubes");  
        $this->load->view('admin/coleta');
        $this->load->view("template/footer"); 		
    }

    public function incluir()
	{
        $this->dados = $this->input->post();        
        
        if($this->coletas_model->incluir_coleta($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Coletas");
    }

    public function incluir_coleta($divisao)
	{
        $this->dados = $this->input->post();        

        //print_r($this->dados);
        
        if($this->coletas_model->incluir_coleta_clube($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta incluída com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao Incluir a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Coletas/coleta/".$this->dados['coleta']."/".$divisao);
    }

    public function editar($id)
	{          
        $this->dados['coleta'] = $this->coletas_model->getColeta($id);  
        echo json_encode($this->dados['coleta']);     
    }

    public function atualizar()
	{
        $this->dados = $this->input->post();
        
        if($this->coletas_model->update_coleta($this->dados) == true){
            $this->session->set_flashdata('mensagem', 'Coleta editado com sucesso !!!');
            $this->session->set_flashdata('alert', 'success');
        }else {
            $this->session->set_flashdata('mensagem', 'Ocorreu um erro ao editar a Coleta. Tente novamente mais tarde !!!');
            $this->session->set_flashdata('alert', 'danger');
        }

        redirect("/admin/Coletas");
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

        redirect("/admin/Coletas");
    }
    
   
}
