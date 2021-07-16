<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct() {
        Parent::__construct();
        $this->load->model("dtm");
		$this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('welcome_message', array());
	}

	public function people_page()
        {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));

            $people = $this->dtm->get_people();
            $data = array();

            foreach($people->result() as $r) {
                $data[] = array(
						$r->first_name,
                        $r->last_name,
                        $r->age,
                        $r->id
                );
            }

            $output = array(
				"draw" => $draw,
                "recordsTotal" => $people->num_rows(),
                "recordsFiltered" => $people->num_rows(),
				"data" => $data
			);
            echo json_encode($output);
            exit();
        }
}
