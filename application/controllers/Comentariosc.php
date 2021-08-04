<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentariosc extends CI_Controller
{
		function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('comentariosm');
    }
	
 #COMENTARIOS
	public function comentarios()
	{
	 if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	 else
	  {
		$u=$this->session->userdata('username');  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('buscacomentarios');
	  }
	}
	
	public function cargacomentarios()
	{
	  if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	  else
	  {
		$u=$this->session->userdata('username');
		$criterio=$this->input->post('criterio');
		$data['resultado']=$this->comentariosm->buscacomentarios($criterio,$u);
		  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('buscacomentarios');
		$this->load->view('comentariosv',$data);
	  }
	
	}
	
	 
#ALTA COMENTARIOS
	
  public function altacomentarios()
	{
	  if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	  else
	  {
		$u=$this->session->userdata('username');  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
        $data['directorio'] = $this->comentariosm->get_lugares();
        $this->load->view('view_altacomentarios1', $data);
	  }
	}
	
	public function agregarcomentario()
	{	
		$comentario = $this->input->post('comentario');		
		$this->form_validation->set_rules('comentario','Comentario','required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatio');
		if($this->form_validation->run()==FALSE)
		{
		 if(!$this->session->userdata('username'))
		  {
			redirect(base_url().'logg/login');
		  }
		  else
		  {
			#echo "ERROR DE CRITERIO";
			$u=$this->session->userdata('username');  
			$ur['use']=$this->comentariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$data['directorio'] = $this->comentariosm->get_lugares();
			$this->load->view('view_altacomentarios1', $data);
		  }
		}
		else
		{
		  if(!$this->session->userdata('username'))
		  {
			redirect(base_url().'logg/login');
		  }
		  else
		  {
			$clave=$this->input->post('clave');
			$comentario=$this->input->post('comentario');
			$idd =$this->input->post('idd');
			$activo =$this->input->post('activo');
			#$this->load->model('comentariosm');
			$data['resultado']= $this->comentariosm->agregar_comentario($comentario,$clave,$activo);
			$u=$this->session->userdata('username');  
			$ur['use']=$this->comentariosm->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('savin_com');
		  }
		}
		
	}
	
	#ELIMINA COMENTARIOS
	public function eliminacomentarios()
	{
	  if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	  else
	  {
		$this->load->model('comentariosm');
		$this->comentariosm->borrarcomentarios();
		$u=$this->session->userdata('username');  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('eli_com');
	  }
	}
#inicio editar
	public function edit_co($idco)
	{
      if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	  else
	  {		
		$data['act']=$this->comentariosm->acti($idco);
		$data['directorio'] = $this->comentariosm->get_lugares();
		$data['geteditco']=$this->comentariosm->get_editco($idco);
		$u=$this->session->userdata('username');  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('con_view_edit',$data);
	  }
	}
	public function updates()
	{ 
	  if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	  else
	  {
		$idco=$this->input->post('idco');
		$comentario=$this->input->post('comentario');
		$idd=$this->input->post('idd');
		$activo =$this->input->post('activo');
		$data['resultado']= $this->comentariosm->updates($idco,$comentario,$activo,$idd);
		$u=$this->session->userdata('username');  
		$ur['use']=$this->comentariosm->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('upinfo_com');
	  }
	}
#fin editar
}