<?php

Class Audit_Log_Model extends CI_Model {
    public function post_audit_log($data){
        return $this->db->insert('audit_log', $data);
    }

    public function get_load_audit_logs($lead_sequence){
        $query = $this->db->select('al.date, al.action, CONCAT(u.firstname," ", u.lastname) AS user')->from('audit_log al')->join('users u', 'al.action_by = u.user_id')->where('al.lead_sequence =', $lead_sequence)->get()->result();
        return $query ? array('data' => $query) : false;
    }
}