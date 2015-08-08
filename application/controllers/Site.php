<?php
  class Site extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();

    }

    function index()
    {
      $this->load->view('crud_views/show_options');
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
  }
