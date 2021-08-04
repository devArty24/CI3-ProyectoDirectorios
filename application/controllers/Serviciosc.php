<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serviciosc extends CI_Controller
{
	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('serviciosm');
    }

	#SERVICIOS
	public function servicios()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->serviciosm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscaservicios');
		}
	}
	
	public function cargaservicios()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');
			$ur['use']=$this->serviciosm->imp($u);

			$criterio=$this->input->post('criterio');
			$data['resultado']= $this->serviciosm->buscaservicios($criterio,$ur['use'][0]->nomuser);
		  
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscaservicios');
			$this->load->view('serviciosv',$data);
		}
	}
	
	#ALTA SERVICIOS
	public function altaservicios()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->serviciosm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['dat']=$this->serviciosm->i($ur['use'][0]->nomuser);	
			$data['directorio'] = $this->serviciosm->get_lugares();
			$this->load->view('view_altaservicios1', $data,$u);
		}
	}
	
	public function agregarservicio()
	{	
		$us = $this->input->post('us');
		$servicio = $this->input->post('servicio');
		$this->form_validation->set_rules('servicio','Servicio','required');
		$this->form_validation->set_rules('us','Usuario','callback_ver_id');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('ver_id','UPPS!!No puedes registrar un servicio si no haz echo el resgistro de tu negocio');
		$this->form_validation->set_message('alpha','Solo puedes escribir letras');

		if($this->form_validation->run()==FALSE){
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
			}else{
				#echo "ERROR DE CRITERIO";
				$u=$this->session->userdata('username');  
				$ur['use']=$this->serviciosm->imp($u);

				$this->load->view('menu2',$ur);
				$this->load->view('fecha');

				$data['dat']=$this->serviciosm->i($ur['use'][0]->nomuser);
				$data['directorio'] = $this->serviciosm->get_lugares();
				$this->load->view('view_altaservicios1', $data,$ur);
			}
		}else{
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
			}else{
				$clave =$this->input->post('clave');
				$us =$this->input->post('us');
				$servicio =$this->input->post('servicios');
				$activo = $this->input->post('activo');

				$data['resultado']= $this->serviciosm->agregar_servicio($servicio,$clave,$activo,$us);

				$u=$this->session->userdata('username');  
				$ur['use']=$this->serviciosm->imp($u);

				$this->load->view('menu2',$ur);
				$this->load->view('fecha');
				$this->load->view('savin_ser');
			}
		}
	}

	#para verificar usuario
	function ver_id($user)
	{
		$variable=$this->serviciosm->very_idd($user);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}

#ELIMINA SERVICIO
	public function eliminaservicio()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
		}else{
			$this->serviciosm->borrarservicios();

			$u=$this->session->userdata('username');  
			$ur['use']=$this->serviciosm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('eli_ser');
	  	}
	}

	#inicio editar
	public function edit_s($ids)
	{
    	if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{		
			$u=$this->session->userdata('username');  
			$ur['use']=$this->serviciosm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['act']=$this->serviciosm->acti($ids);
			$data['directorio'] = $this->serviciosm->get_lugares();
			$data['getedits']=$this->serviciosm->get_edits($ids);
			$this->load->view('serv_view_edit',$data);
	  	}
	}

	public function updates()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
		}else{
			$ids=$this->input->post('ids');
			$servicio = $this->input->post('servicio');
			$activo = $this->input->post('activo');

			$u=$this->session->userdata('username');  
			$ur['use']=$this->serviciosm->imp($u);

			$data['resultado']= $this->serviciosm->updates($ids,$servicio,$activo,$ur['use'][0]->nomuser);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('upinfo_ser');
		}
	}
	#fin editar
	
}