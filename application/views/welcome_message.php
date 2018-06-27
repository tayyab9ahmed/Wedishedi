<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedishedi</title>
</head>
<body>

    <!--Header Starts
    ==================-->
    <header>

        <!--Navbar Starts
        ==================-->
        <?php include_once('application/views/header.php'); ?>

        <!--Header Image
        =================-->
        <div class="header-image">

            <div class="bg-color">
                <div class="content">
                    <div class="container">
                      <h2 style="font-size: 45px;font-weight: bold;">Things you need to done for your wedding<br><span>Find it on wedishedi</span></h2>
                        <!---<div class="row">
                            <div class="col-md-12 nav-search nav-search-margin">
                              <form method="post" action="Vendor/search">
                                <select required="required" name="vendor_type"  class="vendor_search magnifying select-left">
                                    <option value="">Select Category</option>
                                    <?php if(isset($get_all_vendor_type) && count($get_all_vendor_type) > 0)
                                    {
                                      foreach ($get_all_vendor_type as $vendor_type)
                                      {
                                          ?><option value="<?php echo $vendor_type['Vendor_type_id']; ?>"><?php echo $vendor_type['Vendor_type_name']; ?></option>

                                      <?php
                                      }
                                    }?>
                                </select>
                                <select  class="vendor_search magnifying select-left" required="required" style="margin-left:20px;" name="city" >
                                  <option value="">Select City</option>
                                  <?php if(isset($get_all_city) && count($get_all_city)>0){
                                    foreach ($get_all_city as $city) {
                                    ?>
                                    <option value="<?php echo $city['city_id']?>"><?php echo $city['city_name']?></option>
                                    <?
                                    }
                                  } ?>

                                </select>
                                <input type="submit" value="Find Suppliers" class="btn btn-success" style="font-size:20px; margin-left:150px;">
                              </form>
                            </div>
                            <!--<div class="col-md-12" style="padding-top: 100px;">
                                <h1><span>Memorable </span>Moments</h1>
                            </div>--->
                      <!--  </div>--->
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--Services
    ==============-->
    <section>
        <div class="services">
           <div class="container">
               <h2>It’s Simple. You Have An Event To Plan And <br><span> We Have The Solution</span></h2>
                <div class="owl-carousel" id="service-slider">

                    <div class="item">
                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/bangles.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=1">
                                <img src="images/food.png" alt="">
                                <div class="content">
                                    <h1>Banquet Hall</h1>
                                </div>
                            </a>
                        </div>

                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/decorators.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=2">
                                <img src="images/flags.png" alt="">
                                <div class="content">
                                    <h1>Decorators</h1>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/Dj.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=3">
                                <img src="images/dj.png" alt="">
                                <div class="content">
                                    <h1>DJ</h1>
                                </div>
                            </a>
                        </div>
                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/bakery.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=6">
                                <img src="images/bakery.png" alt="">
                                <div class="content">
                                    <h1>Bakery</h1>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="item">
                      <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/photographer.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                          <a href="Vendor/search/?vendor_type=5">
                              <img src="images/camera.png" alt="">
                              <div class="content">
                                  <h1>Photography</h1>
                              </div>
                          </a>
                      </div>

                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/catering.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=4">
                                <img src="images/catering.png" alt="">
                                <div class="content">
                                    <h1>Catering</h1>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="item">
                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/Invitation.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=8">
                                <img src="images/note.png" alt="">
                                <div class="content">
                                    <h1>Invitation</h1>
                                </div>
                            </a>
                        </div>

                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/limousine.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=9">
                                <img src="images/tool.png" alt="">
                                <div class="content">
                                    <h1>Limousine</h1>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="item">
                      <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/bridal_saloon.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                          <a href="Vendor/search/?vendor_type=7">
                              <img src="images/salon.png" alt="">
                              <div class="content">
                                  <h1>Bridal Salon</h1>
                              </div>
                          </a>
                      </div>


                        <div class="row" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/florist.jpg);background-size: cover; border-radius:50%; width:300px; display:inline-block; height:300px;">
                            <a href="Vendor/search/?vendor_type=10">
                                <img src="images/florist.png" alt="">
                                <div class="content">
                                    <h1>Florist</h1>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
           </div>
        </div>
    </section>

    <!--WedingCost-->
    <section>
        <div class="weddingcost">
            <div class="content" style="">
                <div class="container">
                    <h1><span>Wedding Cost Savings</span><br>
                    How much others couples in your area spent on wedding </h1>
                    <button class="btn btn-default">Wedding Cost</button>
                </div>
            </div>
        </div>
    </section>

    <!--Latest News
    =====================-->

    <section>
        <div class="blog">
            <div class="container">
                <h1>LATEST NEWS</h1>
                <h4>Whether planning an intimate gathering or a wedding for hundreds, <br> learn the details on how to make your event successful.</h4>

                <div class="col-md-4 col-sm-6">
                    <img src="images/blog1.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>January 12, 2016</p></div>
                        <h3>Sed Tristique Urna Ut Nibh</h3>
                        <p class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="">Read More</a>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <img src="images/blog2.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>December 05, 2015</p></div>
                        <h3>De Finibus Bonorum Et Malorum</h3>
                        <p class="blog-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
                        <a href="">Read More</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <img src="images/blog3.jpg" class="img-responsive" alt="">
                    <div class="content">
                        <div class="date"><p>October 18, 2015</p></div>
                        <h3>Vero Eos Et Accusamus Et Iusto</h3>
                        <p class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--Footer
    =============-->
    <?php include_once('application/views/footer.php'); ?>
</body>
</html>
