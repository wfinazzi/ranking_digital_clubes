<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('google_login_model');
        $perfil_status_model = $this->load->model('perfil_status_model');
		
	}

    function login(){
        include_once APPPATH . "libraries/vendor/autoload.php";

        $google_client = new Google_Client();

        $google_client->setClientId('1058110453844-vhqnhjjm1ij6inqr56dtii2959ohcmjs.apps.googleusercontent.com');

        $google_client->setClientSecret('49K9l01B3LiE_QrZ697gUezR');

        $google_client->setRedirectUri('http://localhost/ranking_digital_clubes/google_login/login');

        $google_client->addScope('email');

        $google_client->addScope('profile');

        if(isset($_GET["code"])){
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            

            if(!isset($token['error'])){
                $google_client->setAccessToken($token['access_token']);

                $this->session->userdata('access_token', $token['access_token']);

                $google_service = new Google_Service_Oauth2($google_client);

                $data = $google_service->userinfo->get();

                $current_datetime = date('Y-m-d H:i:s');

                $usuario = $this->google_login_model->is_already_register($data['id']);

                if($usuario){

                    //update data
                    $user_data = array(
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'email_address' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'updated_at' => $current_datetime,
                        'perfil' => $usuario->perfil,
                        'perfil_nome' => $this->perfil_status_model->get_perfil($usuario->perfil)->PERFIL,
                        'logged_in' => true		
                    );

                    

                    $this->google_login_model->update_user_data($user_data, $data['id']);

                    $this->session->set_userdata($user_data);
                    redirect('admin/clubes');

                   
                }else{
                    //insert data
                    $user_data = array(
                        'login_oauth_uid' => $data['id'],                        
                        'NOME' => $data['given_name']."".$data['family_name'],                        
                        'EMAIL' => $data['email'],
                        'STATUS' => 0,        
                        'logged_in' => true		                
                    );

                    $this->google_login_model->insert_user_data($user_data);
                }

                $this->session->set_userdata($user_data);
            }
        }

        if(!$this->session->userdata('access_token')){
            //<img src='".base_url()."asset/sign-in-with-google.png"'/>
            $link = $google_client->createAuthUrl();

            $data['link'] = $link;

            if(isset($data['given_name'])) {
                $this->session->set_flashdata('mensagem', "Olá ".$data['given_name']."".$data['family_name']." , sua solicitação foi enviada com sucesso. Aguarde a liberação de acesso no seu e-mail: ".$email);
			    redirect("login/mensagem");
            }else {
                redirect("login");
            }
            
            
        }       

    }

    function logout(){        
        $this->session->sess_destroy();
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        $this->session->unset_userdata('logged_in');

        redirect("Clubes");
    
    }

}

?>