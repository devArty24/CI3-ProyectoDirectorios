<?php
class Serviciosm extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
	/*public function buscaservicioscrit($criterio)
	{
		$consulta = $this->db->query("SELECT ids,servicio,nombre FROM servicios,directorio WHERE servicios.idd=directorio.idd AND nombre like '%$criterio%' AND servicio like '%$criterio%'");
		return $consulta->result();
	}*/
	
	#SERVICIOS
	public function buscaservicios($criterio,$u)
	{
		$consulta = $this->db->query("SELECT servicios.ids,servicios.servicio, servicios.activo 
		                              FROM servicios
									  WHERE servicios.usuario like '$u'
									  AND servicio like '%$criterio%' order by ids asc");
		return $consulta->result();
	}

	#ALTA SERVICIOS
	function get_lugares(){
        $data = array();
        $query = $this->db->get('directorios');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

	public function agregar_servicio($servicio,$clave,$activo,$us)
	{
		$consulta = $this->db->query("call altaservicios('$servicio','$clave','$activo','$us',@resultado)") or die(mysql_error());
		#return $consulta->result();
	}
	
	#ELIMINACION SERVICIOS
	public function borrarservicios()
	{
		$ids= $_GET['ids'];
		$consulta=$this->db->query("call eliminaservicios($ids,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}

	#para el activo
	public function acti($ids)
	{
		$consulta = $this->db->query("SELECT ids,activo FROM servicios where ids=$ids");
		return $consulta->result();	
	}
	#fin de activo

	#MODIFICACION 
	public function get_edits($ids)
	{
		$query=$this->db->get_where('servicios',array('ids'=>$ids));
		return $query->row();
	}

	public function updates($ids,$servicio,$activo,$user)
	{
		$consulta=$this->db->query("select ed_ser($ids,'$servicio','$activo','$user')")or die (mysql_error());
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
}
?>