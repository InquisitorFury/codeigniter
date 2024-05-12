<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    public function login(){
        // Load necessary libraries
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE){
            // If validation fails, load the login form again
            $this->load->view('login');
        } else {
            // If validation succeeds, check user credentials
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('usermodel');
            $user = $this->usermodel->getUserByUsername($username);
            if ($user && password_verify($password, $user->password)) {
                // If user is authenticated, set session or redirect to dashboard
                // Example: $this->session->set_userdata('user_id', $user->id);
                redirect('quizgame/quiz');
            } else {
                // If authentication fails, show error message
                $data['error'] = 'Invalid username or password';
                $this->load->view('login', $data);
            }
        }
    }
    
    
}
