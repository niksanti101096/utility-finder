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

    public function get_check_duplicate($data) {
        $query = $this->db->select('sequence, email_address, phone_number')->from('lead_records')->where('date_created >= now() - interval 30 day')->where('email_address = ', $data['email'])->or_where('phone_number = ', $data['phone'])->get()->result();
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
        $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status !=', 0)->order_by('date_created','desc')->get()->result();
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

    public function get_load_archived_lead_records(){
        $query = $this->db->select('*')->from('lead_records')->where('status =', 0)->get()->result();
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

    public function get_load_leads_filter($date_from = "all", $date_to = "all") {
        if ($date_from == "all") {
            $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 1)->get()->result();
        } else {
            $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 1)->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')->get()->result();
        }
        return $query ? array('data' => $query, 'success' => true) : false;
    }

    public function get_load_allo_leads_filter($date_from = "all", $date_to = "all") {
        if ($date_from == "all") {
            $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 2)->get()->result();
        } else {
            $query = $this->db->select('*')->from('lead_records lr')->join('partner_records pr', 'lr.partner_id = pr.partner_id', 'left')->where('lr.status =', 2)->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')->get()->result();
        }
        return $query ? array('data' => $query, 'success' => true) : false;
    }

    public function get_leads_lead_source($date_from, $date_to){
        $manual_entry = $this->db->where('status !=', 0)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->where_not_in('lead_source', ['Webform', 'PPC', 'Email Campaign'])
            ->get('lead_records')->num_rows();

        $webform = $this->db->where('status !=', 0)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->where('lead_source =', 'Webform')
            ->get('lead_records')->num_rows();

        $ppc = $this->db->where('status !=', 0)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->where('lead_source =', 'PPC')
            ->get('lead_records')->num_rows();

        $email_campaign = $this->db->where('status !=', 0)
            ->where('date_created BETWEEN "'.$date_from.'" AND "'.$date_to.'"')
            ->where('lead_source =', 'Email Campaign')
            ->get('lead_records')->num_rows();

        return ['manual_entry' => $manual_entry, 'webform' => $webform, 'ppc' => $ppc, 'email_campaign' => $email_campaign];
    }

    public function get_load_partners_record($id = 0){
        if ($id != 0) {
            $query = $this->db->select('*')->from('partner_records')->where('partner_status !=', 0)->where('partner_id', $id)->get()->result();
            return $query ? array('data' => $query) : false;
        } else {
            $query = $this->db->select('*')->from('partner_records')->where('partner_status !=', 0)->get()->result();
            return $query ? array('data' => $query) : false;
        }
    }

    public function get_load_users_record(){
        $query = $this->db->select('*')->from('users')->where('status !=', 0)->get()->result();
        return $query ? array('data' => $query) : false;
    }
    
    public function post_assign_partner_bulk($data, $lead_sequence){
        $query = $this->db->where_in('sequence', $lead_sequence)->update('lead_records', $data);
        return $query ? true : false;
    }
    
    public function post_assign_partner($data, $lead_sequence){
        $query = $this->db->where('sequence', $lead_sequence)->update('lead_records', $data);
        return $query ? true : false;
    }

    public function get_load_notes($lead_sequence){
        $query = $this->db->select('n.notes_date_created, n.notes, CONCAT(u.firstname," ", u.lastname) AS user')->from('notes n')->join('users u', 'n.notes_added_by = u.user_id')->where('n.lead_sequence =', $lead_sequence)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function post_archive_bulk_lead($lead_sequence) {
        $query = $this->db->set('status', 0)->where_in('sequence', $lead_sequence)->update('lead_records');
        return $query ? true : false;
    }

    public function post_archive_lead($lead_sequence) {
        $query = $this->db->set('status', 0)->where('sequence', $lead_sequence)->update('lead_records');
        return $query ? true : false;
    }
    
    public function post_notif_details($data) {
        $this->db->insert('notification', $data);
        return $this->db->insert_id() ? ['id' => $this->db->insert_id()] : false;
    }

    public function get_load_notif($user_id) {

        $query = $this->db->select('*, n.notif_id AS n_notif_id, ns.notif_id AS ns_notif_id')
            ->from('notification n')
            ->join('notification_status ns', 'n.notif_id = ns.notif_id', 'left')
            ->where('n.notif_id NOT IN (SELECT n.notif_id FROM notification n LEFT JOIN notification_status ns ON n.notif_id = ns.notif_id WHERE ns.view_by = '.$user_id.')')
            // ->or_where(array('ns.notif_id' => NULL))
            ->where('n.notif_added_by !=', $user_id)
            ->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function post_set_notif($data) {
        return $this->db->insert('notification_status', $data);
    }

    public function post_supplier($data) {
        return $this->db->insert('supplier_records', $data);
    }

    public function get_load_energy_supp() {
        $query = $this->db->select('*')->from('supplier_records')->where('supplier_type = 1')->where('status = 1')->get()->result();
        return $query ? array('data' => $query) : false ;
    }

    public function get_load_water_supp() {
        $query = $this->db->select('*')->from('supplier_records')->where('supplier_type = 2')->where('status = 1')->get()->result();
        return $query ? array('data' => $query) : false ;
    }

    public function post_update_supplier_name($data) {
        $query = $this->db->set('supplier_name', $data['supplier_name'])->where('supplier_id', $data['supplier_id'])->update('supplier_records');
        return $query ? true : false;
    }

    public function post_update_supplier_logo($data) {
        $query = $this->db->set('supplier_logo', $data['supplier_logo'])->where('supplier_id', $data['supplier_id'])->update('supplier_records');
        return $query ? true : false;
    }

    public function post_archive_supplier($id) {
        $query = $this->db->set('status', 0)->where('supplier_id', $id)->update('supplier_records');
        return $query ? true : false;
    }

    public function get_user_emails() {
        $query = $this->db->select('email')->from('users')->where('received_email = 1')->where('email != ""')->get()->result();
        return $query ? array('data' => $query) : false ;
    }
    
    public function post_partner($data) {
        if ($data['partner_id'] == 0) {
            # insert
            $query = $this->db->insert('partner_records', $data);
            if (!$query) {
                # error inserting in db
                return false;
            }
            $id = $this->db->insert_id();
            $api_key = sha1('UF-API' . $id);
            $query = $this->db->where('partner_id', $id)->update('partner_records', array('api_key' => $api_key));
            return $query ? true : false;
        } else {
            # update
            $query = $this->db->where('partner_id', $data['partner_id'])->update('partner_records', $data);
            return $query ? true : false;
        }
        
    }

    public function post_archive_partner($id) {
        $array = [
            'partner_status' => 0,
            'api_access' => 0
        ];
        $query = $this->db->set($array)->where('partner_id', $id)->update('partner_records');
        return $query ? true : false;
    }

    public function get_load_supplier($id) {
        $query = $this->db->select('*')->from('lead_records')->where('sequence', $id)->get()->result();
        return $query ? array('data' => $query) : false ;
    }
}