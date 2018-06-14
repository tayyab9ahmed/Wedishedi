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
          <!--STEP ONE
          ==============-->
          <section>
              <div class="step-one">
                <h2>Your <br><strong>Profile Information</strong></h2>
                <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                   <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">User Information</h3>
                   <div class="panel-body">
                     <div class="form-group" >
                     <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Name</b></div>
                     <div class="col-md-8 col-xs-12"><?php echo ''.$user_detail['User_fname'].' '.$user_detail['User_lname'].''; ?></div>
                   </div>
                   <div class="form-group" >
                     <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Email</b></div>
                     <div class="col-md-8 col-xs-12"><?php echo $user_detail['User_email']; ?></div>
                    </div>
                   <div class="form-group" >
                     <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Phone number</b></div>
                     <div class="col-md-8 col-xs-12"><?php echo $user_detail['User_phone_no']; ?></div>
                  </div>
                  <div class="form-group" >
                    <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Contact Preference</b></div>
                    <div class="col-md-8 col-xs-12"><?php if($user_detail['User_contact_preference'] == 1){ echo 'Phone and Email';}elseif($user_detail['User_contact_preference'] == 2){echo 'Phone';}elseif($user_detail['User_contact_preference'] == 3){echo 'Email';}?></div>
                 </div>

                   </div>
                 </div>
                      <h2>Your <br><strong>Business Details</strong></h2>
                      <button class="btn btn-success pull-left" style="width:220px; " ><a href="../Vendor/detail/<?php echo $vendor_id;?>" style="color: white"><span>Preview Vendor Details</span></a></button>
                      <button class="btn btn-success pull-right" style="width:220px; background-color: #5cb85c; border-color: #4cae4c;" ><i class="fa fa-edit"></i><a href="../Vendor/edit" style="color: white"><span>Edit Vendor Details</span></a></button>
                      <!---<div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                         <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor General Information</h3>
                         <div class="panel-body">
                             <div class="form-group" >
                               <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Vendor Types</b><span class="required">*</span>
                               </div>
                               <div class="col-md-9 col-xs-12">
                                 <div class="col-md-6 col-sm-12">
                                    <?php
                                    if($vendor_detail['isBanquetHall'] == 1)
                                    {
                                      echo 'Banquet Hall';
                                    }
                                    if($vendor_detail['isDecorators'] == 1)
                                    {
                                      echo '<br>'.'Decorators';
                                    }
                                    if($vendor_detail['isCatering'] == 1)
                                    {
                                      echo '<br>'.'Catering';
                                    }
                                    if($vendor_detail['isPhotographer'] == 1)
                                    {
                                      echo '<br>'.'Photographer';
                                    }
                                    if($vendor_detail['isBakeries'] == 1)
                                    {
                                      echo '<br>'.'Bakeries';
                                    }
                                    if($vendor_detail['isBridalSaloon'] == 1)
                                    {
                                      echo '<br>'.'BridalSaloon';
                                    }
                                    if($vendor_detail['isInvitation'] == 1)
                                    {
                                      echo '<br>'.'Card Invitation';
                                    }
                                    if($vendor_detail['isLimousine'] == 1)
                                    {
                                      echo '<br>'.'Limousine';
                                    }
                                    if($vendor_detail['isFlorist'] == 1)
                                    {
                                      echo '<br>'.'Florist';
                                    }
                                    ?>
                                  </div>
                              </div>
                            </div>

                           <div class="form-group" >
                             <div class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name"><b>Vendor Name</b>
                             </div>
                             <div class="col-md-8 col-xs-12">
                               <?php echo $vendor_detail['Vendor_name']; ?>
                             </div>
                           </div>
                           <div class="form-group" >
                             <div class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name"><b>Vendor Contact #</b><span class="required">*</span>
                             </div>
                             <div class="col-md-8 col-xs-12">
                               <?php echo $vendor_detail['Vendor_contact_no']; ?>
                             </div>
                           </div>
                           <div class="form-group" >
                             <div class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name"><b>Vendor Email</b><span class="required">*</span>
                             </div>
                             <div class="col-md-8 col-xs-12">
                               <?php echo $vendor_detail['Vendor_email_address']; ?>
                             </div>
                           </div>

                         </div>
                       </div>
                       <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                         <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor Location</h3>
                         <div class="panel-body">
                           <div class="form-group">
                             <div class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name"><b>Vendor Address</b>
                             </div>
                             <div class="col-md-8">
                              <?php echo $vendor_detail['Vendor_address']; ?>
                             </div>
                           </div>
                           <div class="form-group">
                             <div class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name"><b>City</b>
                             </div>
                             <div class="col-md-8 col-xs-12">
                               <?php echo $vendor_detail['City']; ?>
                             </div>
                           </div>
                         </div>
                           </div>
                           <div >
                               <h2>Your <br><strong>Services</strong></h2>
                               <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">

                                <div class="panel-body" id="panel-body-service">
                                  <?php
                                  if(isset($vendor_services) && count($vendor_services) > 0)
                                  {
                                    $prev = 0;
                                    $new = 0;
                                    foreach ($vendor_services as $key) {
                                    $new = $key['Vendor_type_id'];
                                    if($new != $prev)
                                    {
                                    ?>

                                    <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;"><? echo $key['Vendor_type_name']; ?></h3>
                                  <? } ?>
                                    <div class="form-group">
                                      <div class="control-label col-md-6 col-sm-6 col-xs-12" for="product-name"><b><? echo $key['Service_title']; ?></b>
                                      </div>
                                      <div class="col-md-3 col-sm-3 col-xs-12">
                                        <? echo $key['result']; ?>
                                      </div>
                                    </div>
                                    <?
                                    $prev = $key['Vendor_type_id'];
                                    }
                                  }
                                   ?>
                                </div>
                              </div>
                           </div>

                           <div >
                               <h2>Your <br><strong>Images</strong></h2>
                               <div class="">
                                 <?php foreach ($vendor_picture as $key) {
                                ?>
                                 <div class="col-md-4">
                                   <img style="width:250px; height:200px;" src="../images/vendortesting/<?php echo $key['Vendor_picture_path']; ?>" class="img-responsive" alt="">
                                 </div>
                               <? } ?>
                               </div>
                             </div>--->

                     <input type="hidden" name="User_id" value="<?php echo $this->session->userdata('User_id') ?>">


              </div>
          </section>
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
