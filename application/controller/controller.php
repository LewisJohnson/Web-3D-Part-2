<?php
//Create the controller class for the MVC design pattern
class Controller {
	public $load;
	public $model;

	// Create functions for the controller class
	function __construct($pageURI = null){

		// From the Load class
		$this->load = new Load();
		
		// From the Model class
		$this->model = new Model();

		// Determine what page you are on
		// Calls function named pageURI
		$this->$pageURI();
	}

	// The home page
	function home(){
		$this->load->view('home');
	}

	// The gallery page
	function gallery(){
		$this->load->view('gallery');
	}
	
	// The admin page
	function admin(){
		$this->load->view('admin');
	}
	
	// The about page
	function about(){
		$this->load->view('about');
	}

	// Gets the JSON version of the models from the database rows
	function getModelsJSON($pretty = false){
		$data = $this->model->dbRead();
		if($pretty){
			return json_encode($data, JSON_PRETTY_PRINT);
		} else{
			echo json_encode($data);
		}
	}
	
	// Creates the database and shows a message
	function dbCreate(){
		$data = $this->model->dbCreate();
		$this->load->view('view_simple_message',$data);
	}
	
	// Reads the database and shows the content
	function dbRead(){
		$this->load->view('view_simple_message', $this->getModelsJSON(true));
	}
	
	// Drops the database and shows a message
	function dbDelete(){
		$data = $this->model->dbDelete();
		$this->load->view('view_simple_message',$data);
	}
}
?>