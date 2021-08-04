<?php
class Promocionesm extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
	
	#PROMOS
	public function buscapromos($criterio,$u)
	{
		$consulta = $this->db->query("SELECT idp,descripcion,vigencia,promociones.activo
		                              FROM promociones
									  WHERE promociones.usuario like '$u'
								      AND descripcion like '%$criterio%' order by idp asc");
		return $consulta->result();
	}
		
	#ALTA PROMOS
	function get_lugares() {
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

	public function agregar_promo($descripcion,$vigencia,$clave,$activo,$us)
	{
		$consulta = $this->db->query("call altapromos('$descripcion','$vigencia','$clave','$activo','$us',@resultado)") or die(mysql_error());
		#return $consulta->result();
	}
	
	#Eliminación PROMOS
	public function borrarpromocion()
	{
		$idp= $_GET['idp'];
		$consulta=$this->db->query("call eliminapromo($idp,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}
	
	#modificar
	#para el activo
	public function acti($idp)
	{
		$consulta = $this->db->query("SELECT idp,activo FROM promociones where idp=$idp");
		return $consulta->result();	
	}
	#fin de activo

    public function get_editp($idp)
	{
		$query=$this->db->get_where('promociones',array('idp'=>$idp));
		return $query->row();
	}

	public function updates($idp,$descripcion,$descuento,$vigencia,$activo,$user)
	{
		$consulta=$this->db->query("select ed_pro($idp,'$descripcion','$descuento','$vigencia','$activo','$user')")or die (mysql_error());
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
		#$consulta = $this->db->query("SELECT * FROM directorios INNER JOIN usuarios ON directorio.usuario=usuarios.nomuser");
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
}

