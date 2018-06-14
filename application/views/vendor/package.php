<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedding Manager</title>
</head>

<body>

    <!--Header Starts
    ==================-->
    <?php include_once('application/views/header.php'); ?>

    <section>

      <div class="vendor">
          <div class="content">
            <div class="main-form">
              <div class="content">
               <div class="container">
                <div class="form-body">
                    <button style="width:220px; background-color: #5cb85c; border-color: #4cae4c;" class="btn btn-success pull-right"><i class="fa fa-plus"></i><a href="<?php echo base_url()?>Vendor/addpackage" style="color: white">  Add Package</a></button>
                    <h2><strong>My Packages</strong></h2>
                    <div class="content">
                    <? if(isset($get_all_package) && count($get_all_package) >0)
                    {?>
                      <div class="col-md-12" style="margin-bottom: 25px;">
                      <h3 class="vendor_name"><?php echo count($get_all_package); ?> record found.</h3>
                      </div>
                      <?
                      foreach($get_all_package as $package)
                      {
                        ?>


                        <div class="col-md-12 package-box">
                          <div class="col-md-4">
                          <img style="height:170px;" src="<?php echo base_url() ; ?>images/packagetesting/<?php echo $package['package_picture_path']; ?>" class="img-responsive" alt="">
                          </div>
                          <div class="col-md-4">

                              <h3 class="vendor_name" style="font-size: 25px"><b><?php echo $package['Package_title']; ?></b></h3>

                              <div class="col-xs-12">
                                <span style="font-size:15px; padding-left:15px; color:#aa6708;"><b><?php echo $package['Package_description'] ; ?></b></span>
                              </div>
                              <hr>

                        </div>
                        <div class="col-md-2">
                          <div class="row">
                            <div class="pull-right starring_price">Rs <? echo $package['Package_price']?></div>
                          </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 10px;">
                          <a href="<?php echo base_url()?>Vendor/editpackage/<?php echo $package['Package_id']; ?>" style="color: grey ; padding-left: 40px;"><i class="fa fa-edit"></i> <strong>Edit</strong></a>
                        </div>
                        </div>
                        <?
                      }
                    }
                    else {
                      ?>
                      <div class="col-md-12">
                      <h3 class="vendor_name">0 record found.</h3>
                      </div>
                      <?
                    }?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
      </section>
      <?php include_once('application/views/footer.php'); ?>
    </body>
    </html>
