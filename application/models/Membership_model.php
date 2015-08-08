<?php
  class Membership_model extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }

    function validate($username,$password)
    {
      $this->db->where('username',$username);
      $this->db->where('password',md5($password));
      $q = $this->db->get('membership');
      if($q->num_rows() == 1)
      {
        return true;
      }else{
        return false;
      }
    }


    function create_new_member($new_user_info)
    {
      $new_user_info['password'] = md5($new_user_info['password']);
      $q = $this->db->insert('membership',$new_user_info);
      return $q;
    }

  }
