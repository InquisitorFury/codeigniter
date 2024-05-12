<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
    public function register(){
        // Load necessary libraries
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        if ($this->form_validation->run() == FALSE){
            // If validation fails, load the registration form again
            $this->load->view('register');
        } else {
            // If validation succeeds, save user data to database
            $user_data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email')
            );
            $this->load->model('usermodel');
            $this->usermodel->registerUser($user_data);
            // Optionally, redirect to a success page or login page
            redirect('login/login');
        }
    }
    
}
