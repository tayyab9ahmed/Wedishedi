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
        <form id="vendor_add"  action="save" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
         <!--STEP ONE
         ==============-->
         <section>
             <div class="step-one">

                     <h2>Your <br><strong>Business</strong></h2>
                     <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                        <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor General Information</h3>
                        <div class="panel-body">
                            <div class="form-group" >
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name">Vendor Types <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-xs-12">
                                <div class="col-md-6 col-sm-12">
                                   <input type="checkbox" disabled  name="Vendor_type[]" value="1" <? if($vendor_detail['isBanquetHall'] == 1){?> checked<? }?>  required>Banquet Hall<br>
                                   <input type="checkbox" disabled  name="Vendor_type[]" value="2" <? if($vendor_detail['isDecorators'] == 1){?> checked<? }?>  required >Decorators<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="3" <? if($vendor_detail['isDj'] == 1){?> checked<? }?>  required >Dj<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="4" <? if($vendor_detail['isCatering'] == 1){?> checked<? }?>  required>Catering<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="5" <? if($vendor_detail['isPhotographer'] == 1){?> checked<? }?>  required >Photographer<br>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                   <input type="checkbox" disabled name="Vendor_type[]" value="6"  <? if($vendor_detail['isBakeries'] == 1){?> checked<? }?>  required>Bakeries<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="7" <? if($vendor_detail['isBridalSaloon'] == 1){?> checked<? }?>  required>Bridal Saloon<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="8"  <? if($vendor_detail['isInvitation'] == 1){?> checked<? }?>  required>Invitation<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="9" <? if($vendor_detail['isLimousine'] == 1){?> checked<? }?>   required>Limousine<br>
                                   <input type="checkbox" disabled name="Vendor_type[]" value="10"  <? if($vendor_detail['isFlorist'] == 1){?> checked<? }?>  required>Florist<br>
                               </div>
                   </div>
                 </div>

                          <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-xs-12">
                              <input type="text" id="Vendor_name" name="Vendor_name" value="<?php echo $vendor_detail['Vendor_name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Description<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-xs-12">
                              <textarea type="text" id="Vendor_description" name="Vendor_description" style="min-height:150px;" required="required" class="form-control col-md-7 col-xs-12"><?php echo $vendor_detail['Vendor_description']; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Logo / Profile Picture<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-xs-12">
                              <img id="blah" class="img-responsive img-circle" style="max-height: 110px !important; max-width: 110px !important;" src="../images/vendortesting/<?php echo $vendor_detail['Vendor_picture_path']; ?>" alt="your image" />
                              <a id="remove_file" title="Remove file X">Remove file</a>
                              <input type="hidden" id="remove_file_name" value="<?php echo $vendor_detail['Vendor_picture_path']; ?>">
                              <input type="file" id="Vendor_picture" name="Vendor_picture" onchange="readURL(this);">
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                        <h3 style="background-color: #ff7043;padding: 15px 0px 15px 0px;text-align: center;font-weight: bold;color: white;">Vendor Location</h3>
                        <div class="panel-body">
                          <div class="form-group ">
                            <label class="control-label form-control-sm col-md-3 col-sm-3 col-xs-12" for="product-name"></label>
                            <div class="col-md-5 col-xs-12">
                              <input type="button" id="btnloc" name="" required="required" class="form-control btn btn-warning" data-toggle="modal" data-target="#setLoc" value="Point Your Location">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Vendor Address <span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                              <input type="text" id="Vendor_address" name="Vendor_address" required="required" value="<?php echo $vendor_detail['Vendor_address']; ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="Vendor_lat" name="Vendor_lat" value="0">
                              <input type="hidden" id="Vendor_long" name="Vendor_long" value="0">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">City <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-xs-12">
                              <select class="form-control col-md-7 col-xs-12" required="required" name="city" >
                                <option value="">Select City</option>
                                <?php if(isset($get_all_city) && count($get_all_city)>0){
                                  foreach ($get_all_city as $city) {
                                  ?>
                                  <option <?php if($vendor_detail['City'] == $city['city_id'] ){?> selected="selected" <?} ?>  value="<?php echo $city['city_id']?>"><?php echo $city['city_name']?></option>
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
                    <input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $vendor_detail['Vendor_id']?>">
                    <button class="btn btn-default pull-right next-2" >Save & Continue.</button>

             </div>
         </section>
         </form>
        <section>
          <div class="step-three" style="display:none">
              <h2>Upload Your <br><strong>Images</strong></h2>
              <form id="my-dropzone" class="dropzone"  action="file_upload" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
    					<input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $vendor_detail['Vendor_id']?>">
    			     </form>
          <button id="img_upload" class="btn btn-default pull-right next-3">Save & Finish</button>
          <button id="sbmtbtn" class="btn btn-default pull-left prev-2">Previous Step</button>
        </div>
        </section>


</div>
  </div>
    </div></div>
</div>
</div>
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
<script>
$(window).bind("load", function() {
      $.each($("input[name='Vendor_type[]']:checked"), function(){
        debugger;
        $.ajax({ url: "get_vendor_service_by_id", data:"vendor_id=<?php echo $vendor_detail['Vendor_id']?>&vendor_type_id="+$(this).val()+"", success: function(result){
      $("#panel-body-vendor-service").append(result);
    }});
        $.ajax({ url: "get_vendor_faq_by_id", data:"vendor_id=<?php echo $vendor_detail['Vendor_id']?>&vendor_type_id="+$(this).val()+"", success: function(result){
      $("#panel-body-service").append(result);
    }});
      });
});

$('#remove_file').click(function(){
  var name = $('#remove_file_name').val();
  $.ajax({
      type: 'POST',
      url: '../Vendor/delete_vendor_picture',
      data: "name="+name,
      dataType: 'html'
  });
  $('#blah').attr('src','../images/avatar.png');
  $('#remove_file').hide();
});



Dropzone.options.myDropzone = {
			autoProcessQueue:false,
			paramName: "myFiles",
			uploadMultiple: true,
			addRemoveLinks: true,
			maxFiles: 6,
			acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
			parallelUploads: 6,
			removedfile: function(file) {
			    var name = file.name;
					debugger;
			    $.ajax({
			        type: 'POST',
			        url: 'delete_file',
			        data: "id="+name,
			        dataType: 'html'
			    });
			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			},
				init: function() {
				thisDropzone = this;
				$.get('get_vendor_images?vendor_id=<?php echo $vendor_detail['Vendor_id']?>', function(data) {
						$.each(data, function(key,value){
              debugger;
							var filepath = "<?php echo str_replace('\\', '/',FCPATH);?>images/vendortesting/";
								var mockFile = { name: value.name, size: value.size,status: Dropzone.ADDED,accepted: true };
								thisDropzone.files.push(mockFile);    // add to files array
								thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("thumbnail", mockFile, '../images/vendortesting/'+value.name);
                thisDropzone.emit("complete", mockFile);
						});
				});

				$("#img_upload").click(function() {
					debugger;
					setTimeout(function(){
							if (thisDropzone.getQueuedFiles().length > 0) {
									thisDropzone.processQueue();
							}
					}, 500);
					window.location.href = '<?php echo site_url('vendor') ?>';
				});


				thisDropzone.on("success", function(files,response) {
					window.location.href = 'www.google.com';
						console.log(response);
				});

				}
				};

</script>
<script type="text/javascript">
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
  var latLng = new google.maps.LatLng(<?php echo $vendor_detail['Vendor_lat']?>, <?php echo $vendor_detail['Vendor_long']?>
    );
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 11,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
		icon:{path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,scale:7},
    title: "<?php echo $vendor_detail['Vendor_name'].' - '.$vendor_detail['Vendor_address'] ;?>",
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
