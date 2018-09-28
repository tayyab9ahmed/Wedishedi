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


              <div class="container" style="margin-top: 50px;margin-bottom: 30px;background-image: url('../../images/vendortesting/<?php echo $get_vendor_by_id['Vendor_picture_path']; ?>');height: 250px !important;background-repeat: round;background-size: cover;background-attachment: fixed;">
                  <h2 style="/* padding-left:15px; */font-size: 45px;font-weight: bold;text-align: center;color: white;padding-top: 100px;padding-bottom: 65px;background-color: rgba(0,0,0,0.3);"><?php echo $get_vendor_by_id['Vendor_name']; ?></h2>
                <div>



        </div>
    </div>
    </section>
    <div class="vendor">
        <div class="container">
              <h1><span style="color: #FCB41E;font-size: 40px;font-weight: bold;"><?php echo $get_package_by_id['Package_title'];?></span></h1>

              <div class="col-md-7" style="padding-bottom: 200px;">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <?php $count = 0;
                  foreach ($get_package_images as $key) {

                  ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $count; ?>" class="<?php if($count == 0){?> active <?}?>"><img src="<?php echo base_url(); ?>images/packagetesting/<? echo $key['package_picture_path'] ?>"  alt="..."></li>
                  <?
                  $count++;
                }?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                  <?php $count = 0;
                  foreach ($get_package_images as $key) {

                  ?>
                  <div class="item <?php if($count == 0){?> active <?}?>">
                    <img src="<?php echo base_url(); ?>images/packagetesting/<? echo $key['package_picture_path'] ?>" >
                  </div>
                  <?
                  $count++;
                }?>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
          <div class="col-md-4">
          <span class="starring_price">Starting At RS: <?php echo $get_package_by_id['Package_price'] ?></span>
          <hr>
          <span class="starring_price">Category: <?php echo $get_package_by_id['type'] ?></span>
          <hr>
          <span><?php echo $get_package_by_id['Package_description'] ?>
          </span>
          </div>

        </div>
        </div>
    <?php include_once('application/views/footer.php'); ?>
</body>
</html>
