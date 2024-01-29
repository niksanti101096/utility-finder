<?php

Class Authentication_Model extends CI_Model {

    public function login_auth($data) {
        $query = $this->db->select('*')->from('users a')->where('username', $data['username'])->get()->result();
        if (!$query) {
            return array('username' => false, 'password' => true, 'result' => []);
        }else{
            $query = $this->db->select('a.*, b.description as role')->from('users a, user_role b')->where("username", $data['username'])->where('a.user_type = b.role_id')->get()->result();
            if (!$query) {
                return array('password' => false, 'username' => true, 'result' => []);
            }else{
                foreach($query as $record){
                    if(password_verify($data['password'], $record->password)){ // password_hash() a php hashing function is used in password [check database] so password_verify is needed to check password
                        return array('password' => true, 'username' => true, 'result' => $query);
                    }else{
                        return array('password' => false, 'username' => true, 'result' => []);
                    }
                    // returns means go back from where this function was called, soo, controller
                    break;
                }
            }
        }
    }
}