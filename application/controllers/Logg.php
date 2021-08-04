<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
     	$this->load->helper('url');
     	$this->load->library('form_validation');
		$this->load->library('session');
	 	$this->load->model('usuariosm');
		#$this->load->model('directoriom');
	}

	public function login()
	{
		if($this->session->userdata('username')){
			redirect(base_url().'directorioc/muestradirectorio');
		}else{
			$data=array('mensaje'=>'Necesitas iniciar sesion');
			$this->load->view('login',$data);
		}
	}

	public function logeo()
	{
		$username=$this->security->xss_clean($this->input->post('username'));
		$password=$this->security->xss_clean($this->input->post('password'));
    	$respuesta= $this->usuariosm->login($username,$password);

		if($respuesta == 1){
			$band= $this->usuariosm->very_act($username,$password);
			
			if($band == true){
				$user = strpos($username, '@') === false ? $username : $band->correo;
				$this->session->set_userdata('username', $user);
				redirect(base_url().'Directorioc/Muestradirectorio');
			}else{
				$data=array('mensaje'=>'Aun no activas tu cuenta,para hacer lo ingresa al enlace que se envio a tu correo');
    			$this->load->view('login',$data);
			}
		}else{
			$data = array('mensaje'=> 'Usuario/Email o contraseña invalidos');
			$this->load->view('login', $data);
		}
	}

	public function logout()
	{
		session_destroy();
		#$this->session->sess_destroy();
		redirect(base_url().'bartdirectoryc/login');
	}
}