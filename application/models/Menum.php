<?php
class Menum extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
	
	#MENU
	public function buscamenu($criterio,$u)
	{
		$consulta=$this->db->query("SELECT menu.idme, menu.platillo,menu.precio,menu.tipo,menu.activo
		                            FROM menu
									WHERE menu.usuario like '$u'
									      AND platillo LIKE '%$criterio%' order by idme asc");
		return $consulta->result();
	}
	
	#ALTA MENU
	function get_lugares(){
        $data = array();
        $query = $this->db->get('directorios');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
				$data[] = $row;
            }
        }
        $query->free_result();
        return $data;
    }

	#Alta menu
	public function agregar_menu($platillo,$clave,$activo,$precio,$tipo,$us)
	{
		$consulta = $this->db->query("call altamenu('$platillo','$clave','$activo','$precio','$tipo','$us',@resultado)") or die(mysql_error());
		#return $consulta->result();
	}	
	
	
	#Eliminación MENU
	public function borrarmenu()
	{
		$idme= $_GET['idme'];
		$consulta=$this->db->query("call eliminamenu($idme,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}

	#modificar
	#para el activo
	public function acti($idme)
	{
		$consulta = $this->db->query("SELECT idme,activo,tipo FROM menu where idme=$idme");
		return $consulta->result();	
	}
	#fin de activo

	public function get_editm($idme)
	{
		$query=$this->db->get_where('menu',array('idme'=>$idme));
		return $query->row();
	}

	public function updates($idme,$platillo,$activo,$precio,$tipo,$user)
	{
		// Update de forma tradicional
		//$consulta=$this->db->query("select ed_men($idme,'$platillo','$activo','$precio','$tipo','$user')")or die (mysql_error());

		// Llamada a una funcion mysql de forma estructurada
		$sql = "select ed_men(?, ?, ?, ?, ?, ?)";
		$consulta = $this->db->query($sql, array($idme,$platillo,$activo,$precio,$tipo,$user))or die (mysql_error());

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
	