<?php
  class Site_model extends CI_Model
  {
    function getAll()
    {
      $q = $this->db->get("test");
      $results = array();
      if($q->num_rows() > 0)
      {
        foreach($q->result() as $row)
        {
          array_push($results,$row);
        }
      }
      return $results;
    }
  }
?>
