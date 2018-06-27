<header>
  <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/animate.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/hamburgers.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/demo.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/component.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/normalize.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/switchable.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/datepicker.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/style.css');?>">



  <link rel="stylesheet" href="<?php echo base_url('/css/owl.carousel.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/owl.theme.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/flipclock.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/dropzone.min.css');?>">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap-select.min.css');?>">

  <script src="<?php echo base_url('js/dropzone.min.js');?>"></script>
  <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('js/linkhover.js');?>"></script>
  <script src="<?php echo base_url('js/owl.carousel.min.js');?>"></script>
  <script src="<?php echo base_url('js/waypoint.min.js');?>"></script>
  <script src="<?php echo base_url('js/jquery.counterup.min.js');?>"></script>
  <script src="<?php echo base_url('js/script.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrapvalidator.js');?>"></script>
  <script src="<?php echo base_url('js/flipclock.min.js');?>"></script>
  <script src="<?php echo base_url('js/flipclock.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrap-select.min.js');?>"></script>
  <script src="<?php echo base_url('js/switchable.min.js');?>"></script>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.20&sensor=true&key=AIzaSyDEhDIQB447edZDYjJ-kAg4gnm_zrNDiW0"></script>


    <!--Navbar Starts
    ==================-->
    <nav class="navbar navbar-default">
       <div class="logo12">
       <a href="<?php echo base_url()?>" class="pull-left" style="margin-left: 25px;margin-top: 5px;margin-bottom: 5px"><img style="height:60px;" src="<?php echo base_url('/images/logo.png');?>" alt="logo">

       </a>
        </div>
        <div class="container"><?php $User_id = $this->session->userdata('User_id');?>
          <div class="col-sm-8 col-md-8">
          <form class="navbar-form" action="<?php echo base_url('Vendor/search');?>" role="search">
          <div class="input-group" style=" margin-top: 10px;">
            <div class="col-sm-6 col-md-6">
              <select  class="form-control" required="required" id="vendor_type" name="vendor_type" style="width: 240px;">
                <option value="">Select Vendor Type</option>
              </select>
            </div>
            <div class="col-sm-6 col-md-6">
              <select  class="form-control" required="required" id="vendor_city" name="city" style="width: 180px;">
                <option value="">Select City</option>


              </select>
              <div class="input-group-btn">
                  <button class="btn btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>

          </div>
          </form>
      </div>
            <ul class="nav navbar-nav navbar-right header-menu hidden-xs" style="height: 70px;">
                <li><a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>"><b><span style="color:white;font-size: 12px;">Home</span></b></a></li>
                <li><a style="padding: 10px 0px 0px 0px;" href="#"><b><span style="color:white;font-size: 12px;">Suppliers</span></b></a></li>
                <li><a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>WeddingCost"><b><span style="color:white;font-size: 12px;">Cost</span></b></a></li>
                <!--<li><a href="#"><b><span style="color:white">News</span></b></a></li>-->
                <li><?php if(isset($User_id) && count($User_id)>0)
                      {?>
                    <a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>Welcome/logout"><b><span style="color:white;font-size: 12px;">LogOut</span></b></a>
                    <?php
                      }
                    else
                    {?>
                    <a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>Welcome/login"><b><span style="color:white;font-size: 12px;">Login</span></b></a>
                  <?php }?>
                </li>
            </ul>

        </div>
    </nav>
    <?php if(isset($User_id) && count($User_id)>0)
          {?>
    <div>
      <nav class="bellow-navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li ><a class="subheader" href="#"><i class="fa fa-align-justify"></i><b><span style="font-size: 12px;">Dashboard</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>WeddingCost"><i class="glyphicon glyphicon-floppy-saved"></i><b><span style="font-size: 12px;" >Events</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>/Vendor/package"><i class="	glyphicon glyphicon-edit"></i><b><span style="font-size: 12px;">Packages</span></b></a></li>
                <li ><a class="subheader" href="#"><i class="	glyphicon glyphicon-edit"></i><b><span style="font-size: 12px;">Quote Request</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>Welcome/profile"><i class="fa fa-user"></i><b><span style="font-size: 12px;">Profile</span></b></a></li>
            </ul>

        </div>
      </nav>
    </div>
  <?php }?>

</header>
