<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotation</title>
</head>
<body>

    <!--Header Starts
    ==================-->
    <?php include_once('application/views/header.php'); ?>


<!--    form part
   =================-->
   <div class="main-form">
      <div class="content">
       <div class="container">

           <div class="form-header">
               <div class="col-md-4 col-sm-12 active" id="step1">
                   <h4>STEP ONE</h4>
               </div>
               <div class="col-md-4 col-sm-12" id="step2">
                   <h4>STEP TWO</h4>
               </div>
               <div class="col-md-4 col-sm-12" id="step3">
                   <h4>STEP THREE</h4>
               </div>
           </div>

           <div class="form-body">

               <!--STEP ONE
               ==============-->
               <section>
                   <div class="step-one">
                       <form action="#">
                           <h2>Tell Us About Your Event</h2>

                           <div class="form-group">
                               <label for="eventtype" class="col-sm-5 control-label">Event Type</label>
                               <div class="col-sm-7">
                                   <select name="eventtype" class="form-control">
                                       <option value="">Select Event</option>
                                       <option value="">Wedding</option>
                                       <option value="">Corporate Function</option>
                                       <option value="">Birthday</option>
                                       <option value="">Anniversary</option>
                                       <option value="">Holiday Party</option>
                                   </select>
                               </div>
                           </div>



                           <div class="form-group">
                               <label for="zip" class="col-sm-5 control-label">Event Zone</label>
                               <div class="col-sm-7">
                                   <input type="text" class="form-control" placeholder="5 Digit ZIP" name="zip">
                               </div>
                           </div>


                           <div class="form-group">
                               <label for="guestexpect" class="col-sm-5 control-label">Guest Expected</label>
                               <div class="col-sm-7">
                                   <select name="guesexpected" class="form-control">
                                       <option value="">How Many</option>
                                       <option value="">Less Than 10</option>
                                       <option value="">10 - 50</option>
                                       <option value="">50 - 100</option>
                                       <option value="">100 - 200</option>
                                       <option value="">200 - 300</option>
                                       <option value="">300 - 400</option>
                                       <option value="">400 - 500</option>
                                       <option value="">500 or More</option>
                                   </select>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="eventdate" class="col-sm-5 control-label">Event Date</label>
                               <div class="col-sm-7">
                                   <input type="text" class="form-control datepicker" name="eventdate" placeholder="MM-DD-YYYY">
                               </div>
                           </div>

                           <h2 style="margin-top: 80px;">Do You Also Need Quotes <br> For Other Services?</h2>

                           <div class="col-md-6 col-sm-12">
                               <input type="checkbox" class="switch" data-label="Bakeries" >
                               <input type="checkbox" class="switch" data-label="Beauty Salons And Spas" >
                               <input type="checkbox" class="switch" data-label="Bridal Salons" >
                               <input type="checkbox" class="switch" data-label="Catering" >
                               <input type="checkbox" class="switch" data-label="Decorations" >
                               <input type="checkbox" class="switch" data-label="DJ" >
                               <input type="checkbox" class="switch" data-label="Favors" >
                               <input type="checkbox" class="switch" data-label="Florists" >
                               <input type="checkbox" class="switch" data-label="Invitations" >
                           </div>

                           <div class="col-md-6 col-sm-12">
                               <input type="checkbox" class="switch" data-label="Limousine" >
                               <input type="checkbox" class="switch" data-label="Musician" >
                               <input type="checkbox" class="switch" data-label="Novelty Entertainment" >
                               <input type="checkbox" class="switch" data-label="Officiants" >
                               <input type="checkbox" class="switch" data-label="Party Rentals" >
                               <input type="checkbox" class="switch" data-label="Tuxedos" >
                               <input type="checkbox" class="switch" data-label="Photographers" >
                               <input type="checkbox" class="switch" data-label="Videographers" >
                               <input type="checkbox" class="switch" data-label="Wedding Event Planners" >
                           </div>



                       </form>
                       <button class="btn btn-default pull-right next-2">Next Step</button>
                   </div>
               </section>

               <!--STEP TWO
               ===============-->

               <section>
                   <div class="step-two" style="display:none">
                       <h2>Tell Us About Your Needs</h2>
                       <form action="#">

                           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Banquet Facilites
                                    </a>
                                    <i class="fa fa-times-circle-o closebutton pull-right" aria-hidden="true" style="pointer: cursor"></i>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">

                                    <div class="form-group">
                                       <label for="banquet-budget" class="col-sm-5 control-label">Budget</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-budget" class="form-control">
                                               <option value="">Select Budget</option>
                                               <option value="">Less Than $500</option>
                                               <option value="">$500 - $1000</option>
                                               <option value="">$1000 - $2000</option>
                                               <option value="">$2000 - $3000</option>
                                               <option value="">$3000 - $4000</option>
                                               <option value="">$4000 - $5000</option>
                                               <option value="">$5000 - $6000</option>
                                               <option value="">$6000 or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-time" class="col-sm-5 control-label">Time Needed</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-time" class="form-control">
                                               <option value="">--Start Time--</option>
                                               <option value="">7:00 AM</option>
                                               <option value="">8:00 AM</option>
                                               <option value="">10:00 AM</option>
                                               <option value="">11:00 AM</option>
                                               <option value="">1:00 PM</option>
                                               <option value="">2:00 PM</option>
                                               <option value="">4:00 PM</option>
                                               <option value="">5:00 PM</option>
                                               <option value="">7:00 PM</option>
                                           </select>
                                           <select name="banquet-duration" class="form-control">
                                               <option value="">--How Long--</option>
                                               <option value="">1 Hour</option>
                                               <option value="">2 Hours</option>
                                               <option value="">3 Hours</option>
                                               <option value="">4 Hours</option>
                                               <option value="">5 Hours</option>
                                               <option value="">6 Hours</option>
                                               <option value="">6 Hours or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="" class="col-sm-5 control-label">Type of Venue</label>
                                       <div class="col-sm-7">
                                           <input type="checkbox" class="switch" data-label="Banquet Hall" >
                                           <input type="checkbox" class="switch" data-label="Hotel or Resort" >
                                           <input type="checkbox" class="switch" data-label="Country Club" >
                                           <input type="checkbox" class="switch" data-label="Restaurant" >
                                           <input type="checkbox" class="switch" data-label="Mansion" >
                                           <input type="checkbox" class="switch" data-label="Yacht" >
                                           <input type="checkbox" class="switch" data-label="Limousine" >
                                       </div>
                                   </div>


                                    <div class="form-group">
                                       <label for="banquet-guest" class="col-sm-5 control-label">Number of Guests</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-guest" class="form-control">
                                               <option value="">How Many</option>
                                               <option value="">Less Than 10</option>
                                               <option value="">10 - 50</option>
                                               <option value="">50 - 100</option>
                                               <option value="">100 - 200</option>
                                               <option value="">200 - 300</option>
                                               <option value="">300 - 400</option>
                                               <option value="">400 - 500</option>
                                               <option value="">500 or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-comment" class="col-sm-5 control-label">Comments</label>
                                       <div class="col-sm-7">
                                           <textarea name="banquet-comment" cols="20" rows="5" placeholder="Any Special Requests or Needs..."></textarea>
                                       </div>
                                   </div>

                                  </div>
                                </div>
                              </div>


                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                      Catering
                                    </a>
                                    <i class="fa fa-times-circle-o closebutton pull-right" aria-hidden="true" style="pointer: cursor"></i>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="panel-body">

                                    <div class="form-group">
                                       <label for="banquet-budget" class="col-sm-5 control-label">Budget</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-budget" class="form-control">
                                               <option value="">Select Budget</option>
                                               <option value="">Less Than $500</option>
                                               <option value="">$500 - $1000</option>
                                               <option value="">$1000 - $2000</option>
                                               <option value="">$2000 - $3000</option>
                                               <option value="">$3000 - $4000</option>
                                               <option value="">$4000 - $5000</option>
                                               <option value="">$5000 - $6000</option>
                                               <option value="">$6000 or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-time" class="col-sm-5 control-label">Time Needed</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-time" class="form-control">
                                               <option value="">--Start Time--</option>
                                               <option value="">7:00 AM</option>
                                               <option value="">8:00 AM</option>
                                               <option value="">10:00 AM</option>
                                               <option value="">11:00 AM</option>
                                               <option value="">1:00 PM</option>
                                               <option value="">2:00 PM</option>
                                               <option value="">4:00 PM</option>
                                               <option value="">5:00 PM</option>
                                               <option value="">7:00 PM</option>
                                           </select>
                                           <select name="banquet-duration" class="form-control">
                                               <option value="">--How Long--</option>
                                               <option value="">1 Hour</option>
                                               <option value="">2 Hours</option>
                                               <option value="">3 Hours</option>
                                               <option value="">4 Hours</option>
                                               <option value="">5 Hours</option>
                                               <option value="">6 Hours</option>
                                               <option value="">6 Hours or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="" class="col-sm-5 control-label">Type of Venue</label>
                                       <div class="col-sm-7">
                                           <input type="checkbox" class="switch" data-label="Banquet Hall" >
                                           <input type="checkbox" class="switch" data-label="Hotel or Resort" >
                                           <input type="checkbox" class="switch" data-label="Country Club" >
                                           <input type="checkbox" class="switch" data-label="Restaurant" >
                                           <input type="checkbox" class="switch" data-label="Mansion" >
                                           <input type="checkbox" class="switch" data-label="Yacht" >
                                           <input type="checkbox" class="switch" data-label="Limousine" >
                                       </div>
                                   </div>


                                    <div class="form-group">
                                       <label for="banquet-guest" class="col-sm-5 control-label">Number of Guests</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-guest" class="form-control">
                                               <option value="">How Many</option>
                                               <option value="">Less Than 10</option>
                                               <option value="">10 - 50</option>
                                               <option value="">50 - 100</option>
                                               <option value="">100 - 200</option>
                                               <option value="">200 - 300</option>
                                               <option value="">300 - 400</option>
                                               <option value="">400 - 500</option>
                                               <option value="">500 or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-guest" class="col-sm-5 control-label">Number of Guests</label>
                                       <div class="col-sm-7 radiocheck">
                                           <div class="radio">
                                              <label>
                                                Yes
                                              </label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                No
                                              </label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            </div>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-comment" class="col-sm-5 control-label">Comments</label>
                                       <div class="col-sm-7">
                                           <textarea name="banquet-comment" cols="20" rows="5" placeholder="Any Special Requests or Needs..."></textarea>
                                       </div>
                                   </div>

                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                      Bakeries
                                    </a>
                                    <i class="fa fa-times-circle-o closebutton pull-right" aria-hidden="true" style="pointer: cursor"></i>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">

                                    <div class="form-group">
                                       <label for="banquet-budget" class="col-sm-5 control-label">Budget</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-budget" class="form-control">
                                               <option value="">Select Budget</option>
                                               <option value="">Less Than $500</option>
                                               <option value="">$500 - $1000</option>
                                               <option value="">$1000 - $2000</option>
                                               <option value="">$2000 - $3000</option>
                                               <option value="">$3000 - $4000</option>
                                               <option value="">$4000 - $5000</option>
                                               <option value="">$5000 - $6000</option>
                                               <option value="">$6000 or More</option>
                                           </select>
                                       </div>
                                   </div>



                                   <div class="form-group">
                                       <label for="banquet-time" class="col-sm-5 control-label">Time Needed</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-time" class="form-control">
                                               <option value="">--Start Time--</option>
                                               <option value="">7:00 AM</option>
                                               <option value="">8:00 AM</option>
                                               <option value="">10:00 AM</option>
                                               <option value="">11:00 AM</option>
                                               <option value="">1:00 PM</option>
                                               <option value="">2:00 PM</option>
                                               <option value="">4:00 PM</option>
                                               <option value="">5:00 PM</option>
                                               <option value="">7:00 PM</option>
                                           </select>
                                           <select name="banquet-duration" class="form-control">
                                               <option value="">--How Long--</option>
                                               <option value="">1 Hour</option>
                                               <option value="">2 Hours</option>
                                               <option value="">3 Hours</option>
                                               <option value="">4 Hours</option>
                                               <option value="">5 Hours</option>
                                               <option value="">6 Hours</option>
                                               <option value="">6 Hours or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="" class="col-sm-5 control-label">Type of Venue</label>
                                       <div class="col-sm-7">
                                           <input type="checkbox" class="switch" data-label="Banquet Hall" >
                                           <input type="checkbox" class="switch" data-label="Hotel or Resort" >
                                           <input type="checkbox" class="switch" data-label="Country Club" >
                                           <input type="checkbox" class="switch" data-label="Restaurant" >
                                           <input type="checkbox" class="switch" data-label="Mansion" >
                                           <input type="checkbox" class="switch" data-label="Yacht" >
                                           <input type="checkbox" class="switch" data-label="Limousine" >
                                       </div>
                                   </div>


                                    <div class="form-group">
                                       <label for="banquet-guest" class="col-sm-5 control-label">Number of Guests</label>
                                       <div class="col-sm-7">
                                           <select name="banquet-guest" class="form-control">
                                               <option value="">How Many</option>
                                               <option value="">Less Than 10</option>
                                               <option value="">10 - 50</option>
                                               <option value="">50 - 100</option>
                                               <option value="">100 - 200</option>
                                               <option value="">200 - 300</option>
                                               <option value="">300 - 400</option>
                                               <option value="">400 - 500</option>
                                               <option value="">500 or More</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-guest" class="col-sm-5 control-label">Number of Guests</label>
                                       <div class="col-sm-7 radiocheck">
                                           <div class="radio">
                                              <label>
                                                Yes
                                              </label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                No
                                              </label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            </div>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="banquet-comment" class="col-sm-5 control-label">Comments</label>
                                       <div class="col-sm-7">
                                           <textarea name="banquet-comment" cols="20" rows="5" placeholder="Any Special Requests or Needs..."></textarea>
                                       </div>
                                   </div>

                                  </div>
                                </div>
                              </div>



                           </div>

                       </form>

                           <button class="btn btn-default pull-right next-3">Next Step</button>
                           <button class="btn btn-default pull-left prev-1" style="width: 140px; margin-left: 3%">Previous Step</button>
                   </div>
               </section>

               <!--STEP THREE
               =======================-->

               <section>
                   <div class="step-three" style="display:none">
                       <h2>Tell Us About Your Needs</h2>
                       <form action="">
                           <div class="col-md-6 col-sm-12">

                               <div class="form-group">
                                    <label for="name1" class="col-sm-5 control-label">First Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="First Name" name="name1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name2" class="col-sm-5 control-label">Last Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Last Name" name="name2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-5 control-label">Email</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-sm-5 control-label">Phone Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="preference" class="col-sm-5 control-label">Contact Prefences</label>
                                    <div class="col-sm-7">
                                        <select name="preference" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="">Telephone</option>
                                            <option value="">Email</option>
                                            <option value="">Telephone or Email</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="time" class="col-sm-5 control-label">Best Time to Call</label>
                                    <div class="col-sm-7">
                                        <select name="time" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="">Morning</option>
                                            <option value="">Afternoon</option>
                                            <option value="">Evening</option>
                                            <option value="">Weekend</option>
                                        </select>
                                    </div>
                                </div>
                           </div>

                           <div class="col-md-6 col-sm-12">
                               <div class="confirm">
                                   <div class="header">
                                       <h2 style="line-height:1">CONFIRM YOUR <br> REQUEST WITH</h2>
                                   </div>
                                   <div class="body">
                                       <button class="btn btn-default facebook"><span style="padding-right: 30px"><i class="fa fa-facebook" aria-hidden="true"></i></span>FACEBOOK</button>
                                       <button class="btn btn-default twitter"><span style="padding-right: 25px"><i class="fa fa-twitter" aria-hidden="true"></i></span> TWITTER</button>
                                       <button class="btn btn-default google"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span> GOOGLE+</button>

                                       <p>This is just to confirm your request. We will never post anything without your premission.</p>
                                   </div>
                               </div>
                           </div>
                       </form>
                      <button class="btn btn-default pull-left prev-2" style="width: 150px;margin-left: 40px;">Previous Step</button>
                   </div>
               </section>

           </div>

       </div>
       </div>
   </div>



   <!--Footer
    =============-->

    <?php include_once('application/views/footer.php'); ?>
</body>
</html>
