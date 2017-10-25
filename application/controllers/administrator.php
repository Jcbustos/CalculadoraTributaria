<?php /**
* 
*/
class Administrator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/New_York');
		$this->load->library('session');
		$this->usuarios = array('admin');
		$this->passwords = array('uCQR1Z5QUK');
	}

	function index(){
		$this->login();
	}
	
	function login(){
		if($this->session->userdata('usuario') != '' && $this->session->userdata('password') != ''){
			$this->home();
		}else{
			$this->load->view('login');
		}
	}
	
	function salir(){
		$this->session->sess_destroy();
		redirect(base_url().'administrator','location');
	}
	
	function validar(){
		$usuario = $this->input->post('usuario');
		$password = md5($this->input->post('password'));
		$i = 0;
		$data['response'] = false;
		foreach($this->usuarios as $file){
			if($usuario == $file){
				if($password == md5($this->passwords[$i])){
					$data['response'] = true;
					$data['url'] = base_url().'administrator/home';
					$this->session->set_userdata('usuario',$usuario);
					$this->session->set_userdata('password',$password);
				}
			}
			$i++;
		}
		echo json_encode($data);
	}
	
	function home(){
		if($this->session->userdata('usuario') != '' && $this->session->userdata('password') != ''){
			$this->load->view('administrador');
		}else{
			$this->login();
		}
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