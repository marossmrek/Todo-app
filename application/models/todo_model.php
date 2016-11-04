<?php

class Todo_model extends CI_Model {

	function getNotes() {

		//$query = $this->db->query('Select * from notes');
		$query = $this->db->order_by('time desc')->get('notes');
		return $query->result();

	}

	function addNotes($data){

		$query = $this->db->insert('notes',$data);

		$insert_id = $this->db->insert_id();
   		return  $insert_id;

	}

	function editNotes($data){

		$query = $this->db->where('ID', $data['id']) ->get('notes');
		if($query->result()) return $query->result();
		redirect('todo');
		
	}

	function updateNotes($data){

		
		$query = $this->db->where('id', $data['id'])->update('notes', $data); 

		if($query) return true;

	}

	function deleteNotes($data){

		$query = $this->db->where('id', $data['id'])->delete('notes'); 

		if($query) return true;

	}

}