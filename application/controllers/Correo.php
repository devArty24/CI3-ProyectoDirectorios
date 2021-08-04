<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo extends CI_Controller
{

	function __construct()
    {
	parent::__construct();
     $this->load->helper('form');
     $this->load->helper('url');
     $this->load->library('form_validation');
     $this->load->model('usuariosm');
	 $this->load->library('email');
    }

	public function envia()
	{	
		$correo = $this->input->post('correo');
		$nombre = $this->input->post('nombre');
		$telefo = $this->input->post('telefono');
		$lugar = $this->input->post('cm');
		$mensaje = $this->input->post('mensaje');
		$this->form_validation->set_rules('correo','Correo','required|valid_email');
		$this->form_validation->set_rules('nombre','Nombre','required|alpha');
		$this->form_validation->set_rules('telefono','Telefono','numeric');
		$this->form_validation->set_rules('cm','Ciudad/Municipio','alpha');
		$this->form_validation->set_rules('mensaje','Mensaje','required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('alpha', 'Solo puedes escribir letras');
		$this->form_validation->set_message('valid_email', 'El correo no es valido');
		$this->form_validation->set_message('numeric', 'El campo %s solo acepta numeros');
		if($this->form_validation->run()==FALSE){
        	$this->load->view('contact');
		}else{
			$correo = $this->input->post('correo');
			$nombre = $this->input->post('nombre');
			$telefo = $this->input->post('telefono');
			$lugar = $this->input->post('cm');
			$mensaje = $this->input->post('mensaje');

			$config['protocol'] = 'smtp'; // Default para gmail si tienes servidor de correo coloca tu protocolo
			$config['smtp_host'] = 'ssl://smtp.googlemail.com'; // Default para gmail si tienes servidor de correo coloca tu  servidor de correo
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
			$this->correo->from($correo); // Correo de quien se recibe el mensaje
			$this->correo->to('TUCORREO'); // Correo de quien se recibe el mensaje
			$this->correo->subject('Cambia esto por un asunto');
			$this->correo->message($mensaje);
		
			if($this->correo->send()){
				#print_r($date);
				#echo 'Correo enviado';
				$data=array('mensaje'=>'Su mensaje se envio correctamente.');
				$this->load->view('contact',$data);
				#show_error($this->correo>print_debugger());
			}else{
				#print_r($date);
				show_error($this->correo->print_debugger());
        	}
		}	
	}
}