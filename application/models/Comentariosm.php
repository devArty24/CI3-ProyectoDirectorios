<?php
class Comentariosm extends CI_Model
{
	public function cargadirectorio()
	{
		$consulta = $this->db->get('directorio');
		return $consulta->result();
	}
#COMENTARIOS
	public function buscacomentarios($criterio,$u)
	{
		$consulta=$this->db->query("SELECT comentarios.idco,comentarios.comentario,comentarios.activo  
		                            FROM comentarios,usuarios
									WHERE comentarios.idu=usuarios.idu 
									                                     AND usuarios.nomuser='$u'
																		 AND comentario LIKE '%$criterio%' order by idco asc");
		return $consulta->result();
	}
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

	 #ALTA COMENTARIOS
	public function agregar_comentario($comentario,$clave,$activo)
	{
		$consulta = $this->db->query("call altacomentarios('$comentario','$clave','$activo',@resultado)") or die(mysql_error());
		#return $consulta->result();
	}
#Eliminación COMENTARIOS
	public function borrarcomentarios()
	{
		$idco= $_GET['idco'];
		$consulta=$this->db->query("call eliminacomentarios($idco,@resultado)") or die (mysql_error());
		#$this->db->delete('menu', array('idme'=>$idme));
	}
#Modificar com
	#para el activo
	public function acti($idco)
	{
	$consulta = $this->db->query("SELECT idco,activo FROM comentarios where idco=$idco");
	return $consulta->result();	
	}
	#fin de activo
	public function get_editco($idco)
	{
		$query=$this->db->get_where('comentarios',array('idco'=>$idco));
		return $query->row();
	}
	public function updates($idco,$comentario,$activo,$idd)
	{
		$consulta=$this->db->query("select ed_com($idco,'$comentario','$activo','$idd')")or die (mysql_error());
		return $consulta->result();
		if($this->db->affected_rows()>0)
		{
		   redirect(base_url.'index.php/comentariosc/cargacomentarios');
		}
	}
	public function imp($u)
	{
	$consulta = $this->db->query("SELECT * FROM usuarios WHERE nomuser='$u'");
	return $consulta->result();
	#el return sirve para devolver el resutado
	}
}