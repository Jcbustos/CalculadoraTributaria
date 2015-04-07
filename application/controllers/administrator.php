<?php /**
* 
*/
class Administrator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('administrador');
	}

	function save(){
		$post = $this->input->post();
		if(sizeof($post)>0){
			$datos = array('estado' => 1);
			foreach ($post as $key => $value) {
				$datos['nombre'] = $key;
				$inserta = $datos;
				$value = str_replace(".", "", $value);
				$inserta['valor'] = $value;
				$dato = $this->model_datos->getWhere($datos);
				if($dato){
					$this->model_datos->update($dato[0]->id_datos,$inserta);
				}else{
					$this->model_datos->insert($inserta);
				}

			}
		}
		redirect(base_url().'administrator','location');
	}
} ?>