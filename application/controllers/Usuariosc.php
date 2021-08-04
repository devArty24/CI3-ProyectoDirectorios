<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosc extends CI_Controller
{

	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('usuariosm');
	 $this->load->library('email');
	 $this->load->library('encryption');
    }

#USUARIOS
	public function usuarios()
	{
		$u=$this->session->userdata('username');  
		$ur['use']=$this->usuariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('buscausuarios');
	}
	
	public function cargausuarios()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$criterio=$this->input->post('criterio');
			$data['resultado']= $this->usuariosm->buscausuarios($criterio);

			$u=$this->session->userdata('username');  
			$ur['use']=$this->usuariosm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscausuarios');
			$this->load->view('usuariosv',$data);
		}
	}
	
 #ALTA USUARIOS
	public function altausuarios()
	{
    	if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	   	}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->usuariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			// retrieve the album and add to the data array
       		# $this->load->model('usuariosm');
        	$data['directorio'] = $this->usuariosm->get_lugares();
        	$this->load->view('view_usuarios1', $data);
	   	}
	}

	public function activando($nomuser)
	{
		$data=$this->usuariosm->activacion($nomuser);
		$this->load->view('login');
	}

	public function agregaru()
	{		
		$nombre = $this->input->post('nombre');
		$app = $this->input->post('app');
		$apm = $this->input->post('apm');
		$nomuser = $this->input->post('nomuser');
		$pass = $this->input->post('pass');
		$pass2 = $this->input->post('pass2');
		$correo = $this->input->post('correo');
		$this->form_validation->set_rules('nombre','Nombre','required|regex_match[/^[A-Z,a-z]/]');
		$this->form_validation->set_rules('app','Apellido Paterno','required|regex_match[/^[A-Z,a-z]/]');
		$this->form_validation->set_rules('apm','Apellido Materno','required|regex_match[/^[A-Z,a-z]/]');
		$this->form_validation->set_rules('nomuser','Usuario','required|callback_ver_user');
		$this->form_validation->set_rules('pass','Contraseña','required|min_length[6]');
		$this->form_validation->set_rules('pass2','Confirme contrasena','required|matches[pass]');
		$this->form_validation->set_rules('correo','Correo','required|callback_ver_email|valid_email');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('min_length', 'La %s debe tener minimo 6 caracteres');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinsiden');
		$this->form_validation->set_message('ver_user', 'El %s ya existe');
		$this->form_validation->set_message('ver_email', 'Este correo ya ha sido utilizado');
		#$this->form_validation->set_message('alpha', 'Solo puedes escribir letras');
		$this->form_validation->set_message('regex_match', 'Solo puedes escribir letras de la A-Z');
		$this->form_validation->set_message('valid_email', 'El correo no es valido');
		if($this->form_validation->run()==FALSE){
			$this->load->view('register');
		}else{
			$nombre =$this->input->post('nombre');
			$app =$this->input->post('app');
			$apm =$this->input->post('apm');
			$nomuser =$this->input->post('nomuser');
			$pass =$this->input->post('pass');
			$correo =$this->input->post('correo');
			$bandlink=('0');
			$activo =('no');
			#$this->load->model('usuariosm');
			$data['resultado']= $this->usuariosm->agregar_usuarios($nombre,$app,$apm,$nomuser,$pass,$correo,$bandlink,$activo);
		}
	}

	#para verificar usuario
	function ver_user($nomuser)
	{
		$variable=$this->usuariosm->very_user($nomuser);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}
	#fin del verificar

	#para verificar correo
	function ver_email($correo)
	{
		$variable=$this->usuariosm->very_email($correo);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}
	#fin del verificar
	
	#ELIMINA USUARIOS
	public function eliminausuario()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$this->load->model('usuariosm');
			$this->usuariosm->borrarusuario();
			$u=$this->session->userdata('username');  
			$ur['use']=$this->usuariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('eli_usu');
	  	}
	}

	#editar usuario	
	public function edit($idu)
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->usuariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$data['act']=$this->usuariosm->acti($idu);
			$data['get_edit']=$this->usuariosm->get_edit($idu);
			$this->load->view('user_view_edit',$data);
		}
	}

	public function update()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$idu=$this->input->post('idu');
			$nombre = $this->input->post('nombre');
			$app = $this->input->post('app');
			$apm= $this->input->post('apm');
			$nomuser = $this->input->post('nomuser');
			$pass = $this->input->post('pass');
			$correo = $this->input->post('correo');
			$activo = $this->input->post('activo');
		
			$data['resultado']= $this->usuariosm->update($idu,$nombre,$app,$apm,$nomuser,$pass,$correo,$activo);
			$u=$this->session->userdata('username');  
			$ur['use']=$this->usuariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('upinfo_usu');
		}
	}

	public function confirmar($code)
	{
 		$res=$this->usuariosm->very($code);
		if($res==false){
   			$data=array('mensaje'=>'El enlace de tu correo solo se puede utilizar una vez');
  			$this->load->view('login',$data);
 		}else{
			$this->usuariosm->activacion($code);
			$data=array('mensaje'=>'Tu registro se ha completado, ahora puedes entra al sistema');
			$this->load->view('login',$data);
			$this->usuariosm->upcod($code);
 		}
	}
}