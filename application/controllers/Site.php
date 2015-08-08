<?php
  class Site extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
      $this->load->helper('form');
      $this->load->model('data_model');
    }

    function index()
    {
      $user_list = $this->_get_all_users();
      //print_r($user_list);
      $this->load->view('crud_views/show_options',$user_list);
    }

    function new_method()
    {
      $this->load->model('site_model');
      $data["output"] = $this->site_model->getAll();
      $this->load->view('common_views/header');
      $this->load->view('sample_view',$data);
      $this->load->view('common_views/footer');

    }

    function _private_method()
    {
      echo "I\'m a private method";
    }

    function show_data()
    {
      $this->load->model('data_model');
      $data['values'] = $this->data_model->getAll();
      $this->load->view('common_views/header');
      $this->load->view('view_data',$data);
      $this->load->view('common_views/footer');
    }

    function create_user()
    {
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'middle_name' => $this->input->post('mid_name'),
        'last_name' => $this->input->post('last_name'),
        'add_info' => $this->input->post('add_info'),
      );

      $this->data_model->add_record($data);
      $this->index();

    }

    function _get_all_users()
    {
      $data = array();
      if($this->data_model->get_records())
      {
        $data['users'] = $this->data_model->get_records();

      }
      return $data;
    }

    function display_all_users()
    {
      //check if request is post
      $users = $this->_get_all_users();
      $this->load->view('crud_views/show_options',$users);
    }

    function update_user()
    {
      $data = array(
        'first_name' => "Irene",
        'middle_name' => "F.",
        'last_name' => "Trump",
        'add_info'=> "Intelligent Irene",
      );

      $this->data_model->update_record(27,$data);
      $this->load->view('crud_views/show_options');
    }

    function delete_user()
    {
          $this->data_model->delete_row();
          $this->load->view('crud_views/show_options');
    }


  }
