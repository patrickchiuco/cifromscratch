<?php
  class Login extends CI_Controller
  {
      function __construct()
      {
          parent:: __construct();
          $this->load->model('membership_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
      }

      function index()
      {
        $data['main_content'] = 'login_views/login_form';
        $this->load->view('common_views/base',$data);
      }

      function validate_credentials()
      {
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $is_valid = $this->membership_model->validate($username,$password);
          if($is_valid)
          {
            $data = array(
              'username' => $username,
              'password' => $password,
              'is_logged_in' => TRUE,
            );
            $this->session->set_userdata($data);
            redirect('site/members_area');
          }
          else
          {
            $this->load->view('common_views/base',array('main_content'=>'login_views/login_form','error'=>'Authentication Failed'));
          }
      }

      function signup()
      {
        $data['main_content'] = 'login_views/signup_form';
        $this->load->view('common_views/base',$data);

      }


    function create_member()
    {
      $this->form_validation->set_rules('first_name',"first name","trim|required");
      $this->form_validation->set_rules('last_name',"last name","trim|required");
      $this->form_validation->set_rules('email_address',"email address","trim|required|valid_email");


      $this->form_validation->set_rules('username',"username: ","trim|required|min_length[4]");
      $this->form_validation->set_rules('password',"password","trim|required|min_length[4]|max_length[32]");
      $this->form_validation->set_rules('password2',"password confirmation: ","trim|required|min_length[4]|max_length[32]|matches[password]");

      if($this->form_validation->run())
      {
        $new_member_info = array(
          'first_name' => $this->input->post('first_name'),
          'last_name' => $this->input->post('last_name'),
          'email_address' => $this->input->post('email_address'),
          'username' => $this->input->post('username'),
          'password' => $this->input->post('password'),
        );
        $q = $this->membership_model->create_new_member($new_member_info);
        if($q)
        {
          $data['main_content'] = 'login_views/signup_success';
          $this->load->view('common_views/base',$data);
        }
        else
        {
          $data['insert_errors'] = "Data was not inserted";
          $this->load->view('login_views/signup_form',$data);
        }
      }
      else
      {
        $this->signup();
      }

    }
  }
