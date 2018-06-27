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
            <?php $IsVendor = $this->session->userdata('IsVendor');
             if($IsVendor==1 &&  count($vendor_id) == 0 ){ ?>
              <div class="main-form">
                <div id="msg"></div>
      <div class="content">
       <div class="container">

           <div class="form-body">
             <form id="vendor_add"  action="save" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
               <!--STEP ONE
               ==============-->
               <section>
                   <div class="step-one">

                           <h2>Tell Us About Your <br><strong>Business</strong></h2>
                           <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                              <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor General Information</h3>
                              <div class="panel-body">
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name">Name <span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-xs-12">
                                    <input type="text" id="Vendor_name" name="Vendor_name" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Description<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-xs-12">
                                    <textarea type="text" id="Vendor_description" name="Vendor_description" required="required" style="min-height: 150px;" class="form-control col-md-7 col-xs-12"></textarea>
                                  </div>
                                </div>

                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Logo / Profile Picture<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-xs-12">
                                    <img id="blah" class="img-responsive img-circle" style="max-height: 110px !important; max-width: 110px !important;" src="../images/avatar.png" alt="your image" />
                                    <input type="file" id="Vendor_picture" name="Vendor_picture" required="required" onchange="readURL(this);">
                                  </div>
                                </div>

                                  <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name">Category<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-xs-12">
                                      <div class="col-md-6 col-sm-12">
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="1" data-label="Banquet Hall" required>
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="2" data-label="Decorators" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="3" data-label="Dj" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="4" data-label="Catering" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="5" data-label="Photographer" >
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="6" data-label="Bakeries" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="7" data-label="Bridal Saloon" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="8" data-label="Invitation" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="9" data-label="Limousine" >
                                         <input type="checkbox" class="switch" name="Vendor_type[]" value="10" data-label="Florist" >
                                     </div>
                         </div>
                       </div>
                                <div class="form-group" >
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Starting Price<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-xs-12 input-group mb-2 mr-sm-2 mb-sm-0" style="padding-left: 15px;">
                                    <div class="input-group-addon">Rs:</div>
                                    <input type="number" id="Vendor_starting_price" placeholder="Price" name="Vendor_starting_price" required="required" class="form-control col-md-7 col-xs-12">
                                    <div class="input-group-addon">Per Event</div>
                                  </div>
                                </div>

                      				</div>
                      			</div>
                            <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                              <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor Location</h3>

                              <div class="panel-body">
                                <div class="warning">
                                  <p><strong>Note!</strong> First pin your address. Secondly change your address with the <strong>Postal address</strong>.</p>
                                </div>
                      					<div class="form-group ">
                                  <label class="control-label form-control-sm col-md-3 col-sm-3 col-xs-12" for="product-name"></label>
                                  <div class="col-md-5 col-xs-12">
                                    <input type="button" id="btnloc" name="" required="required" class="form-control btn btn-warning" data-toggle="modal" data-target="#setLoc" value="Pin Your Address">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Address <span class="required">*</span>
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text" id="Vendor_address" name="Vendor_address" required="required" class="form-control col-md-7 col-xs-12">
                      							<input type="hidden" id="Vendor_lat" name="Vendor_lat" value="0">
                      							<input type="hidden" id="Vendor_long" name="Vendor_long" value="0">
                      						</div>
                      					</div>
                      					<div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">City<span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" required="required" name="city" >
                                      <option value="">Select City</option>
                                      <?php if(isset($get_all_city) && count($get_all_city)>0){
                                        foreach ($get_all_city as $city) {
                                        ?>
                                        <option value="<?php echo $city['city_id']?>"><?php echo $city['city_name']?></option>
                                        <?
                                        }
                                      } ?>

                                    </select>
                                  </div>
                                </div>
                      				</div>
                                </div>
                                <div >
                                    <h2>Tell Us About Your <br><strong>Services</strong></h2>
                                    <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">

                                     <div class="panel-body" id="panel-body-vendor-service">

                                     </div>
                                   </div>
                                </div>
                                <div >
                                    <h2>Frequently Asked <br><strong>Questions</strong></h2>
                                    <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">

                                     <div class="panel-body" id="panel-body-service">

                                     </div>
                                   </div>
                                </div>
                          <input type="hidden" name="User_id" value="<?php echo $this->session->userdata('User_id') ?>">
                          <button class="btn btn-default pull-right next-2" >Save & Continue.</button>

                   </div>
               </section>
               </form>
              <section>
                <div class="step-three" style="display:none">
                    <h2>Upload Your <br><strong>Images</strong></h2>
                <form id="vendor_pic" class="dropzone"  action="../Vendor/file_upload" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
          					<input type="hidden" id="vendor_id" name="vendor_id" value="">
          			</form>
                <button id="img_upload" class="btn btn-default pull-right next-3">Save & Finish</button>
                <button id="sbmtbtn" class="btn btn-default pull-left prev-2">Previous Step</button>

              </div>
            </section>

             </div>
         </div>
       </div>
  </div>
          <?php }
          elseif($IsVendor==1 && isset($vendor_id) && count($vendor_id)>0 ) {
            ?>
            <div class="container">
            <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar-o"></i> Total Events</span>
              <div class="count">10</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar-o"></i> Booked Events</span>
              <div class="count">123.50</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar-o"></i> Pending Events</span>
              <div class="count green">2,500</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Packages</span>
              <div class="count">4,567</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Active Packages</span>
              <div class="count">4,567</div>
            </div>
          </div>
          <div class="clearfix"></div>
            </div>
            <?php
          }
          else {
            ?>
            <div class="container">
              <div class="alert alert-info">
                  Please <a data-toggle="modal" data-target="#eventdetail"><strong>click here</strong></a> to provide information about your event.
              </div>
              <div id="timecounter" class="col-md-12 clock"></div>

              <h1><span>Plan your event with us</span></h1>
              <div>
                <div class="col-md-12" style="margin-top:30px;">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#home"><b>Dashboard</b></a></li>
                    <li><a data-toggle="tab" href="#menu1"><b>Budget Calculator</b></a></li>
                    <li><a data-toggle="tab" href="#menu2"><b>Guest List</b></a></li>
                    <li><a data-toggle="tab" href="#menu3"><b>Todo's</b></a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <h3>Wedding Planning</h3>
                      Planning a wedding involves endless details, deadlines, family drama, and far too often enough stress to make you want to just elope. Use our planning checklist, read our budgeting tips, and look into a wedding planner to help you pull it all together.
                    </div>

                    <div id="menu1" class="tab-pane fade">
                      <h3>Budget Calculator</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>

                    <div id="menu2" class="tab-pane fade">
                      <h3>Guest List</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>

                    <div id="menu3" class="tab-pane fade">
                      <h3>Todo's</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="eventdetail" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h1 class="modal-title vendor_contact_header" style="margin:0px;"><b>Tell Us About Your Event</b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="main-form">
                         <div class="content" style="padding:0px;">
                          <div class="container" style="width:100%;" >
                            <div class="form-body">
                              <form action="#">
                                  <div class="form-group">
                                      <label for="eventtype" class="col-sm-5 control-label">Event Type</label>
                                      <div class="col-sm-7">
                                          <select name="eventtype" class="form-control" required>
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
                                      <label for="zip" class="col-sm-5 control-label">Event City</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" placeholder="City" name="city" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="zip" class="col-sm-5 control-label">Event Address</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" placeholder="Address" name="address" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="guestexpect" class="col-sm-5 control-label">Guest Expected</label>
                                      <div class="col-sm-7">
                                          <select name="guesexpected" class="form-control" required>
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
                                          <input type="text" class="form-control datepicker" required name="eventdate" placeholder="MM-DD-YYYY">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-7">
                                        <button style="padding:0px" class="form-control" name="Submit">Save</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
              </div>
            </div>
            <?php
          }?>

    </div>
  </section>
  <div id="setLoc" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please drag the pointer to your address.</h4>
        </div>
        <div class="modal-body">
          <div id="mapCanvas"></div>
        </div>
      </div>
    </div>
</div>
  <script type="text/javascript">

  var myDropzone = new Dropzone('#vendor_pic', {
        autoProcessQueue:false,
        paramName: "myFiles",
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFiles: 6,
        acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
        parallelUploads: 6,
        init: function() {
          var myDropzone = this;

          $("#img_upload").click(function() {
            setTimeout(function(){
                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue();
                }
            }, 500);
          });

          myDropzone.on("success", function(files,response) {
						window.location.href = '';
							console.log(response);
          });
        }
});

  var geocoder = new google.maps.Geocoder();

  function geocodePosition(pos) {
    geocoder.geocode({
      latLng: pos
    }, function(responses) {
  		debugger;
      if (responses && responses.length > 0) {
        updateMarkerAddress(responses[0].formatted_address,responses[4].formatted_address.split(',')[0]);
      } else {
        updateMarkerAddress('Cannot determine address at this location.','');
      }
    });
  }

  function updateMarkerStatus(str) {
    document.getElementById('Vendor_address').value = str;
  }

  function updateMarkerPosition(latLng) {
  	document.getElementById('Vendor_lat').value = latLng.lat();
  	document.getElementById('Vendor_long').value = latLng.lng();
  }

  function updateMarkerAddress(str,city) {
    document.getElementById('Vendor_address').value = str;
  	document.getElementById('city').value = city;
  }

  function initialize() {
    var latLng = new google.maps.LatLng(31.504214566890944, 74.33143593652346
      );
    var map = new google.maps.Map(document.getElementById('mapCanvas'), {
      zoom: 11,
      center: latLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
      position: latLng,
  		icon:{path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,scale:7},
      title: 'Your Location',
      map: map,
      draggable: true
    });

    // Update current position info.
  	//debugger;
  	//google.maps.event.trigger(map,'resize');
    updateMarkerPosition(latLng);
    geocodePosition(latLng);

    // Add dragging event listeners.
    google.maps.event.addListener(marker, 'dragstart', function() {
      updateMarkerAddress('Dragging...');
    });

    google.maps.event.addListener(marker, 'drag', function() {
      updateMarkerStatus('Dragging...');
      updateMarkerPosition(marker.getPosition());
    });

    google.maps.event.addListener(marker, 'dragend', function() {
      updateMarkerStatus('Drag ended');
      geocodePosition(marker.getPosition());
    });


  	// /google.maps.event.trigger(map,'resize');
  }

  // Onload handler to fire off the app.
  $('#setLoc').on('shown.bs.modal', function(){
  	debugger;
  initialize();
  });
  //google.maps.event.addDomListener(window, 'load', initialize);

  /*$(document).ready(function() {
  	$('#btnloc').click(function() {
  		debugger;
  		//$('#mapCanvas').height('300px');
  		google.maps.event.trigger(mapCanvas,'resize');
  	});
  });*/
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  <?php include_once('application/views/footer.php'); ?>
</body>
</html>
