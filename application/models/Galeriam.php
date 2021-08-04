<?php
class Galeriam extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}

	#GALERIA
	public function buscagaleria($criterio,$u)
	{
		$consulta=$this->db->query("SELECT id_img,imgs.nombre,imgs.ruta,imgs.descripcion 
		                            FROM imgs
									WHERE imgs.usuario like '$u'
									AND (imgs.descripcion LIKE '%$criterio%' OR imgs.nombre LIKE '%$criterio%') order by id_img asc");
		return $consulta->result();
	}

	#ALTA IMAGENES
	function get_lugares(){
        $data = array();
        $query = $this->db->get('directorios');
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                    $data[] = $row;
            }
        }
        $query->free_result();
        return $data;
    }
	
	public function imgin($dimg,$ruta,$descripcion,$clave,$us){
		$this->db->query('INSERT INTO imgs(nombre,ruta,descripcion,idd,usuario)VALUE("' . $dimg . '","' . $ruta . '","'.$descripcion.'",'.$clave.',"'.$us.'")');
	}
		

#Eliminación IMAGEN
	public function borrarimagen()
	{
		$id_img= $_GET['id_img'];
		$consulta=$this->db->query("call eliminaimagen($id_img,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}


	#editar img
	#para el activo
	public function im($id_img)
	{
		$consulta = $this->db->query("SELECT id_img,nombre FROM imgs where id_img=$id_img");
		return $consulta->result();	
	}
	#fin de activo

	public function get_editg($id_img)
	{
		$query=$this->db->get_where('imgs',array('id_img'=>$id_img));
		return $query->row();
	}

	public function updates($id_img,$descripcion,$user)
	{
		$consulta=$this->db->query("select ed_gal($id_img,'$descripcion','$user')")or die (mysql_error());
		return $consulta->result();
	}

	public function imp($userSession)
	{
		//Validar si es correo o es el nombre del usuario
		$usrOrEml = strpos($userSession, '@');
		if($usrOrEml === false){
			$condition = "nomuser = '".$userSession."' ";
		}else{
			$correo = $userSession;
			$condition = "correo = '".$userSession."' ";
		}

		$consulta = $this->db->query("SELECT * FROM usuarios WHERE $condition ");
		return $consulta->result();
		#el return sirve para devolver el resutado
	}

	public function i($u)
	{
		#$consulta = $this->db->query("SELECT * FROM directorio INNER JOIN usuarios ON directorio.usuario=usuarios.nomuser");
		$consulta = $this->db->query("SELECT * FROM directorios where usuario='$u'");
	    #FROM pedidos INNER JOIN clientes ON pedidos.clie = clientes.numclie
		return $consulta->result();
		#el return sirve para devolver el resutado
	}

	public function very_idd($user)
	{
		$consulta=$this->db->get_where('directorios',array('usuario'=>$user));
		if($consulta->num_rows()== 0){
			return true;
		}else{
	   		return false;
	 	}
	}

	#Obtener el negocio al que le corresponde la imagen
	function getNegocio($userSession){
        $query = $this->db->get_where('directorios',array('usuario'=>$userSession));
        return $query->row();
    }

}