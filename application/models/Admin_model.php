<?php

Class Admin_Model extends CI_Model {
    public function get_lead_search($data){
        $result = [];
        $this->db->select('*');
        $this->db->from('lead_records');
        if($data['lead_id'] != '') $this->db->where('lead_id', $data['lead_id']);
        if($data['business_name'] != '') $this->db->where('business_name', $data['business_name']);
        if($data['post_code'] != '') $this->db->where('post_code', $data['post_code']);
        if($data['contact_name'] != '') $this->db->where('contact_name', $data['contact_name']);
        if($data['phone_number'] != '') $this->db->where('phone_number', $data['phone_number']);
        if($data['email_address'] != '') $this->db->where('email_address', $data['email_address']);

        $query = $this->db->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function create_new_lead($data){
        $this->db->insert('lead_records', $data);
        return $this->db->insert_id() ? ['id' => $this->db->insert_id()] : false;
    }

    public function post_update_lead_record($data, $lead_sequence){
        $query = $this->db->where('sequence', $lead_sequence)->update('lead_records', $data);
        return $query ? true : false;
    }

    public function post_save_notes($data){
        return $this->db->insert('notes', $data);
    }

    public function get_load_lead_records(){
        $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status !=', 0)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function get_load_lead_record($sequence){
        $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.sequence =', $sequence)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function get_load_not_lead_records(){
        $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 1)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function get_load_allocated_lead_record(){
        $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 2)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function get_load_partner_details($partner_id){
        $query = $this->db->select('*')->from('partner_records')->where('partner_id =', $partner_id)->get()->result();
        return $query ? array('data' => $query, 'success' => true) : false;
    }

    public function get_load_all_partners(){
        $query = $this->db->select('*')->from('partner_records')->get()->result();
        return $query ? array('data' => $query, 'success' => true) : false;
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

    public function get_load_users_record(){
        $query = $this->db->select('*')->from('users')->where('status !=', 0)->get()->result();
        return $query ? array('data' => $query) : false;
    }
    
    public function post_assign_partner($data, $lead_id){
        $query = $this->db->where('lead_id', $lead_id)->update('lead_records', $data);
        return $query ? true : false;
    }

    public function get_load_notes($lead_sequence){
        $query = $this->db->select('n.notes_date_created, n.notes, CONCAT(u.firstname," ", u.lastname) AS user')->from('notes n')->join('users u', 'n.notes_added_by = u.user_id')->where('n.lead_sequence =', $lead_sequence)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function post_archive_lead($lead_sequence) {
        $query = $this->db->set('status', 0)->where('sequence', $lead_sequence)->update('lead_records');
        return $query ? true : false;
    }

}