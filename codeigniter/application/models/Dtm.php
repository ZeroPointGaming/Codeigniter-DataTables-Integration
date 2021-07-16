<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dtm extends CI_Model
    {
        //Query the people table from the database.
        public function get_people()
        {
            return $this->db->get("people");
        }

        //Uses the add new person form to add the person to the database.
        public function new_person_insert()
        {
            //Post new person to database.
            $this->db->insert('people', array(
                'first_name' => $this->input->post('first_name'), 
                'last_name' => $this->input->post('last_name'), 
                'age' => $this->input->post('age'), 
                'id' => $this->input->post('id'))
            );

            //Check if the db rows are affected and return false if error.
            return ($this->db->affected_rows() != 1) ? false : true;
        }

        public function delete_row($id)
        { 
            //Attach query to variable
            $query = $this->db->where("id", $id);
            
            //if var is true delete row
            if ($query)
            {
                $this->db->delete("people");
                return true; //return true
            }
            else
            {
                return false; //return false for error handling
            }
        }
    }
?>