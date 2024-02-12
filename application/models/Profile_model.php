<?php

Class Profile_Model extends CI_Model {

    public function get_load_user($user_id) {
        $query = $this->db->select('*')->from('users')->where('user_id =', $user_id)->get()->result();
        return $query ? array('data' => $query) : false;
    }

    public function save_profile_info($data){
        $sess = $this->session->userdata('uf_session');
        $this->db->where('user_id', $sess['id'])->update('users', $data);
        return true;
    }

    public function save_password($old, $new){
        $sess = $this->session->userdata('uf_session');
        $query = $this->db->select('password')->from('users')->where('user_id', $sess['id'])->get()->result();
        if(password_verify($old, $query[0]->password)){
            $this->db->where('user_id', $sess['id'])->update('users', ['password' => password_hash($new, PASSWORD_BCRYPT)]);
            return true;
        }else{
            return false;
        }
    }

}