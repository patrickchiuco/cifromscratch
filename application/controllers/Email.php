<?php
  class Email extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
    }

    function index()
    {

      $this->load->view('common_views/header');
      $this->load->view('newsletter');
      $this->load->view('common_views/footer');
    }

    function send()
    {

      /*
        Set up SMTP server before sending emails
      */
      $this->form_validation->set_rules('name','Name: ','trim|required');
      $this->form_validation->set_rules('email','Email Address: ','trim|required|valid_email');

      if(!$this->form_validation->run())
      {
        $this->load->view('newsletter');
      }else{
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $config = array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_port' => 465,
          'smtp_user' => 'patrick.chiuco',
          'smtp_pass' => 'L3nt0.28172',
        );

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");

        $this->email->from('aldous.wright@gmail.com','Aldous Wright');
        $this->email->to($email);
        $this->email->subject('Hello '.$name.'!');
        $this->email->message('It is working. Great!');

        $path = $this->config->item('server_root');
        $file = $path.'/attachments/yourinfo.txt';
        $this->email->attach($file);
        if($this->email->send())
        {
          $data['message'] = $name.", your email was sent.";
          $this->load->view('common_views/header');
          $this->load->view('email_views/email_success',$data);
          $this->load->view('common_views/footer');
        }else{
          show_error($this->email->print_debugger());
        }
      }



    }

  }
