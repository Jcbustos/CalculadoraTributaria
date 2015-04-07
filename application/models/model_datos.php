<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_datos extends CI_Model {

	private $table = "datos";

	//Obtener registros
	public function get($id){
		$table = $this->table;
		$this->db->where('id_'.$table,$id);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAll(){
		$table = $this->table;
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getRand($limit = 6){
		$table = $this->table;
		$this->db->order_by('id_'.$table,'RANDOM');
		$this->db->limit($limit);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getWhere($where){
		$table = $this->table;
		$this->db->where($where);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getLikeWhere($like,$where){
		$table = $this->table;
		$this->db->where($where);
		$this->db->like($like);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getWhereLimit($where,$limit,$offset){
		$table = $this->table;
		$this->db->where($where);
		$query = $this->db->get($table,$limit,$offset);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getLikeWhereLimit($like,$where,$limit,$offset){
		$table = $this->table;
		$this->db->where($where);
		$this->db->or_like($like);
		$query = $this->db->get($table,$limit,$offset);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	//Fin obtener registros

	//Contar registros
	public function countAll(){
		$table = $this->table;
		return $this->db->count_all($table);
	}

	public function countLikeWhere($like,$where){
		$table = $this->table;
		$this->db->where($where);
		$this->db->or_like($like);
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	public function countWhere($where){
		$table = $this->table;
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	//Fin contar registros

	//Modificar regisstros
	public function update($id, $data){
		$table = $this->table;
		$this->db->where('id_'.$table,$id);
		$this->db->set('fecha_upd',date('Y-m-d H:i:s'));
		$this->db->update($table,$data);
	}

	public function insert($data){
		$table = $this->table;
		$this->db->set('fecha_upd',date('Y-m-d H:i:s'));
		$this->db->set('fecha_ing',date('Y-m-d H:i:s'));
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	//Fin modificar registros

}

/* End of file model_administrador.php */
/* Location: .//C/wamp/www/glocart/app/models/model_administrador.php */