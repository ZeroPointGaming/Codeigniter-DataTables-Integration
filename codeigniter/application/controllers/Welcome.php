<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
    //Load the dtm model and url helpers in the class constructor.
	public function __construct() {
        Parent::__construct();
        $this->load->model("dtm");
		$this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('welcome_message', array());
	}

    //Generate the ajax json response for the datatables 
	public function people_page()
    {
        //DataTable variables for pagination and search
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        //Get the people table from the database.
        $people = $this->dtm->get_people();

        //create an array for appending each row of data to.
        $data = array();

        foreach($people->result() as $r) {
            $data[] = array(
                    $r->first_name,
                    $r->last_name,
                    $r->age,
                    $r->id
            );
        }

        //Return to the ajax requester the 4 DataTable vars.
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $people->num_rows(),
            "recordsFiltered" => $people->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function add_new_person() 
    {
        $query = $this->dtm->new_person_insert();

        if($query) 
        {
            //Redirect back to sender
            redirect($_SERVER['HTTP_REFERER']);
        } 
        else 
        {
            $this->load->view('welcome/data_insertion_failed');
        }
    }
    
    public function data_insertion_failed()
    {
        echo "Error inserting objct into database.";
    }

    public function data_delete_failed()
    {
        echo "Error deleting object from database.";
    }
    
    //Removes a person from the database by id.
    public function remove_person()
    {
        //Execute delete with id
        $query = $this->dtm->delete_row($_POST['id']);

        if ($query)
        {
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            //todo error handling
        }
    }
}
