<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocionesc extends CI_Controller
{
	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('promocionesm');
    }

	#PROMOCIONES
	public function promociones()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username');
			$ur['use']=$this->promocionesm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscapromos');
	  	}
	}
	
	public function cargapromos()
	{
		//Info maneja con peticion ajax

		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username'); 
			$ur['use']=$this->promocionesm->imp($u);

			$criterio=$this->security->xss_clean($_REQUEST['criterio']);
			$rows=$this->promocionesm->buscapromos($criterio,$ur['use'][0]->nomuser);

			if(!empty($rows)){
				$data['resultado'] = $rows;
				$this->load->view('promosv',$data);
			}else{
				echo '<br><div class="col-sm-12 text-center"> 
			    			<div class="alert alert-warning text-center col-sm-12">
								¡No se encontraron Resultados! :( 
							</div>
			      		</div>';
			}
	  	}
	}
	
	
  	#ALTA PROMOS
  	public function altapromos()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->promocionesm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['dat']=$this->promocionesm->i($ur['use'][0]->nomuser);
        	$data['directorio'] = $this->promocionesm->get_lugares();
        	$this->load->view('view_altapromos1', $data,$ur);
		}
	}
	
	public function agregarpromo()
	{
		$descripcion = $this->input->post('descripcion');
		$vigencia = $this->input->post('vigencia');
		$us = $this->input->post('us');
		$this->form_validation->set_rules('descripcion','Descripcion','required');
		$this->form_validation->set_rules('us','Usuario','callback_ver_id');
		$this->form_validation->set_rules('vigencia','Vigencia','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('ver_id','UPPS!!No puedes registrar un promociones si no haz echo el resgistro de tu negocio');

		if($this->form_validation->run()==FALSE){
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
		  	}else{
				#echo "ERROR DE CRITERIO";
				$u=$this->session->userdata('username');  
				$ur['use']=$this->promocionesm->imp($u);

				$this->load->view('menu2',$ur);
				$this->load->view('fecha');

				$data['dat']=$this->promocionesm->i($ur['use'][0]->nomuser);
				$data['directorio'] = $this->promocionesm->get_lugares();
				$this->load->view('view_altapromos1', $data);
		  	}
		}else{
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
			}else{
				$clave=$this->input->post('clave');
				$us=$this->input->post('us');
				$descripcion=$this->input->post('descripcion');
				$vigencia =$this->input->post('vigencia');
				$activo =$this->input->post('activo');

				#$this->load->model('promocionesm');
				$u=$this->session->userdata('username');  
				$ur['use']=$this->promocionesm->imp($u);

				$data['resultado']= $this->promocionesm->agregar_promo($descripcion,$vigencia,$clave,$activo,$us);
				$this->load->view('menu2',$ur);
				$this->load->view('fecha');
				$this->load->view('savin_pro');
		  	}
		}	
	}

	#para verificar usuario
	function ver_id($user)
	{
		$variable=$this->promocionesm->very_idd($user);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}

	#ELIMINA PROMOS
	public function eliminapromo()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$this->load->model('promocionesm');
			$this->promocionesm->borrarpromocion();

			$u=$this->session->userdata('username');  
			$ur['use']=$this->promocionesm->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('eli_pro');
	  	}
	}

	#inicio editar
	public function edit_p($idp)
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->promocionesm->imp($u);
		
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['act']=$this->promocionesm->acti($idp);
			$data['directorio'] = $this->promocionesm->get_lugares();
			$data['get_editp']=$this->promocionesm->get_editp($idp);
			$this->load->view('pro_view_edit',$data);
		}
	}

	public function updates()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
	  	}else{
			$idp=$this->input->post('idp');
			$descripcion=$this->input->post('descripcion');
			$descuento=$this->input->post('descuento');
			$vigencia =$this->input->post('vigencia');
			$activo =$this->input->post('activo');

			$u=$this->session->userdata('username');  
			$ur['use']=$this->promocionesm->imp($u);

			$data['resultado']= $this->promocionesm->updates($idp,$descripcion,$descuento,$vigencia,$activo,$ur['use'][0]->nomuser);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('upinfo_pro');
	  	}
	}
	#fin editar
}