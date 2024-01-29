<?php

Class Masterfile_Model extends CI_Model {

    public function get_member_list_all(){
        $result = [];
        $query = $this->db->select('u.user_id, u.firstname, u.middlename, u.lastname')->from('users u')->where('u.status', 1)->where('u.user_type', 2)->order_by('u.date_created', 'desc')->get()->result();
        if(!empty($query[0]->user_id)){
            foreach($query as $record){
                $result[] = array(
                    'id' => $record->user_id,
                    'firstname' => $record->firstname,
                    'middlename' => $record->middlename,
                    'lastname' => $record->lastname,
                    'name' => $record->firstname . ($record->middlename ? ' ' . strtoupper(substr($record->middlename, 0, 1)) . '.' : '') . ' ' .$record->lastname
                );
            }
        }
        
        return $query ? array('data'=>$result) : false;
    }

    public function save_member($data, $data2){
        $this->db->insert('users', $data);
        if($this->db->affected_rows()){
            $id = $this->db->insert_id();
            return true;
        }else{
            return false;
        }
    }

    public function delete_member($id){
        $this->db->where('user_id', $id)->update('users', array('status'=>0));
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function get_member_profile_id($id){
        $result = [];
        $query = $this->db->select('*')->from('users')->where('user_id', $id)->where('status', 1)->limit(1)->get()->result();
        if($query){
            foreach($query as $record){
                $result['user_id'] = $record->user_id;
                $result['firstname'] = $record->firstname;
                $result['middlename'] = $record->middlename;
                $result['lastname'] = $record->lastname;
                break;
            }
        }
        return $query ? array('data'=>$result) : false;
    }

    public function save_member_profile($data){
        $this->db->where('user_id', $data['user_id'])->update('users', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

}