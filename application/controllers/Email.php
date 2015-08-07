<?php
  class Email extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
    }

    function index()
    {

      /*
        Set up SMTP server before sending emails
      */
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
      $this->email->to('patrick.chiuco@gmail.com');
      $this->email->subject('This is an email test');
      $this->email->message('It is working. Great!');

      $path = $this->config->item('server_root');
      $file = $path.'/attachments/yourinfo.txt';
      $this->email->attach($file);
      if($this->email->send())
      {
        echo "Your email was sent. Fool";
      }else{
        show_error($this->email->print_debugger());
      }


    }

  }
