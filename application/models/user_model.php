<?php

class user_model extends CI_Model
{

  function __construct()
  {
     parent::__construct();
  }

  public function dologin($data)
  {
    $sql = 'select * from users where User_email = "'.$data['User_email'].'" and User_password = "'.md5($data['User_password']).'"';
    $query = $this->db->query($sql);
    $result_array = $query->row_array();
    return $result_array;
  }

  public function get_user_by_id($User_id)
  {
    $sql = 'select * from users where User_id = "'.$User_id.'"';
    $query = $this->db->query($sql);
    $result_array = $query->row_array();
    return $result_array;
  }

  public function add($data)
  {
      $date = date('Y-m-d H:i:s');
      $sql = 'insert into users(User_fname,User_lname,User_email,User_phone_no,User_password,User_contact_preference,CreatedOn,IsVendor) VALUES("'.$data['User_fname'].'","'.$data['User_lname'].'","'.$data['User_email'].'","'.$data['User_phone_no'].'","'.md5($data['User_password']).'","'.$data['User_contact_preference'].'","'.$date.'","'.$data['IsVendor'].'")';
      $this->db->query($sql);
      return TRUE;
  }

  public function chk_email($User_email)
  {
    $sql = 'select count(*) as count from users where User_email = "'.$User_email.'"';
    $query = $this->db->query($sql);
    $result_array = $query->row_array();
    if($result_array['count'] > 0)
    {
        return 1;
    }
    else {
      return 0;
    }

  }
}

  ?>
