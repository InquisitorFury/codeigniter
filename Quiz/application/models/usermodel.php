<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usermodel  extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function registerUser($user_data){
        $this->db->insert('users', $user_data);
    }

    public function getUserByUsername($username){
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }
   
    
}
