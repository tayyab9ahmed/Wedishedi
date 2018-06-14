<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedding Manager</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.20&sensor=true&key=AIzaSyDEhDIQB447edZDYjJ-kAg4gnm_zrNDiW0"></script>
</head>
<body>

    <!--Header Starts
    ==================-->
    <?php include_once('application/views/header.php'); ?>
    <section>
    <div class="vendor">
        <div class="content">
            <div class="container">
              <h1><span>Find The Best Suppliers In Your Area</span></h1>
              <div id="map" style="height:300px; width:100%; "></div>
              <hr>
              <div class="col-md-12 nav-search">
                <form method="post" action="search">
                  <select required="required" name="vendor_type"  class="vendor_search select-left">
                      <option value="">Select Category</option>
                      <?php if(isset($get_all_vendor_type) && count($get_all_vendor_type) > 0)
                      {
                        foreach ($get_all_vendor_type as $vendor_type)
                        {
                          $type_id = $vendor_type['Vendor_type_id'];

                            ?><option <?php if ((int)$vendor_type == $type_id){ ?>selected<?php }?>  value="<?php echo $vendor_type['Vendor_type_id']; ?>"><?php echo $vendor_type['Vendor_type_name']; ?></option>

                        <?php
                        }
                      }?>
                  </select>
                  <select  required="required" name="city" class="vendor_search select-left" style="margin-left:20px;">
                    <option value="">Select City</option>
                    <option <?php if (isset($city) && $city == "Lahore"){ ?>selected<?php }?> value="Lahore">Lahore</option>
                    <option <?php if (isset($city) && $city == "Karachi"){ ?>selected<?php }?> value="Karachi">Karachi</option>
                    <option <?php if (isset($city) && $city == "Islamabad"){ ?>selected<?php }?> value="Islamabad">Islamabad</option>
                  </select>
                  <input type="submit" value="Find Suppliers" class="btn btn-success" style="font-size:20px; margin-left:150px;">
                </form>
              </div>
            </div>

              <div class="container">
                <hr>
              <div class="col-md-12">
                <h3 class="vendor_name"><?php echo count($listing); ?> Records Found.</h3>
              </div>
              <hr>
              <div class="col-md-12" style="margin-top:40px; margin-bottom:40px; z-index:1;">
                <?php if (isset($listing) && count($listing) > 0)
                {
                  foreach ($listing as $dat)
                  {
                    ?>
                      <a href="detail/<?php echo $dat['Vendor_id']; ?>">
                <div class="col-md-12 vendor-box">


                    <div class="col-md-4">
                    <img style="height:250px;" src="<?php echo base_url() ; ?>images/vendortesting/<?php echo $dat['Vendor_picture_path']; ?>" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-4">
                    <div class="content">
                        <h3 class="vendor_name" style="font-size: 25px"><b><?php echo $dat['Vendor_name']; ?></b></h3>

                        <div class="col-xs-12">
                          <i class="glyphicon glyphicon-map-marker" style="font-size:20px;"></i>
                          <span style="font-size:15px; padding-left:15px; color:#aa6708;"><b><?php echo $dat['Vendor_address'] ; ?></b></span>
                        </div>
                        <hr>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="pull-right starring_price">Starring Price - Rs 4,567</div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <button class="btn btn-info pull-right"><i class="fa fa-edit"></i>  Request Quote</button>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <button style="width: 140px;" class="btn btn-warning pull-right"><i class="fa fa-heart"></i>  Favourite</button>
                    </div>
                  </div>

                </div></a>
              <?php
                  }
                } ?>
                <!--<div class="col-md-4 col-sm-6 vendor-box">
                    <img src="images/blog2.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>December 05, 2015</p></div>
                        <h3>De Finibus Bonorum Et Malorum</h3>
                        <p class="blog-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
                        <a href="">Read More</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 vendor-box">
                    <img src="images/blog3.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>October 18, 2015</p></div>
                        <h3>Vero Eos Et Accusamus Et Iusto</h3>
                        <p class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="">Read More</a>
                    </div>
                </div>-->
              </div>

              <!--<div class="col-md-12" style="margin-top:40px;">
                <div class="col-md-4 col-sm-6 vendor-box">
                    <img src="images/blog1.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>January 12, 2016</p></div>
                        <h3>Sed Tristique Urna Ut Nibh</h3>
                        <p class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="">Read More</a>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6 vendor-box">
                    <img src="images/blog2.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>December 05, 2015</p></div>
                        <h3>De Finibus Bonorum Et Malorum</h3>
                        <p class="blog-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
                        <a href="">Read More</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 vendor-box">
                    <img src="images/blog3.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>October 18, 2015</p></div>
                        <h3>Vero Eos Et Accusamus Et Iusto</h3>
                        <p class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="">Read More</a>
                    </div>
                </div>
              </div>-->

            </div>

        </div>
    </div>
  </section>
  <script>
  $(document).ready(function(){
    initmap();
  });

  function initmap() {
    debugger;
    var lat;
    var long;
    var mapCanvas = document.getElementById("map");
    var locations = <?php echo json_encode($listing); ?>;

    // Initialize the Geocoder

           lat = 31.504214566890944;
           long = 74.33143593652346;
           var mapOptions = {
             center: new google.maps.LatLng(lat, long),
             zoom: 11
           }
           var map = new google.maps.Map(mapCanvas, mapOptions);

           for(var i =0 ; i < locations.length ;i++)
           {
           var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['Vendor_lat'], locations[i]['Vendor_long']),
                map: map,
                title: locations[i]['Vendor_name']+' - '+locations[i]['Vendor_address']
              });
            }




  }
  </script>

  <?php include_once('application/views/footer.php'); ?>
</body>
</html>
