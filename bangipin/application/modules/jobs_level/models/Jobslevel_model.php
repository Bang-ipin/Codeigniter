<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobslevel_model extends CI_Model {
	
	public function get_all_pendidikan(){
		return $this->db->order_by('id','DESC')
					->get('pendidikan')
					->result_array();
	}
	
	function add($data){
		return $this->db->insert('pendidikan',$data);
		
	}
	function update($id,$data){
	$this->db->where('id',$id);
	$this->db->update('pendidikan',$data);
	}
	
    function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('pendidikan');
        return $delete;
    }
	
}
   