<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bartdirectoryc extends CI_Controller
{	
    function __construct(){
		parent::__construct();
     	$this->load->helper('form');
     	$this->load->helper('url');
     	$this->load->library('form_validation');
	 	$this->load->library('email');
	 	$this->load->library('encryption');
    }
	
	public function index()
	{
		/* $this->load->view('menu'); */
		$this->load->view('index');
	}
	
	public function lugares()
	{
		#$this->load->view('menu');
		$this->load->view('resturants');
	}

	public function informacion()
	{
		#$this->load->view('menu');
		$idd=$this->input->post('idd');

		$this->load->model('bartdirectorym');
		$data['resultadom']= $this->bartdirectorym->buscalugar1($idd);
		$data['resultados']= $this->bartdirectorym->buscalugar2($idd);
		$data['resultado']= $this->bartdirectorym->buscalugar3($idd);
		$data['resultadop']= $this->bartdirectorym->buscalugar4($idd);

		$this->load->view('orders',$data);
	}

	public function login()
	{
		#$this->load->view('menu');
		$this->load->view('login');
	}
	
	public function contacto()
	{
		#$this->load->view('menu');
		$this->load->view('contact');
		$this->load->helper('url');
	}
	
	public function registro()
	{
		#$this->load->view('menu');
		$this->load->view('register');
	}
	
	public function cargainformacion()
	{
		$lugar=$this->input->post('lugar');
		$categoria=$this->input->post('categoria');

		$this->load->model('bartdirectorym');

		$data['resultado']= $this->bartdirectorym->buscalugar($lugar,$categoria);
		$this->load->view('resturants',$data);
	}
	
	public function recup()
	{
	   $this->load->view('rec');
	}
	
	public function recupe()
	{
		$cor = $this->input->post('cor');
		$this->form_validation->set_rules('cor','Correo','required|callback_ver_email|valid_email');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('ver_email', 'Este correo no existe');
		$this->form_validation->set_message('valid_email', 'El correo no es valido');
		if($this->form_validation->run()==FALSE){
        	$this->load->view('rec');	
		}else{
			$cor= $this->input->post('cor');
			
			#####################
				//Configura los datos de acuerdo a tu servidor de correo o en caso de que uses gmail solo llena user y pass de tu correo
			#####################
			$config['protocol'] = 'smtp'; // Default para gmail si tienes servidor de correo coloca tu protocolo
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; // Default para gmail si tienes servidor de correo coloca tu  servidor de correo
			$config['smtp_port'] = 465; // Para gmail puedes ocupar 465 o 587 para POP o coloca tu puerto en caso de que tengas servidor de correo propio
			$config['smtp_user'] = ''; // Correo  del sitio
			$config['smtp_pass'] = ''; // Contraseña del correo del sitio
			$config['smtp_timeout'] = '7';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$this->load->library('email','','correo');
			$this->correo->initialize($config);
			$this->correo->from('Direccion_de_correo', 'Nombre_de_como_aparece_en_el_correo'); // correo sin espacio
			$this->correo->to($cor); // correo sin espacio
			$this->correo->subject('Recuperacion de contraseña');
			$this->correo->message('<h2>Se ha pedido un cambio de contraseña para continuar da clic al boton</h2>
		                        <a href="http://TUDOMINIOoRUTALOCAL/Bartdirectoryc/recuper">
		                        <input type="button"class="btn btn-primary"value="Recuperar"></a>
								
								<h3>**Si no solicitaste este código, puedes hacer caso omiso de este mensaje de correo electrónico.
								Otra persona puede haber escrito tu dirección de correo electrónico por error.</h3>');
			if($this->correo->send()){
				$data=array('mensaje'=>'Se ha enviado un mensaje a tu correo para cuntinuar con el proceso');
				$this->load->view('rec',$data);
			}else{
				show_error($this->correo->print_debugger());
        	}
		}
	}

	#para verificar correo
	function ver_email($cor)
	{
		$this->load->model('usuariosm');
		$variable=$this->usuariosm->very_email($cor);
		if($variable == true){
			return true;
		}else{
			return false;
		}
	}
	#fin del verificar

    public function recuper()
    {
		$this->load->view('rec2');
    }

    public function recupera()
    {
		$pass= $this->input->post('pass');
		$pass2= $this->input->post('pass2');
		$cor= $this->input->post('cor');
		$this->form_validation->set_rules('pass','Contraseña','required|min_length[6]');
		$this->form_validation->set_rules('pass2','Confirme contraseña','required|matches[pass]');
		$this->form_validation->set_rules('cor','Correo','required|callback_ver_email|valid_email');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('min_length', 'La %s debe tener minimo 6 caracteres');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinsiden');
		$this->form_validation->set_message('ver_email', 'Este correo no existe');
		$this->form_validation->set_message('valid_email', 'El correo no es valido');
		if($this->form_validation->run()==FALSE){
			  $this->load->view('rec2');
		}else{
			$this->load->model('usuariosm');
			$pass= $this->input->post('pass');
		    $cor= $this->input->post('cor');
			$data['resultado']= $this->usuariosm->recupera($pass,$cor);
			$data=array('mensaje'=>'Ahora puedes usar tu nueva contraseña');
			$this->load->view('login',$data);			   
		}	
    }
}
