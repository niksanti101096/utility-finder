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
    
    public function reset_password($user_id, $password) {
        $this->db->where('user_id',$user_id);
        $this->db->update('users', array('password'=>$password));
        return $this->db->affected_rows() > 0 ? 'Successfully Changed Password.' : false;
    }

    public function check_email_exists($email) {
        $query = $this->db->select('user_id')->from('users')->where('email', $email)->where('status', 1)->get()->result();
        return $query ? true : false;
    }

    public function user_records($data) {
        if($data['user_id'] !== 0){
            unset($data['password']);
            $this->db->where('user_id', $data['user_id'])->update('users', $data);
            return true;
        }else{
            $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
            $this->db->insert('users', $data);
            return $this->db->insert_id() ? ['user_id' => $this->db->insert_id()] : false;
        }
        return true;
    }

    public function delete_user($id) {
        $this->db->where('user_id', $id)->update('users', array('status' => 0));
        return $this->db->affected_rows() ? true : false;
    }
}