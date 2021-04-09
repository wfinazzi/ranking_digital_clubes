<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$usuario_model = $this->load->model('usuario_model');
		$candidato_model = $this->load->model('candidato_model');		
		$login_model = $this->load->model('login_model');
		$perfil_status_model = $this->load->model('perfil_status_model');

        $this->load->library('email');


		if($this->login_model->is_logged_in() == false){
		 	redirect("Login");
		}

        $user_data = $this->session->userdata();

        $this->dados['user_data'] = $user_data;
        
        $this->usuario = $this->session->userdata();

        $this->dados['usuario'] = $this->usuario;


	}

	public function index()
	{
		$this->dados['usuarios'] = $this->usuario_model->get_usuarios();
        $this->dados['status'] = $this->perfil_status_model->get_all_status();
        $this->dados['perfis'] = $this->perfil_status_model->get_perfis();
		$this->dados['candidatos'] = $this->candidato_model->get_candidatos();		
		$this->load->view('template/header_admin',$this->dados);
        $this->load->view('usuario',$this->dados);
        $this->load->view("template/footer"); 

	}

	public function cadastro()
	{
		$this->dados['acao'] = 'inserir';
		$this->dados['consegs'] = $this->conseg_model->get_consegs();
		$this->template->show('cadastro/usuario',$this->dados);
	}

	public function editar($id)
	{
		$this->dados['acao'] = 'editar';
		$this->dados['usuario'] = $this->usuario_model->get_usuario($id);
		$this->dados['consegs'] = $this->conseg_model->get_consegs();

		// echo "<pre>";
		// print_r($this->dados);
		// exit;

		$this->template->show('cadastro/usuario',$this->dados);
	}

	public function usuarioPost($id = null)
	{

		$dados = $this->input->post();
		extract($dados);		

		if($acao == "inserir"){

			$data = [
				'id' => $id,
				'perfil' => $perfil										
			];

			$usuario = $this->usuario_model->insert_usuario($data);

			if($usuario !== false){			
				$this->enviarEmail($usuario);
				$this->session->set_flashdata('mensagem', 'Usuário cadastrado com sucesso !!!');
				redirect("usuarios/index");
			}else{
				$this->session->set_flashdata('mensagem_erro', 'Erro ao cadastrar usuário  !!!');
				redirect("usuarios/index");
			}
		
		}

		if($acao == "editar"){

			$data = [
				'id' => $id,
				'nome' => $nome,
				'email' => $email,
				'cpf' => somenteNumeros($cpf),
				'telefone' => somenteNumeros($telefone),
				'relatorios' => $relatorios,
				'administrador' => $administrador,
				'id_conseg' => $id_conseg						
			];

			if ($this->usuario_model->update_usuario($id,$data) == true) {
				$this->session->set_flashdata('mensagem', 'Usuário editado com sucesso !!!');
			}else{
				$this->session->set_flashdata('mensagem', 'Erro ao editar o usuário.');
			}

			//echo $this->db->last_query();
			//exit;
			
		}
		
		redirect("Usuarios");
		
	}

	public function excluirCandidato()
	{
		$dados = $this->input->post();
		extract($dados);

		if($this->candidato_model->excluirCandidato($id) == true){
			$this->session->set_flashdata('mensagem', 'Candidato excluído com sucesso !!!');
			redirect("usuarios/index");
		}else{
			$this->session->set_flashdata('mensagem', 'Candidato excluído com sucesso !!!');
			redirect("usuarios/index");
		}
	}

	public function inativar($id)
	{
		$this->usuario_model->inativar_usuario($id);
		$this->session->set_flashdata('mensagem', 'Usuario inativado com sucesso !!!');
		redirect("Usuarios/index");
	}

	public function ativar($id)
	{
		$this->usuario_model->ativar_usuario($id);
		$this->session->set_flashdata('mensagem', 'Usuario ativado com sucesso !!!');
		redirect("admin/Usuarios/");
	}


	public function enviarEmail($usuario){

        $this->load->library('email');

		
		$config['protocol']='ssmtp';
        $config['smtp_host']="ssl://smtp.googlemail.com";
        $config['smtp_port']='465';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_timeout']='30';
        $config['smtp_user']='wellingtonfinazzi@gmail.com';
        $config['smtp_pass']='perrym@son';
        $config['validate'] = true;
        $config['charset']='utf-8';
        $config['mailtype'] = "html";
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

		
        
		$this->email->initialize($config);    
		//$this->email->set_newline("\r\n");  		
		$this->email->from("wellingtonfinazzi@gmail.com", 'CONSEG Guarulhos');
		$this->email->subject("Ranking de Clubes - Usuário e Senha");		
		$this->email->to($usuario["email_address"]);		

        if(isset($usuario["login_oauth_uid"]) && $usuario["login_oauth_uid"] !== ""){
            $this->email->message("
            <h1> Ranking de Clubes </h1>
            <h2> Acesso Liberado </h2>
            <p>O seu acesso administrativo ao Ranking Digital de Clubes Paulistas foi concedido.</p><br> 
            <p>Acesse com sua conta do Gmail</p><br>            
            <p>Qualquer dúvida responder este email</p>");

        }else{
            $this->email->message("
            <h1> Ranking de Clubes </h1>
            <h2> Dados de Acesso </h2>
            <p>Segue os dados de acesso para o sistema do Ranking de Clubes</p><br>
            <p><strong>Email: </strong>".$usuario['email_address']."</p><br>
            <p><strong>Senha: </strong>".$usuario['senha']."</p><br>
            <p>Qualquer dúvida responder este email</p>");
        }

		
		$this->email->send();		

		

        // print_r($this->email->print_debugger());
        // exit;

		
	}

	

	
	
}
