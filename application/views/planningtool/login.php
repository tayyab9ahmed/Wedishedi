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
                           <h2><b>Login To Your Account</b></h2>

                           <form id="user-login" action="login" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
                               <div class="col-md-6 col-sm-12">
                                 <div class="row">
                                   <div class="col-md-12">
                                     <i class="glyphicon glyphicon-user" style="font-size: 150px;margin-left: 125px;"></i>
                                   </div>
                                 </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" placeholder="Email" id="User_email" name="User_email" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="password" placeholder="Password" id="User_password" name="User_password" class="form-control" required="required">
                                        </div>
                                    </div>

                               <div class="form-group">
                                      <button class="btn btn-default login" style="text-align: center;">Let me in</button>
                               </div>
                               <div class="form-group">
                                    <span><a href="signup">Create account </a> or forgot password</span>
                               </div>

                               </div>

                              <div class="col-md-6 col-sm-12">
                                   <div class="confirm">
                                       <div class="header">
                                           <h2 style="line-height:1;color:white">CONFIRM YOUR <br> REQUEST WITH</h2>
                                       </div>
                                       <div class="body">
                                           <button class="btn btn-default google"><span style="padding-right: 25px"><i class="fa fa-google" aria-hidden="true"></i></span> Google</button>


                                           <p>This is just to confirm your request. We will never post anything without your premission.</p>
                                       </div>
                                   </div>
                               </div>

                               </form>

                       </div>
                   </section>
                 </div>

     </div>
     </div>
 </div>

  <?php include_once('application/views/footer.php'); ?>
</body>
</html>
