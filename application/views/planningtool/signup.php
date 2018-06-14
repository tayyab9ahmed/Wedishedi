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
    <div class="main-form">
      <div class="content">
       <div class="container">
         <div class="form-body">
    <section>
                       <div class="step-three" style="">
                           <h2><b>Register Your Account</b></h2>
                           <hr>
                           <form id="user_signup" action="save" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
                               <div class="col-sm-12">

                                   <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="text" required class="form-control" placeholder="First Name" name="User_fname" id="User_fname" required="required">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" required class="form-control" placeholder="Last Name" name="User_lname" id="User_lname" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="email" required class="form-control" placeholder="Email" name="User_email" id="User_email" data-fv-remote-name="User_email" required="required">
                                            <span id='message_phone'></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="text" required id="phoneNumber" class="form-control" placeholder="Contact Number" name="User_phone_no" id="User_phone_no" required="required">

                                        </div>
                                        <div class="col-sm-6">
                                            <select name="User_contact_preference" id="User_contact_preference" class="form-control" required="required">
                                                <option>Select Contact Preference</option>
                                                <option value="1">Phone and Email</option>
                                                <option value="2">Phone</option>
                                                <option value="3">Email</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="password" required id="User_password" class="form-control" placeholder="Password" name="User_password" required="required">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" required id="confirm_password" placeholder="Confirm Password" class="form-control"  name="confirm_password" required="required">
                                            <span id='message_pass'></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="IsVendor" style="height:30px; width:30px;" data-label="Supplier" >
                                        </div>
                                        <label for="preference" class="col-sm-4 control-label">Are You Supplier ?</label>

                                    </div>


                                    <div class="form-group">
                                      <div class="col-sm-7">
                                      <button class="btn btn-warning pull-left signup" style="width: 150px;margin-left: 268px;">Register</button>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                         <span class="pull-right col-sm-8"><a href="login">Login Existing Account </a> or forgot password</span>
                                    </div>
                               </div>
                               </form>

                       </div>
                   </section>
                 </div>

     </div>
     </div>
 </div>
  <script type="text/javascript">

  </script>
  <?php include_once('application/views/footer.php'); ?>
</body>
</html>
