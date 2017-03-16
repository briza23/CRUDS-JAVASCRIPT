<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cruds_model extends CI_Model
{
	public $table = 'members';
	public $id    = 'id';

    function __construct()
    {
        parent::__construct();
    }

	public function get_all_member(){
		return $this->db->get($this->table)->result();
	}
	public function add($data){
		$this->db->insert($this->table,$data);
	}
	public function update($id,$data){
		$this->db->where($this->id,$id);
		$this->db->update($this->table,$data);
	}
	public function delete($id){
		$this->db->where($this->id,$id);
		$this->db->delete($this->table);
	}
	public function search($key){

	}
}
?>