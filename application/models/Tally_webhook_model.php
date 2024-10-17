<?php

Class Tally_webhook_model extends CI_Model
{
    public function post_tally_webhook($data)
    {
        return $this->db->insert('lead_records', $data);
    }
}