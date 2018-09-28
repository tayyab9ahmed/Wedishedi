<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Events_model extends CI_Model
{
 
	var $table = 'events';
 
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  public function get_events($start, $end)
  {
    return $this->db->where("Event_start_date >=", $start)->where("Event_end_date <=", $end)->get($this->table);
  }

  public function add_event($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function get_event($id)
  {
    return $this->db->where("Event_id", $id)->get($this->table);
  }

  public function update_event($id, $data)
  {
    $this->db->where("Event_id", $id)->update($this->table, $data);
  }

  public function delete_event($id)
  {
    $this->db->where("Event_id", $id)->delete($this->table);
  }
 
 
 
}
