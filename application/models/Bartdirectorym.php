<?php
class Bartdirectorym extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorios');
		return $consulta->result();
	}
	#Directorios
	public function buscalugar($lugar,$categoria)
	{
		$lugar = $_GET['lugar'];
		$categoria = $_GET['categoria'];
		$consulta = "SELECT DISTINCT directorios.idd,directorios.nombre,directorios.horario,directorios.telefono,directorios.resena,directorios.redsocial,municipios.lugar,directorios.calle,directorios.numero,directorios.cp,directorios.activo,directorios.categoria,directorios.nombrei
						FROM directorios,municipios
						WHERE directorios.idm=municipios.idm AND directorios.categoria=? AND municipios.lugar=?
						ORDER BY directorios.nombre ASC";
		$query = $this->db->query($consulta,array($categoria,$lugar));
		return $query->result();
	}
	
	public function buscalugar1($idd)
	{
		$idd = $_GET['idd'];
		$consulta = $this->db->query("SELECT DISTINCT menu.platillo,menu.precio
									FROM directorios,menu
									WHERE  directorios.idd=menu.idd
									AND directorios.idd='$idd'");
		return $consulta->result();
	}

	public function buscalugar2($idd)
	{
		$idd = $_GET['idd'];
		$consulta = $this->db->query("SELECT DISTINCT directorios.idd,directorios.nombre,directorios.horario,directorios.telefono,directorios.resena, 
										directorios.redsocial,municipios.lugar,directorios.calle,directorios.numero,directorios.cp,directorios.activo,
										directorios.categoria,directorios.nombrei,servicios.servicio
									FROM directorios,municipios,servicios
									WHERE directorios.idm=municipios.idm 
									AND directorios.idd=servicios.idd
									AND directorios.idd='$idd'");
		return $consulta->result();
	}

	public function buscalugar3($idd)
	{
		$idd = $_GET['idd'];
		$consulta = $this->db->query("SELECT DISTINCT directorios.idd,directorios.nombre,directorios.horario,directorios.telefono,directorios.resena, 
										directorios.redsocial,municipios.lugar,directorios.calle,directorios.numero,directorios.cp,directorios.activo,
										directorios.categoria,directorios.nombrei,imgs.nombre
									FROM directorios,municipios,imgs
									WHERE directorios.idm=municipios.idm 
									AND directorios.idd=imgs.idd
									AND directorios.idd='$idd'");
		return $consulta->result();
	}

	public function obtener($idd)
	{
		// $this->db->select("latitud,longitud");
		// $this->db->from("directorio");
		// $this->db->where("idd",$idd);
		// $query = $this->db->get();
		// return $query->row();
		$consulta=$this->db->query("SELECT nombre,latitud,longitud FROM directorios WHERE idd='1'");
		return $consulta->result();
	}
	
	public function buscalugar4($idd)
	{
		$idd = $_GET['idd'];
		$consulta = $this->db->query("SELECT DISTINCT promociones.descripcion,promociones.vigencia
									FROM directorios,promociones
									WHERE promociones.idd=directorios.idd 
									AND directorios.idd='$idd'");
		return $consulta->result();
	}
	
	public function buscamenu($idd)
	{
		$idd = $_GET['idd'];
		$consulta = $this->db->query("SELECT DISTINCT platillo,precio from menu where idd='$idd' ");

		return $consulta->result();
	}
}
