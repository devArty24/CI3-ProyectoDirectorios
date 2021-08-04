<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuc extends CI_Controller
{
	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('menum');
    }

	#MENU
	public function menu()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
		}else{	
			$u=$this->session->userdata('username');
			$ur['use']=$this->menum->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscamenu');
	  	}
	}
	
	public function cargamenu()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
		}else{
        	$u=$this->session->userdata('username');
			$ur['use']=$this->menum->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$criterio=$this->input->post('criterio');
			$data['resultado']=$this->menum->buscamenu($criterio,$ur['use'][0]->nomuser);
			$this->load->view('buscamenu');
			$this->load->view('menuv',$data);
		}
	}

	#ALTA MENU
	public function altamenu()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');
			$ur['use']=$this->menum->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			// Obtine informacion de establecimiento deacuerdo al usuario logeado
			$data['dat']=$this->menum->i($ur['use'][0]->nomuser);
        	$data['directorio'] = $this->menum->get_lugares();
			$this->load->view('view_menu1', $data,$ur);
		}
	}
	
	public function agregar()
	{	
		$clave = $this->input->post('clave');
		$us = $this->input->post('us');
		$platillo = $this->input->post('platillo');
		$precio = $this->input->post('precio');
		$this->form_validation->set_rules('us','Usuario','callback_ver_id');
		$this->form_validation->set_rules('platillo','Platillo','required');
		$this->form_validation->set_rules('precio','Precio','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('alpha','Solo puedes escribir letras');
		$this->form_validation->set_message('ver_id','UPPS!!No puedes registrar un menu si no haz echo el resgistro de tu negocio');
		
		if($this->form_validation->run()==FALSE){
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
			}else{
				$u=$this->session->userdata('username');  
				$ur['use']=$this->menum->imp($u);

				$this->load->view('menu2',$ur);
				$this->load->view('fecha');

				$data['dat']=$this->menum->i($ur['use'][0]->nomuser);
				$data['directorio'] = $this->menum->get_lugares();
				$this->load->view('view_menu1', $data,$ur);
		  	}
		}else{
        	if(!$this->session->userdata('username')){
	      		redirect(base_url().'logg/login');
	     	}else{
				$clave =$this->input->post('clave');
				$us =$this->input->post('us');
				$platillo =$this->input->post('platillo');
				$precio =$this->input->post('precio');
				$tipo =$this->input->post('tipo');
				$idd =$this->input->post('idd');
				$activo=$this->input->post('activo');
				$usuario=$this->input->post('usuario');

				$data['resultado']= $this->menum->agregar_menu($platillo,$clave,$activo,$precio,$tipo,$us);
				$u=$this->session->userdata('username');
				$ur['use']=$this->menum->imp($u);

				$this->load->view('menu2',$ur);
				$this->load->view('fecha');
				$this->load->view('savin_men');
			}
		}
	}

	#para verificar usuario
	function ver_id($user)
	{
		$variable=$this->menum->very_idd($user);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}

	#ELIMINA MENU
	public function eliminamenu()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$this->menum->borrarmenu();

			$u=$this->session->userdata('username');
			$ur['use']=$this->menum->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('eli_men');
		}
	}
		
	#inicio editar
	public function edit_m($idme)
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->menum->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['act'] = $this->menum->acti($idme);
			$data['directorio'] = $this->menum->get_lugares();

			$data['get_editm']=$this->menum->get_editm($idme);
			$this->load->view('men_view_edit',$data);
		}
	}

	public function updates()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
	  	}else{
			$idme=$this->input->post('idme');
			$platillo = $this->input->post('platillo');
        	$activo = $this->input->post('activo');
			$precio = $this->input->post('precio');
			$tipo = $this->input->post('tipo');

			$u=$this->session->userdata('username');
			$ur['use']=$this->menum->imp($u);

			$data['resultado']= $this->menum->updates($idme,$platillo,$activo,$precio,$tipo,$ur['use'][0]->nomuser);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('upinfo_men');
	  	}
	}
#fin editar
}