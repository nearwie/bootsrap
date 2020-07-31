<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }


    


 public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }




 public function getEntryLog()
    {
        $this->db->select('*');
        $this->db->join('user u', 'lb.user_id = u.id');
        return $this->db->get('entry_log lb')->result_array();
    }




}

