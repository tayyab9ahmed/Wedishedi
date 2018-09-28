<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotation</title>
</head>
<body>

    <!--Header Starts
    ==================-->
    <?php include_once('application/views/header-calendar.php'); ?>


<!--    form part
   =================-->
   <div class="main-form">
      <div class="content">
       <div class="container">
           <div id='loading' style="display:none;">loading...</div>
            <div id='calendar'></div>


              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Events</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary popsubmit">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

       </div>
       </div>
   </div>



   <!--Footer
    =============-->

    <?php include_once('application/views/footer.php'); ?>
</body>
</html>
