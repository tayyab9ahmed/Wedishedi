<?php

class vendor_model extends CI_Model
{

  function __construct()
  {
     parent::__construct();
  }

  public function get_all_vendor_type()
  {
    $query = $this->db->query("SELECT * from vendor_type");
    $result_array = $query->result_array();
    return $result_array;
  }

  public function get_all_vendor_by_type_city($vendor_type,$vendor_city)
  {
    $query = $this->db->query("SELECT *,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v WHERE  v.City like '%".$vendor_city."%' ");
    $result_array = $query->result_array();
    return $result_array;
  }

  public function get_all_vendors()
  {
    $query = $this->db->query("SELECT *,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v ");
    $result_array = $query->result_array();
    return $result_array;
  }

  public function get_all_vendor_by_type($vendor_type)
  {
    if($vendor_type == 1)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isBanquetHall = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 2)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isDecorators = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 3)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isDj = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 4)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isPhotographer = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 5)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isBakeries = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 6)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isBridalSaloon = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 7)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isInvitation = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 8)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isLimousine = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 9)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isFlorist = 1 ");
      $result_array = $query->result_array();
    }
    elseif($vendor_type == 10)
    {
      $query = $this->db->query("SELECT * ,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path FROM vendors v where isBanquetHall = 1 ");
      $result_array = $query->result_array();
    }
    return $result_array;
  }

  public function get_vendor_by_id($vendor_id)
  {
    $vendor_id = $this->db->escape($vendor_id);
    $query = $this->db->query("SELECT *,(SELECT Vendor_picture_path FROM vendor_pictures vp WHERE vp.Vendor_id = v.Vendor_id LIMIT 1)AS Vendor_picture_path from vendors v where v.vendor_id = ".$vendor_id."");
    $result_array = $query->row_array();
    return $result_array;
  }

  public function get_services_by_vendor_type($vendor_type_id)
  {
    $service_list = $this->get_services($vendor_type_id);
    $get_vendor_title = $this->get_vendor_title($vendor_type_id);

    $out_put ='';
    $count = 0;
    if(isset($service_list) && $service_list != "")
    {
      $out_put.='<div id="'.$vendor_type_id.'">';
        $out_put.='<h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">'.$get_vendor_title['Vendor_type_name'].'</h3>';
       foreach($service_list as $service)
        {
          $count = $count + 1;
          $out_put.='<div class="form-group">';
          $out_put.='<label class="control-label col-md-6 col-sm-6 col-xs-12" for="vendor-name">'.$service['Service_title'].' <span class="required" style="color:red;">*</span>';
          $out_put.='</label>';
          $out_put.='<div class="col-md-3 col-sm-3 col-xs-12">';
          $out_put.='<input type="text" id="Service_id_'.$service['Service_id'].'" name="Service_id_'.$service['Service_id'].'" required="required" class="form-control col-md-7 col-xs-6 input_validator">';
          $out_put.='  </div>';
          $out_put.='</div>';
        }
        $out_put.='</div>';
    }

    return $out_put;

  }

  public function get_min_max_service_id()
  {
    $query = $this->db->query("SELECT MIN(Service_id) AS min_serive_id , MAX(Service_id) AS max_serive_id FROM service ");
    $result_array = $query->row_array();
    return $result_array;
  }

  public function get_services($vendor_type_id)
  {
    $query = $this->db->query("SELECT * FROM service WHERE Vendor_type_id = ".$vendor_type_id."");
    $result_array = $query->result_array();
    return $result_array;
  }

  public function get_vendor_title($vendor_type_id)
  {
    $query = $this->db->query("SELECT * FROM vendor_type WHERE Vendor_type_id = ".$vendor_type_id."");
    $result_array = $query->row_array();
    return $result_array;
  }

  public function get_vendor_services($vendor_type)
  {
    $query = $this->db->query("SELECT * FROM service where Vendor_type_id = ".$vendor_type." ");
    $result_array = $query->result_array();
    return $result_array;
  }



  public function get_vendor_service_by_id($vendor_id,$vendor_type_id)
    {
      $query = $this->db->query("SELECT *,(SELECT s.Service_title FROM service s WHERE s.Service_id = vs.Service_id)AS Service_title FROM vendor_service vs JOIN service s ON s.Service_id = vs.Service_id JOIN vendor_type vt ON s.Vendor_type_id = vt.Vendor_type_id where vs.Vendor_id = ".$vendor_id." and vt.Vendor_type_id = ".$vendor_type_id."");
      $service_list = $query->result_array();
      $get_vendor_title = $this->get_vendor_title($vendor_type_id);
      $out_put ='';
      $count = 0;
      if(isset($service_list) && $service_list != "")
      {
        $out_put.='<h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">'.$get_vendor_title['Vendor_type_name'].'</h3>';

         foreach($service_list as $service)
          {
            $count = $count + 1;
            $out_put.='<div class="form-group" >';
            $out_put.='<label class="control-label col-md-6 col-sm-6 col-xs-12" for="vendor-name">'.$service['Service_title'].' <span class="required" style="color:red;">*</span>';
            $out_put.='</label>';
            $out_put.='<div class="col-md-3 col-sm-3 col-xs-12">';
            $out_put.='<input type="text" id="Service_id_'.$service['Service_id'].'" name="Service_id_'.$service['Service_id'].'" value="'.$service['result'].'" required="required" class="form-control col-md-7 col-xs-6">';
            $out_put.='  </div>';
            $out_put.='</div>';
          }
      }

      return $out_put;
    }

  public function get_all_vendor_services($vendor_id)
  {
    $query = $this->db->query("SELECT *,(SELECT s.Service_title FROM service s WHERE s.Service_id = vs.Service_id)AS title FROM vendor_service vs WHERE vs.vendor_id = ".$vendor_id."");
    $result_array = $query->result_array();
    return $result_array;
  }

  public function vendor_services($vendor_id)
  {
    $query = $this->db->query("SELECT *
                              FROM vendor_service vs
                              JOIN service s ON s.Service_id = vs.Service_id
                              JOIN vendor_type vt ON s.Vendor_type_id = vt.Vendor_type_id
                              WHERE vs.Vendor_id = ".$vendor_id."");
    $result_array = $query->result_array();
    return $result_array;

  }

  public function add($data)
    {

      $date = date('Y-m-d H:i:s');
      $sql = 'insert into vendors(Vendor_name,Vendor_description,Vendor_starting_price,Vendor_address,User_id,City,CreatedOn,Vendor_lat,Vendor_long) VALUES("'.$data['Vendor_name'].'","'.$data['Vendor_description'].'","'.$data['Vendor_starting_price'].'","'.$data['Vendor_address'].'","'.$data['User_id'].'","'.$data['city'].'","'.$date.'","'.$data['Vendor_lat'].'","'.$data['Vendor_long'].'")';
      $this->db->query($sql);
      $lastid = $this->db->insert_id();
      if(isset($data['Vendor_type']))
      {
        foreach ($data['Vendor_type'] as $type) {
          if($type == 1)
          {
            $sql = 'UPDATE vendors SET isBanquetHall = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 2)
          {
            $sql = 'UPDATE vendors SET isDecorators = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 3)
          {
            $sql = 'UPDATE vendors SET isDj = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 4)
          {
            $sql = 'UPDATE vendors SET isCatering = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 5)
          {
            $sql = 'UPDATE vendors SET isPhotographer = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 6)
          {
            $sql = 'UPDATE vendors SET isBakeries = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 7)
          {
            $sql = 'UPDATE vendors SET isBridalSaloon = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 8)
          {
            $sql = 'UPDATE vendors SET isInvitation = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 9)
          {
            $sql = 'UPDATE vendors SET isLimousine = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 10)
          {
            $sql = 'UPDATE vendors SET isFlorist = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
        }
      }
      return $lastid;
    }

    public function edit($data)
    {
      $date = date('Y-m-d H:i:s');
      $sql = 'update vendors Set Vendor_name = "'.$data['Vendor_name'].'" ,Vendor_description = "'.$data['Vendor_description'].'" , Vendor_starting_price = "'.$data['Vendor_starting_price'].'", Vendor_address = "'.$data['Vendor_address'].'", User_id = "'.$data['User_id'].'",City = "'.$data['city'].'",ModifiedOn = "'.$date.'" WHERE Vendor_id = "'.$data['vendor_id'].'"';
      $this->db->query($sql);
      if(isset($data['Vendor_type']))
      {
        foreach ($data['Vendor_type'] as $type) {
          if($type == 1)
          {
            $sql = 'UPDATE vendors SET isBanquetHall = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 2)
          {
            $sql = 'UPDATE vendors SET isDecorators = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 3)
          {
            $sql = 'UPDATE vendors SET isDj = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 4)
          {
            $sql = 'UPDATE vendors SET isCatering = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 5)
          {
            $sql = 'UPDATE vendors SET isPhotographer = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 6)
          {
            $sql = 'UPDATE vendors SET isBakeries = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 7)
          {
            $sql = 'UPDATE vendors SET isBridalSaloon = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 8)
          {
            $sql = 'UPDATE vendors SET isInvitation = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 9)
          {
            $sql = 'UPDATE vendors SET isLimousine = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
          elseif($type == 10)
          {
            $sql = 'UPDATE vendors SET isFlorist = 1 WHERE Vendor_id = '.$lastid.'';
            $this->db->query($sql);
          }
        }
      }
    }

    public function get_vendor_images($vendor_id)
    {
      $query = $this->db->query("SELECT Vendor_picture_path FROM vendor_pictures WHERE Vendor_id = ".$vendor_id." AND Is_Deleted = 0");
      $result_array = $query->result_array();
      return $result_array;
    }

    public function get_package_images($package_id)
    {
      $query = $this->db->query("SELECT package_picture_path FROM package_picture WHERE package_id = ".$package_id." AND Is_Deleted = 0");
      $result_array = $query->result_array();
      return $result_array;
    }

    public function add_vendor_services($vendor_id,$service_id,$resut)
    {
      $date = date('Y-m-d H:i:s');
      $sql = 'insert into vendor_service(Vendor_id,Service_id,creation_date,result) VALUES("'.$vendor_id.'","'.$service_id.'","'.$date.'","'.$resut.'")';
      $this->db->query($sql);
      $lastid = $this->db->insert_id();
      return $lastid;
    }

    public function edit_vendor_services($vendor_id,$service_id,$resut)
    {
      $sql = 'update vendor_service set result = "'.$resut.'" where Vendor_id="'.$vendor_id.'" and Service_id="'.$service_id.'"';
      return $this->db->query($sql);
    }

    public function add_image_path($vendor_id,$path,$is_pp)
    {
      $sql = 'insert into vendor_pictures(Vendor_id,Vendor_picture_path,Is_profile_pic) VALUES("'.$vendor_id.'","'.$path.'","'.$is_pp.'")';
       return $this->db->query($sql);
    }

    public function delete_image_path($path)
    {
      $sql = 'update vendor_pictures set Is_Deleted = 1 where Vendor_picture_path = "'.$path.'"';
      return $this->db->query($sql);
    }

    public function get_vendor_picture_by_id($vendor_id)
    {
      $query = $this->db->query("SELECT * FROM vendor_pictures vp where vp.Vendor_id = ".$vendor_id." AND Is_Deleted = 0");
      $result_array = $query->result_array();
      return $result_array;
    }

    public function get_vendor_id_by_user_id($User_id)
    {
      $sql = 'Select Vendor_id from vendors where User_id = '.$User_id.'';
      $query = $this->db->query($sql);
      $result_array = $query->row_array();
      return $result_array;
    }

    public function packageadd($data)
    {
      $date = date('Y-m-d H:i:s');
      $sql = 'insert into package(Package_title,Package_description,Package_category,Package_price,Vendor_id,CreatedOn) VALUES("'.$data['Package_title'].'","'.$data['Package_description'].'","'.$data['Package_category'].'","'.$data['Package_price'].'","'.$data['vendor_id'].'","'.$date.'")';
      $this->db->query($sql);
      $lastid = $this->db->insert_id();
      return $lastid;
    }

    public function packageedit($data)
    {
      $sql = 'update package set Package_title = "'.$data['Package_title'].'", Package_description = "'.$data['Package_description'].'", Package_category = "'.$data['Package_category'].'", Package_price ="'.$data['Package_price'].'" where Package_id= "'.$data['Package_id'].'" ';
      return $this->db->query($sql);
    }

    public function add_package_image_path($package_id,$path)
    {
      $sql = 'insert into package_picture(package_id,package_picture_path) VALUES("'.$package_id.'","'.$path.'")';
       return $this->db->query($sql);
    }

    public function get_all_package($vendor_id)
    {
      $query = $this->db->query("SELECT *,(SELECT pp.package_picture_path FROM package_picture pp WHERE pp.package_id = p.Package_id LIMIT 1) AS package_picture_path
                                FROM package p
                                WHERE p.Vendor_id =".$vendor_id."");
      $result_array = $query->result_array();
      return $result_array;
    }

    public function get_package_by_id($package_id)
    {
      $query = $this->db->query("SELECT *
                                FROM package p
                                WHERE p.Package_id =".$package_id."");
      $result_array = $query->row_array();
      return $result_array;
    }

    public function delete_package_picture($filepath)
    {
      $sql = 'update package_picture set Is_Deleted = 1 where package_picture_path = "'.$filepath.'"';
       return $this->db->query($sql);
    }
}


?>
