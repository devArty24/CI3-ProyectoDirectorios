<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeriac extends CI_Controller
{
			function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('galeriam');
	 $this->load->library('upload');
    }

	
 	#GALERIA
    public function galeria()
	{
		if(!$this->session->userdata('username')){
	    	redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->galeriam->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscagaleria');
	  	}
	}
	
	public function cargagaleria()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username'); 
			$ur['use']=$this->galeriam->imp($u);

			$criterio=$this->input->post('criterio');
			$data['resultado']=$this->galeriam->buscagaleria($criterio,$ur['use'][0]->nomuser);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscagaleria');
			$this->load->view('galeriav',$data);
		}
	}
	
 	#ALTA IMAGEN
 	public function img()
	{
   		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
	 		#$this->load->helper('form');
			$u=$this->session->userdata('username');  
			$ur['use']=$this->galeriam->imp($u);
		
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');

			$data['dat']=$this->galeriam->i($ur['use'][0]->nomuser);
			$data['directorio'] = $this->galeriam->get_lugares();
			$this->load->view('ejemplo',$data,$ur);
		}
 	}
 
 	public function uploadimg()
 	{
 		$config['upload_path']= './img/';
 		$config['allowed_types']= 'gif|jpg|png|jpeg';
 		//$config['max_size']             = 1000;
 		//$config['max_width']            = 1024;
 		//$config['max_height']           = 1024;
 		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
   		
		if(!$this->upload->do_upload()){
	  		if(!$this->session->userdata('username')){
	    		redirect(base_url().'logg/login');
	  		}else{
				$u=$this->session->userdata('username');  
				$ur['use']=$this->galeriam->imp($u);
		
				$this->load->view('menu2',$ur);
	    		$this->load->view('fecha');

				$data['dat']=$this->galeriam->i($ur['use'][0]->nomuser);
				$data['directorio'] = $this->galeriam->get_lugares();
	    		$this->load->view('ejemplo',$data);
	  		}
     	}else{
			if(!$this->session->userdata('username')){
				redirect(base_url().'logg/login');
		  	}else{
		   		$dimg = $this->upload->data('file_name');
		   		$ruta = $this->upload->data('full_path');
		   		$descripcion=$this->input->post('descripcion');
		   		$clave=$this->input->post('clave');
		   		$us=$this->input->post('us');
				$this->form_validation->set_rules('descripcion','Descripcion','required');
				$this->form_validation->set_rules('us','Usuario','callback_ver_id');
		   		$this->form_validation->set_message('required','Es necesaria una descripcion de la imagen');
		   		$this->form_validation->set_message('ver_id','UPPS!!No puedes registrar una imagen si no haz echo el resgistro de tu negocio');

				if($this->form_validation->run()==FALSE){
					if(!$this->session->userdata('username')){
			    		redirect(base_url().'logg/login');
		       		}else{
						$u=$this->session->userdata('username');
						$ur['use']=$this->galeriam->imp($u);

						$this->load->view('menu2',$ur);
						$this->load->view('fecha');

						$data['dat']=$this->galeriam->i($ur['use'][0]->nomuser);
						$data['directorio'] = $this->galeriam->get_lugares();
						$this->load->view('ejemplo',$data);
			   		}
				}else{
					$u=$this->session->userdata('username');  
					$ur['use']=$this->galeriam->imp($u);

					$this->galeriam->imgin($dimg,$ruta,$descripcion,$clave,$us);

					$data['directorio'] = $this->galeriam->get_lugares();
		   			$this->load->view('menu2',$ur);
		   			$this->load->view('fecha');
		   			$this->load->view('savin_gal',$data);
		   		}
		  	}
      	}
 	}

	#para verificar usuario
	function ver_id($user)
	{
		$variable=$this->galeriam->very_idd($user);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}
			
	#ELIMINA IMAGEN
	public function eliminaimagen()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
	  	}else{
			$u=$this->session->userdata('username');
			$ur['use']=$this->galeriam->imp($u);

			$this->galeriam->borrarimagen();
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('eli_gal');
		}
	}

	#inicio editar
	public function edit_g($id_img)
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->galeriam->imp($u);

			$data['directorio'] = $this->galeriam->getNegocio($ur['use'][0]->nomuser);
			$data['geteditg']=$this->galeriam->get_editg($id_img);
			$data['img']=$this->galeriam->im($id_img);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('gal_view_edit',$data);
	  	}
	}

	public function updates()
	{
    	if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$id_img=$this->input->post('id_img');
			$descripcion = $this->input->post('descripcion');
			$idd = $this->input->post('idd');

			$u=$this->session->userdata('username');  
			$ur['use']=$this->galeriam->imp($u);

			$data['resultado']= $this->galeriam->updates($id_img,$descripcion,$ur['use'][0]->nomuser);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('upinfo_gal');
	  	}
	}
	#fin editar
}