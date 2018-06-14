<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Package Edit</title>
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
        <form id="packagesave" class="dropzone"  action="../../Vendor/packagesave" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
          <!--STEP ONE
          ==============-->
          <section>
              <div class="step-one">

                      <h2>Edit<strong> Package</strong></h2>
                      <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                         <div class="panel-body">
                             <div class="form-group" >
                               <div class="col-md-12 col-xs-12">
                                 <input type="text" id="Package_title" value="<?php echo $get_package_by_id['Package_title'];?>" placeholder="Package Headline" name="Package_title" required="required" class="form-control col-md-7 col-xs-12">
                               </div>

                             </div>

                           <div class="form-group" >
                             <div class="col-md-8 col-xs-12">
                               <select required="required" name="Package_category"  class="form-control col-md-7 col-xs-12">
                                   <option value="">Select Category</option>
                                   <?php if(isset($get_all_vendor_type) && count($get_all_vendor_type) > 0)
                                   {
                                     foreach ($get_all_vendor_type as $vendor_type)
                                     {
                                         ?><option <?php if($get_package_by_id['Package_Category'] ==  $vendor_type['Vendor_type_id']){?> selected="selected" <?}?> value="<?php echo $vendor_type['Vendor_type_id']; ?>"><?php echo $vendor_type['Vendor_type_name']; ?></option>

                                     <?php
                                     }
                                   }?>
                               </select>
                             </div>
                           </div>
                           <div class="form-group" >
                             <div class="col-md-12 col-xs-12">
                               <textarea class="form-control resizable_textarea" data-parsley-trigger="keyup" data-parsley-minlength="50" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 100 caracters long description.." data-parsley-validation-threshold="10" id="Package_description" name="Package_description" required="required" class="form-control col-md-7 col-xs-12" placeholder="Briefly describe your package" style="height:150px;"><?php echo $get_package_by_id['Package_description'];?></textarea>
                             </div>
                           </div>
                           <div class="form-group" >
                             <div class="col-md-6 col-xs-12 input-group mb-2 mr-sm-2 mb-sm-0" style="padding-left: 15px;">
                               <div class="input-group-addon">Rs:</div>
                               <input type="text" id="Package_price" value="<?php echo $get_package_by_id['Package_price'];?>" placeholder="Price" name="Package_price" required="required" class="form-control col-md-7 col-xs-12">
                               <div class="input-group-addon">Per head</div>
                             </div>
                           </div>

                         </div>
                       </div>
                       <h2>Upload max 3<strong> Images</strong></h2>
                       <div class="panel panel-primary" style="background-color: #F4F496;border-color: transparent;">
                          <div class="panel-body">
                          </div>
                        </div>

                     <input type="hidden" name="Package_id" value="<?php echo $get_package_by_id['Package_id']; ?>">
                     <input type="hidden" name="vendor_id" value="<?php echo $Vendor_id['Vendor_id']; ?>">
                     <input type="hidden" name="User_id" value="<?php echo $User_id; ?>">

                     <button type="button" style="margin-top: 100px;" id="img_upload" class="btn btn-success pull-right" >Save</button>

              </div>
          </section>
        </form>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
      </section>
      <script>


      var myDropzone = new Dropzone('#packagesave',{
      			autoProcessQueue:false,
      			paramName: "myFiles",
      			uploadMultiple: true,
      			addRemoveLinks: true,
      			maxFiles: 3,
      			acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
      			parallelUploads: 3,
      			removedfile: function(file) {
      			    var name = file.name;
      					debugger;
      			    $.ajax({
      			        type: 'POST',
      			        url: '../delete_package_picture',
      			        data: "name="+name,
      			        dataType: 'html'
      			    });
      			var _ref;
      			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      			},
      				init: function() {
                debugger;
      				var myDropzone = this;
      				$.get('../get_package_images?package_id=<?php echo $get_package_by_id['Package_id']; ?>', function(data) {
      						$.each(data, function(key,value){
                    debugger;
      							var filepath = "<?php echo str_replace('\\', '/',FCPATH);?>images/packagetesting/";
      								var mockFile = { name: value.name, size: value.size,status: Dropzone.ADDED,accepted: true };
      								myDropzone.files.push(mockFile);    // add to files array
      								myDropzone.emit("addedfile", mockFile);
                      myDropzone.emit("thumbnail", mockFile, '../../images/packagetesting/'+value.name);
                      myDropzone.emit("complete", mockFile);
      						});
      				});

      				$("#img_upload").click(function() {
      					debugger;
              //  $('#packagesave').bootstrapValidator('validate');

                setTimeout(function(){
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    }
                    debugger;
                    /*myDropzone.on('sending', function(file, xhr, formData) {
                      // Append all form inputs to the formData Dropzone will POST
                      var data = $('#packagesave').serializeArray();
                      $.each(data, function(key, el) {
                          formData.append(el.name, el.value);
                      });
                  });*/
                }, 500);
                debugger;
                myDropzone.on("success", function(files,response) {
                  debugger;
                  window.location.href = 'http://localhost:8080/Wedishedi/Vendor/package';
                    console.log(response);
                });
                debugger;
      				});

      				}
            });
</script>
      <?php include_once('application/views/footer.php'); ?>

    </body>
    </html>
