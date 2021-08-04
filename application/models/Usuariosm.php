<?php
class Usuariosm extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
	  $this->load->library('email');
    }
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
	#USUARIOS
	public function buscausuarios($criterio)
	{
		$consulta = $this->db->query("SELECT * FROM usuarios where nombre like '%$criterio%' OR nomuser like '%$criterio%' OR correo like '%$criterio%'");
		return $consulta->result();
	}
	#ALTA USUARIOS
	function get_lugares() {
        $data = array();
        $query = $this->db->get('directorio');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

	public function agregar_usuarios($nombre,$apm,$app,$nomuser,$pass,$correo,$bandlink,$activo)
	{
		$code=rand(100,99999);
		$consulta = $this->db->query("call altausuarios('$nombre','$app','$apm','$nomuser','$pass','$correo',$code,$bandlink,'$activo',@resultado)") or die(mysql_error);

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
		$config['mailtype'] = 'html'; // txt or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$this->load->library('email','','correo');
		$this->correo->initialize($config);
		$this->correo->set_newline("\r\n");
		$this->correo->from('bartdirectory@gmail.com', 'BARTDIRECTORY'); // Correo y el nombre del sitio web
		$this->correo->to($correo); // Correo a quien se le enviara 
		$this->correo->subject('Por favor, verifique su direccion de correo electronico');
		$this->correo->message('<table align="center">
									<tr>Haz click en la imagen para activar tu cuenta</tr>
									<tr></tr>
									<tr>
										<a href="localhost/proyecto_v6.0/Usuariosc/confirmar/'.$code.'">
											<img src="http://TUDOMINIOoRUTALOCAL/images2/logo.png"alt="PLATAFORMA"width="280"/>
										</a>
									</tr>
									<tr></tr>
									<tr>O usa el enlace que aparece abajo</tr>
									<tr>http://localhost/TUDOMINIOoRUTALOCAL/Usuariosc/confirmar/'.$code.' </tr>');

		if($this->correo->send()){
			#print_r($date);
			#echo 'Correo enviado';
			$data=array('mensaje'=>' Tu registro se esta procesando, Activa tu cuenta desde tu correo');
			$this->load->view('register',$data);
			#show_error($this->correo>print_debugger());
		}else{
			#print_r($date);
			show_error($this->correo->print_debugger());
        }
	}

	#Eliminación USUARIOS
	public function borrarusuario()
	{
		$idu= $_GET['idu'];
		$consulta=$this->db->query("call eliminausuarios($idu,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}
		#editar usuario	
	    #para el activo
			public function acti($idu)
			{
				$consulta = $this->db->query("SELECT idu,activo FROM usuarios where idu=$idu");
				return $consulta->result();	
			}
		#fin de activo
	public function get_edit($idu)
	{
	$query=$this->db->get_where('usuarios',array('idu'=>$idu));
	return $query->row();
	}
#modificar
	public function update($idu,$nombre,$app,$apm,$nomuser,$pass,$correo,$activo)
	{
		#$idu=$this->input->post('idu');
		$consulta=$this->db->query("select ed_use($idu,'$nombre','$app','$apm','$nomuser','$pass','$correo','$activo')")or die (mysql_error());
	}

	#activacion de bandlink
	public function activacion($code)
	{
		$bandlink=1;
		$activo='si';
		$consulta=$this->db->query("Update usuarios Set bandlink=$bandlink,activo='$activo' Where user=$code")or die (mysql_error());
	}

	public function upcod($code)
	{
		$code2=rand(100,99999);
		$consulta=$this->db->query("Update usuarios Set user=$code2 Where user=$code")or die (mysql_error());
	}
	#fin de activacion del bandlink

	#para verificar que usuario y contraseña existan
	public function login($username,$password)
	{
		#echo "SELECT * FROM usuarios WHERE user ='$usuario'  and password = '$password'";
		//Validar si es correo o es el nombre del usuario
		$usrOrEml = strpos($username, '@');
		if($usrOrEml === false){
			$condition = "nomuser = ? ";
		}else{
			$correo = $username;
			$condition = "correo = ? ";
		}

		$consulta = "SELECT * FROM usuarios WHERE $condition AND pass= ?";
		$query = $this->db->query($consulta,array($username,$password));
		$x =  $query->num_rows();
		if($x==0){
			return 0;
		}else{
			return 1;
		}
	}
	#fin de verificar que ese usuario exista

	#para verificar el estado de activo
	public function very_act($username,$password)
	{
		//Validar si es correo o es el nombre del usuario
		$usrOrEml = strpos($username, '@');
		if($usrOrEml === false){
			$condition = "nomuser = '".$username."' ";
		}else{
			$correo = $username;
			$condition = "correo = '".$correo."' ";
		}

		#echo "SELECT * FROM usuarios WHERE user ='$usuario'  and password = '$password'";
	    $consulta = $this->db->query("SELECT * FROM usuarios WHERE $condition and pass='$password' and bandlink=1 and activo='si'");
		if($consulta->num_rows()==1){
			return $consulta->row();
		}else{
			return NULL;
		}
	}
	#fin de verificar el estado

#vierificar bandlink
    public function ver($username,$password)
	{
	 $consulta = $this->db->query("SELECT bandlink FROM usuarios WHERE nomuser='$username' and pass='$password'");
     return $consulta->result();
	}
#fin verificar bandlink

	#verificar usuario
	public function very_user($nomuser)
	{
		$consulta=$this->db->get_where('usuarios',array('nomuser'=>$nomuser));
		if($consulta->num_rows()== 1){
			return 1;
		}else{
			return 0;
	 	}
	}
	#fin verificar usuario

	#verificar correo
	public function very_email($correo)
	{
		$consulta=$this->db->get_where('usuarios',array('correo'=>$correo));
		if($consulta->num_rows()== 1){
			return true;
		}else{
			return false;
		}
	}
	#fin verificar correo

  	public function very($code)
  	{
		$consulta=$this->db->get_where('usuarios',array('user'=>$code));
   		if($consulta->num_rows()==1){
			return true;
		}else{
			return false;
		}
	}

  public function imp($u)
  {
  $consulta = $this->db->query("SELECT * FROM usuarios WHERE nomuser='$u'");
  return $consulta->result();
   #el return sirve para devolver el resutado
  }
  public function recupera($pass,$cor)
  {
	$consulta=$this->db->query("Update usuarios Set pass='$pass' Where correo='$cor'")or die (mysql_error());
  }
}
