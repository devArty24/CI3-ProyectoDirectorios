<?php
class Productosm extends CI_Model
{
	public function cargaproductos()
	{
		$consulta = $this->db->get('productos2');
		return $consulta->result();
	}
	
	public function buscaproductoscrit($criterio)
	{
		$consulta = $this->db->query("select * from productos2 where nombre like '%$criterio%'");
		return $consulta->result();
	}
}

?>