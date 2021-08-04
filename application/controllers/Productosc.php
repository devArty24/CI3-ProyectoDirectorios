<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productosc extends CI_Controller
{
	public function muestraproductos()
	{
		#CARGA LA VISTA DEL ENCABEZADO
		$this->load->view('vistaencabezado');
		#CARGA LOS PRODUCTOS DE LA TABLA DE LA BD 
		$this->load->model('productosm');
		$data['resultado']= $this->productosm->cargaproductos();
		#CARGA LA VISTA PARA MOSTRAR LOS PRODUCTOS
		$this->load->view('productosv',$data);
		#CARGA LA EL PIE DE PAGINA
		$this->load->view('vistapie');
	}

	public function muestraproducto()
	{
		$this->load->view('buscaproducto');
	}
	
	public function cargainformacion()
	{
		$criterio2 =$this->input->post('criterio');
		$criterio =$this->input->post('criterio');
		$this->load->model('productosm');
		$data['resultado']= $this->productosm->buscaproductoscrit($criterio);
		$this->load->view('buscaproducto');
		$this->load->view('productosv',$data);
		echo "Mensaje Final";
	}
}
?>