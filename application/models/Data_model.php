<?php
  class Data_model extends CI_Model
  {

    function getAll()
    {
      /*
        Using the query function to fetch the database
          $q = $this->db->query("
            SELECT * from data;
          ");
      */

      /*
        Using Active Records (Query Builder Class) with offset
        i.e. (LIMIT X, OFFSET Y)
        $q = $this->db->get('data',1,1);
      */

      /*
        Using the select function to construct the 'SELECT' portion
        of the SQL
        $this->db->select('last_name');
        $q = $this->db->get('data');
      */

      /*
        Using the query function with binded values
        $sql = 'SELECT id, first_name FROM `data` WHERE last_name=? AND id=?;';
        $q = $this->db->query($sql,array(3,'Heidelberg'));
      */
      $this->db->select('id, last_name');
      $this->db->from('data');
      $this->db->where(array('last_name'=>'Heidelberg',));
      $q = $this->db->get();
      echo "<pre>";
      print_r($q->result());
      echo "</pre>";
      $results = array();
      if($q->num_rows() > 0)
      {
        foreach ($q->result() as $row)
        {
          array_push($results,$row);
        }
      }
      return $results;
    }

    function add_record()
    {
      $this->db->insert('data',$data);
      return
    }

    function update_record($data)
    {
      $this->db->where('id',14);
      $this->db->update("comment",$data)

    }

    function delete_row($id)
    {
      $this->db->where('id',$this->uri->segment(3));
      $this->db->delete('comment');

    }
  }
?>
