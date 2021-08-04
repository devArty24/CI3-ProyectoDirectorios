<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directorioc extends CI_Controller
{
	
	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
	 $this->load->library('session');
     $this->load->library('form_validation');
     $this->load->model('directoriom');
	 $this->load->library('email');
	 $this->load->library('encryption');
    }

	public function muestradirectorios()
	{
		#CARGA LA VISTA DEL ENCABEZADO
		$this->load->view('vistaencabezado');
		#CARGA LOS PRODUCTOS DE LA TABLA DE LA BD 
		$this->load->model('productosm');
		$data['resultado']= $this->productosm->cargaproductos();
		#CARGA LA VISTA PARA MOSTRAR LOS PRODUCTOS
		$this->load->view('productosv',$data);
		#CARGA LA EL PIE DE PAGINA
		$this->load->view('vistapie');
	}
	
	public function Muestradirectorio()
	{
		if(!$this->session->userdata('username')){
			//$i = $this->session->userdata('username');
			redirect (base_url().'logg/login');
			//echo "<script type='text/javascript'> alert($i);</script> ";
		}else{
			$userSession= $this->session->userdata('username');  
			$ur['use']= $this->directoriom->imp($userSession);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('bienvenido');
			$this->load->helper('url');
	  	}
	}

	##########ESTA ACTIVO SOLO PARA ADMINISTRADOR################################
	#DIRECTORIO
	public function directorio()
	{
	 	if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->directoriom->imp($u);
		
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('buscadirectorio');
	  	}
	}
	
	public function cargainformacion()
	{
	if(!$this->session->userdata('username'))
	  {
	    redirect(base_url().'logg/login');
	  }
	else
	  {
		$u=$this->session->userdata('username'); 
		$criterio=$this->input->post('criterio');
		$data['resultado']= $this->directoriom->buscadirectoriocrit($criterio,$u);
		 
		$ur['use']=$this->directoriom->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('buscadirectorio');
		$this->load->view('directoriov',$data);
	  }
	}
#############FIN DE LA PARTE ACTIVA PARA ADMINISTRADOR #############################3
 
	#ALTA DIRECTORIO	
	public function altadirectorio()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
	  	}else{
			// Obtenemos el username de la session
	   		$u= $this->session->userdata('username');
			// Obtenemos informacion del usuario logeado para mandarla a la vista
			$ur['use']= $this->directoriom->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->model('directoriom');

			$data['municipios'] = $this->directoriom->get_municipio();
			$this->load->view('view_altadirectorio1', $data,$ur);
	  	}
	}

	#ALTA CON IMAGEN
	public function uploadimg()
	{
		if(!$this->session->userdata('username')){
			redirect(base_url().'logg/login');
		}else{
			$u=$this->session->userdata('username');  
			$ur['use']=$this->directoriom->imp($u);

			$this->load->view('menu2',$ur);
			$this->load->library('upload');

            $config['upload_path']          = './img/'; //Directorio donde se guardaran las imagenes que se suban
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            //$config['max_size']             = 1000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 1024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

        	if(!$this->upload->do_upload()){
			}else{
				$user = $this->input->post('user');
				$nombre = $this->input->post('nombre');
				$telefono = $this->input->post('telefono');
				$horario = $this->input->post('horario');
				$resena = $this->input->post('resena');
				$calle = $this->input->post('calle');
				$numero = $this->input->post('numero');
				$cp = $this->input->post('cp');
			
				$this->form_validation->set_rules('user','Usuario','callback_ver_user');
				$this->form_validation->set_rules('nombre','Nombre','required');
				$this->form_validation->set_rules('telefono','Telefono','required|numeric|min_length[7]|max_length[10]');
				$this->form_validation->set_rules('horario','Horario','required');
				$this->form_validation->set_rules('resena','Reseña','required');
				$this->form_validation->set_rules('calle','Calle','required');
				$this->form_validation->set_rules('numero','Numero','required');
				$this->form_validation->set_rules('cp','Codigo Postal','required|numeric');
				$this->form_validation->set_message('ver_user', 'Este usuario ya tiene un establecimiento registrado');
				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('numeric','El campo %s solo acepta numeros');
				$this->form_validation->set_message('min_length','Minimo son 7 digitos');
				$this->form_validation->set_message('max_length','Maximo son 10 digitos');
		  	}

			if($this->form_validation->run()==FALSE){
				if(!$this->session->userdata('username')){
					redirect(base_url().'logg/login');
		   		}else{
					$u= $this->session->userdata('username');  
					$ur['use']= $this->directoriom->imp($u);

					$this->load->view('fecha');

					$data['municipios'] = $this->directoriom->get_municipio();
					$this->load->view('view_altadirectorio1', $data);	
           		}
		  	}else{
		  		if(!$this->session->userdata('username')){
					redirect(base_url().'logg/login');
		  		}else{	
					$user = $this->input->post('user');
					$nombre = $this->input->post('nombre');
					$telefono = $this->input->post('telefono');
					$horario = $this->input->post('horario');
					$resena = $this->input->post('resena');
					$redsocial = $this->input->post('redsocial');
					$idm = $this->input->post('idm');
					$calle = $this->input->post('calle');
					$numero = $this->input->post('numero');
					$cp = $this->input->post('cp');
					$activo = $this->input->post('activo');
					$categoria = $this->input->post('categoria'); 
					$nombrei = $this->upload->data('file_name');
					$ruta = $this->upload->data('full_path');

					$this->load->model('directoriom');
					$resultado = $this->directoriom->agregar_directorio($nombre,$telefono,$horario,$resena,$redsocial,$idm,$calle,$numero,$cp,$activo,$categoria,$nombrei,$ruta,$user);

					$u=$this->session->userdata('username');
					$ur['use']=$this->directoriom->imp($u);

					#$this->load->view('menu2',$ur);
					$this->load->view('fecha');
					$this->load->view('savin_dir');
		  		}
			}
		}
	}

	#para verificar usuario
	function ver_user($user)
	{
		$variable=$this->directoriom->very_user($user);
		if($variable == true){
			return false;
		}else{
			return true;
		}
	}
	
	
	public function agregardirectorio()
	{	

		#$this->load->helper('form');
		#$this->load->library('form_validation');
		$nombre = $this->input->post('nombre');
		$telefono = $this->input->post('telefono');
		$horario = $this->input->post('horario');
		$resena = $this->input->post('resena');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$cp = $this->input->post('cp');
		
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('telefono','Telefono','required|numeric|min_length[7]|max_length[10]');
		$this->form_validation->set_rules('horario','Horario','required');
		$this->form_validation->set_rules('resena','Reseña','required');
		$this->form_validation->set_rules('calle','Calle','required');
		$this->form_validation->set_rules('numero','Numero','required');
		$this->form_validation->set_rules('cp','Codigo Postal','required|numeric');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('numeric','El campo %s solo acepta numeros');
		$this->form_validation->set_message('min_length','Minimo son 7 digitos');
		$this->form_validation->set_message('max_length','Maximo son 10 digitos');
		
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
		    $ur['use']=$this->directoriom->imp($u);
		    $this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->model('directoriom');
			$data['municipios'] = $this->directoriom->get_municipio();
			$this->load->view('view_altadirectorio1', $data);
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
			$nombre = $this->input->post('nombre');
			$telefono = $this->input->post('telefono');
			$horario = $this->input->post('horario');
			$resena = $this->input->post('resena');
			$redsocial = $this->input->post('redsocial');
			   $idm = $this->input->post('idm');
			$calle = $this->input->post('calle');
			$numero = $this->input->post('numero');
			$cp = $this->input->post('cp');
			$activo = $this->input->post('activo');
			$categoria = $this->input->post('categoria');
			$this->load->model('directoriom');
			$data['resultado']= $this->directoriom->agregar_directorio($nombre,$telefono,$horario,$resena,$redsocial,$idm,$calle,$numero,$cp,$activo,$categoria);
			$u=$this->session->userdata('username');  
			$ur['use']=$this->directoriom->imp($u);
			$this->load->view('menu2',$ur);
			$this->load->view('fecha');
			$this->load->view('savin_dir');
		  }
		}
		
	}


#ELIMINA DIRECTORIO
	public function eliminadirectorio()
	{
	  if(!$this->session->userdata('username'))
	  {
		redirect(base_url().'logg/login');
	  }
	  else
	  {
		$this->load->model('directoriom');
		$this->directoriom->borrardirectorio();
		$u=$this->session->userdata('username');  
		$ur['use']=$this->directoriom->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('elim_dir');
	  }
	}

#inicio editar
	public function edit_d($idd)
	{
	 if(!$this->session->userdata('username'))
	  {
		redirect(base_url().'logg/login');
	  }
	 else
	 {	 	
		$u=$this->session->userdata('username');  
		$ur['use']=$this->directoriom->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->model('directoriom');
		$data['act']=$this->directoriom->acti($idd);
		$data['municipios'] = $this->directoriom->get_municipio();
		$data['get_editd']=$this->directoriom->get_editd($idd);
		$this->load->view('dir_view_edit',$data);
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
		$this->load->model('directoriom');
		$idd=$this->input->post('idd');
		$nombre = $this->input->post('nombre');
		$telefono = $this->input->post('telefono');
		$horario = $this->input->post('horario');
		$resena= $this->input->post('resena');
		$redsocial = $this->input->post('redsocial');
		#$idm = $this->input->post('idm');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$cp= $this->input->post('cp');
		$activo = $this->input->post('activo');
		$categoria = $this->input->post('categoria');
		$data['resultado']= $this->directoriom->updates($idd,$nombre,$telefono,$horario,$resena,$redsocial,$calle,$numero,$cp,$activo,$categoria);
		$u=$this->session->userdata('username');  
		$ur['use']=$this->directoriom->imp($u);
		$this->load->view('menu2',$ur);
		$this->load->view('fecha');
		$this->load->view('upinfo_dir');
	  }
	}
#fin editar
#correo
     #Inicio formulario del correo
	public function correo()
	{
		$this->load->view('correo');
	}
	#fin del formulario
		public function activando($nomuser)
		{
			$data=$this->directoriom->activacion($nomuser);
			$this->load->view('correo');
			
		#$this->prinbusquedas();	

		}
	public function ing()
	{
		$date=array(
		'nombre'=>$this->input->post('nombre'),
		'app'=>$this->input->post('app'),
		'apm'=>$this->input->post('apm'),
		'nomuser'=>$this->input->post('nomuser'),
		'pass'=>$this->input->post('pass'),
		'correo'=>$this->input->post('correo'),
		'bandlink'=>'0',
		'activo'=>$this->input->post('activo'),
		);
		$correo=$this->input->post('correo');
		$nomuser=$this->input->post('nomuser');
		$bandlink = ('0');
		$this->directoriom->msnin($date);
	    $config['protocol'] = 'smtp'; // Default para gmail si tienes servidor de correo coloca tu protocolo
		$config['smtp_host'] = 'ssl://smtp.googlemail.com'; // Default para gmail si tienes servidor de correo coloca tu  servidor de correo
		$config['smtp_port'] = 465; // Para gmail puedes ocupar 465 o 587 para POP o coloca tu puerto en caso de que tengas servidor de correo propio
		$config['smtp_user'] = ''; // correo sin espacio
		$config['smtp_pass'] = ''; // Contraseña del correo del sitio
		$config['smtp_timeout'] = '7';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$this->load->library('email','','correo');
		$this->correo->initialize($config);
		$this->correo->from('Direccion_de_correo', 'Nombre_de_como_aparece_en_el_correo'); // correo sin espacio
		$this->correo->to($correo); // correo sin espacio
		$this->correo->subject('Ahora puedes activar tu cuenta con el enlace de abajo');
		$this->correo->message('<a href="http://TUDOMINIOoRUTALOCAL/Directorioc/activando/'.$nomuser.'">
		                         <input type="button"class="btn btn-primary"value="Ir"></a>');
		
		if($this->correo->send())
		{
		#print_r($date);
		echo 'Correo enviado';
		#show_error($this->correo>print_debugger());
		}
		else
		{
			#print_r($date);
		show_error($this->correo->print_debugger());
        }
	}
}