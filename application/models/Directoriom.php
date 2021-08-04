<?php
class Directoriom extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
	#DIRECTORIO
	public function buscadirectoriocrit($criterio,$u)
	{
		$consulta = $this->db->query("SELECT idd,directorio.nombre,horario,telefono,resena,redsocial,
		                                     municipios.lugar,calle,numero,cp,directorio.activo,
											 categoria,nombrei,usuarios.nomuser  
		                              FROM directorio, municipios
									  WHERE directorio.idm = municipios.idm 
									  AND directorio.usuario= like='$u'
                                      AND directorio.nombre like '%$criterio%' order by idd asc");
		                            
		return $consulta->result();
	}
	#ALTA DIRECTORIO

	public function get_municipio(){
        $data = array();
        $query = $this->db->get('municipios');

        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $data[] = $row;
            }
        }
        $query->free_result();
        return $data;
    }
	
	public function agregar_directorio($nombre,$telefono,$horario,$resena,$redsocial,$idm,$calle,$numero,$cp,$activo,$categoria,$nombrei,$ruta,$user)
	{
		// Consulta comun -> No es recomendada porque si da error manda la informacion que se le esta enviando
		//$consulta = $this->db->query("call altadirectorio('$nombre','$telefono','$horario','$resena','$redsocial','$idm','$calle','$numero','$cp','$activo','$categoria','$nombrei','$ruta','$user',@resultado)") or die(mysql_error());
		
		// Consulta estructurada -> Es mejor porque si da error no muestra la informacion
		$sql = "call altadirectorio(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @resultado)";
		$consulta = $this->db->query($sql,array($nombre,$telefono,$horario,$resena,$redsocial,$idm,$calle,$numero,$cp,$activo,$categoria,$nombrei,$ruta,$user));
	}

  #ALTA SERVICIOS
  /*function get_lugares() {
        $data = array();
        $query = $this->db->get('directorio');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }*/

#Eliminación DIRECTORIO
	public function borrardirectorio()
	{
		$idd= $_GET['idd'];
		$consulta=$this->db->query("call eliminadirectorio($idd,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}

#Modificar dir
	    #para el activo
			public function acti($idd)
			{
				$consulta = $this->db->query("SELECT idd,activo FROM directorio where idd=$idd");
				return $consulta->result();	
			}
		#fin de activo
	public function get_editd($idd)
	{
		$query=$this->db->get_where('directorio',array('idd'=>$idd));
		return $query->row();
	}
	public function updates($idd,$nombre,$telefono,$horario,$resena,$redsocial,$calle,$numero,$cp,$activo,$categoria)
	{
		$consulta=$this->db->query("select ed_dir($idd,'$nombre','$telefono','$horario','$resena','$redsocial','$calle','$numero','$cp','$activo','$categoria')")or die (mysql_error());
		return $consulta->result();
	}
	public function activacion($des)
	{
		$bandlink=1;
		$consulta=$this->db->query("Update usuarios Set bandlink=$bandlink Where nomuser='$des'")or die (mysql_error());
	}
#correo
    public function msnin($date)
	{
	$this->db->insert('usuarios',$date);
	}

	#
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

		$consulta = $this->db->query("SELECT * FROM usuarios WHERE $condition");
  		return $consulta->result();
   		#el return sirve para devolver el resutado
  	}

	public function very_user($user)
	{
		$consulta= $this->db->get_where('directorios',array('usuario'=>$user));

		if($consulta->num_rows()== 1){
			return true;
	 	}else{
	   		return false;
	 	}
	}
}
?>