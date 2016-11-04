<?php

class Todo extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('todo_model'); // ak naloadujem v konstruktore budu pristupne pre kazdu mrtodu
		$this->load->helper('form');
		$this->load->helper('url'); //aby fungoval redirect
		$this->load->helper('typography');
		$this->load->library('form_validation');
	}


	function index() {
		
		$data = array( 'notes' =>  $this->todo_model->getNotes());
		$this->load->view('todo_view',$data);
		
	}

	function add() {

		
		$this->form_validation->set_rules('text','new post', 'trim|required|xss_clean');

		if($this->form_validation->run()){
			
			$data = array(

					'text' => $_POST['text']

					);

			$this->todo_model->addNotes($data);
			redirect('todo');
		}

		else {
		
			$data = array( 'notes' =>  $this->todo_model->getNotes());
			$this->load->view('todo_view',$data);
		}
	}

	function edit($id){

		$data = array(

			'id' => $id

			);

		$edit_data = array( 'edit_text' => $this->todo_model->editNotes($data));
		$this->load->view('todo_edit_view',$edit_data);


	}

	function update($id){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('text','edit post', 'trim|required|xss_clean|is_edit');

		if($this->form_validation->run()){
			
			$data = array(

				'text' => $_POST['text'],
				'id' => $id

				);

			$success_edit = $this->todo_model->updateNotes($data);
			if($success_edit) redirect('todo');
		}

		else{

			$data = array(

				'id' => $id

			);
			
			$this->load->view('todo_edit_view',$data);
		}

	}

	function delete($id){

		$data = array(

			'id' => $id
		);

		$success_delete = $this->todo_model->deleteNotes($data);
		if($success_delete) redirect('todo');

	}


//example for ajax request
	function ajax() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('text','new post', 'trim|required|xss_clean');

		if($this->form_validation->run()){
			
			$data = array(

					'text' => $_POST['text']

					);

			$id = $this->todo_model->addNotes($data);

		    $message = json_encode ([

		        'status' => 'success',
		        'id'    => $id

		    ]);

			die($message);
		}

		else {
		
			$data = array( 'notes' =>  $this->todo_model->getNotes());
			$this->load->view('todo_view',$data);
		}

	}

}