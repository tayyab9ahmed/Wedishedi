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
          <div class="container">

            <div class="row">
              <div class="col-md-6 weddingcost1">
                <h1><span>The Average Cost Of A Wedding</span></h1>
                <p>
                  In each of the past few years, Pakistani's have spent an average of almost Rs1,500,000 on weddings. To help you get an idea of what other real life couples in your area have spent over the last year, we at Planiology have gathered data from around the country to help you budget for your own wedding.
                </p>
                <p>To see what other couples in your area have actually spent on their weddings, enter your city and state into the field below.
                </p>
                  <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="City" name="city">

                    </div>
                    <div class="col-sm-5 ">
                      <button class="weddingcostbutton btn">See Wedding Cost</button>
                    </div>
                  </div>
                <div class="info-sec-inner">
                  <h3><b>HOW TO KEEP YOUR BUDGET UNDER CONTROL</b></h3>
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
