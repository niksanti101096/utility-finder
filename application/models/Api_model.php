<?php

class API_Model extends CI_Model
{
    public function post_contact_form($data)
    {
        $this->db->insert('contact_form', $data);
        return true;
    }
}
