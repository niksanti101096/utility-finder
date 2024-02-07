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

    public function get_load_lead_record(){
        $query = $this->db->select('*')->from('lead_records')->where('status !=', 0)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function get_hits_allocation($date_from, $date_to){
        $hits = $this->db->where('status !=', 0)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->get('lead_records')->num_rows();
        $not_allocated = $this->db->where('status =', 1)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->get('lead_records')->num_rows();
        $allocated = $this->db->where('status =', 2)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->get('lead_records')->num_rows();
        return ['hits' => $hits, 'not_allocated' => $not_allocated, 'allocated' => $allocated];
    }

    public function get_count_hits(){
        $this->db->where('status !=', 0);
        $query = $this->db->get('lead_records');
        return $query->num_rows();
    }

    public function get_count_not_yet_allocated(){
        $this->db->where('status =', 1);
        $query = $this->db->get('lead_records');
        return $query->num_rows();
    }

    public function get_count_allocated(){
        $this->db->where('status =', 2);
        $query = $this->db->get('lead_records');
        return $query->num_rows();
    }

    public function get_load_user_record(){
        $query = $this->db->select('*')->from('users')->where('status !=', 0)->get()->result();
        return $query ? array('data' => $query) : false;
    }
}