<?php

Class Admin_Model extends CI_Model {
    public function get_lead_search($data){
        $result = [];
        $this->db->select('*');
        $this->db->from('lead_records');
        if($data['search_lead_id_number'] != '') $this->db->where('lead_id_number', $data['search_lead_id_number']);
        if($data['search_business_name'] != '') $this->db->where('business_name', $data['search_business_name']);
        if($data['search_post_code'] != '') $this->db->where('post_code', $data['search_post_code']);
        if($data['search_contact_name'] != '') $this->db->where('contact_name', $data['search_contact_name']);
        if($data['search_phone_number'] != '') $this->db->where('phone_number', $data['search_phone_number']);
        if($data['search_email'] != '') $this->db->where('email_address', $data['search_email']);

        $query = $this->db->get()->result();
        return $query ? array('data'=>$query) : false;
    }

    public function create_new_lead($data){
        return $this->db->insert('lead_records', $data);
    }
}