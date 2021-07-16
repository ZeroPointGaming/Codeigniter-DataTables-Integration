<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dtm extends CI_Model
    {
        public function get_people()
        {
            return $this->db->get("people");
        }
    }
?>