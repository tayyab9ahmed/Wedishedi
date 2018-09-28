<header>
  <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/animate.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/hamburgers.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/demo.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/component.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/creativelink/normalize.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/switchable.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/datepicker.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/style.css');?>">



  <link rel="stylesheet" href="<?php echo base_url('/css/owl.carousel.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/owl.theme.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/flipclock.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('/css/dropzone.min.css');?>">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap-select.min.css');?>">

  <script src="<?php echo base_url('js/dropzone.min.js');?>"></script>
  <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('js/linkhover.js');?>"></script>
  <script src="<?php echo base_url('js/owl.carousel.min.js');?>"></script>
  <script src="<?php echo base_url('js/waypoint.min.js');?>"></script>
  <script src="<?php echo base_url('js/jquery.counterup.min.js');?>"></script>
  <script src="<?php echo base_url('js/script.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrapvalidator.js');?>"></script>
  <script src="<?php echo base_url('js/flipclock.min.js');?>"></script>
  <script src="<?php echo base_url('js/flipclock.js');?>"></script>
  <script src="<?php echo base_url('js/bootstrap-select.min.js');?>"></script>
  <script src="<?php echo base_url('js/switchable.min.js');?>"></script>

  <!--start script added faysal mahamud -->
  <link href='<?php echo base_url('css/fullcalendar.min.css');?>' rel='stylesheet' />
  <link href='<?php echo base_url('css/fullcalendar.print.min.css');?>'  rel='stylesheet' media='print' />

  <script src="<?php echo base_url('js/moment.min.js');?>"></script>
  <script src="<?php echo base_url('js/fullcalendar.min.js');?>"></script>
  <script src="<?php echo base_url('js/gcal.min.js');?>"></script>


  <!-- end script added faysal mahamud -->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.20&sensor=true&key=AIzaSyDEhDIQB447edZDYjJ-kAg4gnm_zrNDiW0"></script>
<style>
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>  
<script>

$(document).ready(function () {
  $('#calendar').fullCalendar({
    selectable: true,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    select: function (startDate, endDate) {

      modalbox('create', startDate.format(), endDate.format());
    },

    eventClick: function (event) {
      console.log(event);
      modalbox('updated', event);
      // if (event.url) {
      //    
      //   // opens events in a popup window
      //   //window.open(event.url, 'gcalevent', 'width=700,height=600');
      //   return false;
      // }
    },

    eventSources: [{
       color: '#18b9e6',   
       textColor: '#000000',
      events: function (start, end, timezone, callback) {
        $.ajax({
          url: '<?php echo base_url() ?>events/get_events',
          dataType: 'json',
          data: {
            // our hypothetical feed requires UNIX timestamps
            start: start.unix(),
            end: end.unix()
          },
          success: function (msg) {
            var events = msg.events;
            callback(events);
          }
        });
      }
    }, ]
  });


  function modalbox(type = "", start = '', endDate = '') {

    if (type == 'create') {
      var pop_content = '<form id="popup">' +
        '<div class="form-group">' +
        '<label for="recipient-name" class="col-form-label">Title:</label>' +
        '<input type="text" name="title" class="form-control" id="recipient-name">' +
        '</div>' +
        '<div class="form-group">' +
        '<label for="recipient-name" class="col-form-label">Event Type:</label>' +
        '<input type="text" name="event_type" class="form-control" id="recipient-name" value="">' +
        '</div>' +        
        '<div class="form-group">' +
        '<label for="recipient-name" class="col-form-label">Guest Name:</label>' +
        '<input type="text" name="guest_name" class="form-control" id="recipient-name" value="">' +
        '</div>' +        
        '<div class="form-group">' +
        '<label for="message-text" class="col-form-label">Description:</label>' +
        '<textarea name="content_event" class="form-control" id="message-text"></textarea>' +
        '</div>' +
        '<input type="hidden" id="start" name="start" value="' + start + '"><input type="hidden" id="end" name="end" value="' + endDate + '"><input type="hidden" id="save_method" name="method" value="add">' +
        '</form>';
    } else {

      var start_date = start.start.format();
      if (start.end != '') {
        var end_date = start.end.format();
      } else {
        end_date = '';
      }

      var title = start.title;
      var description = start.description;
      $('#exampleModalLabel').html('Update Events');
      var pop_content = '<form id="popup">' +
        '<div class="form-group">' +
        '<label for="recipient-name" class="col-form-label">Place:</label>' +
        '<input type="text" name="title" class="form-control" id="recipient-name" value="' + title + '">' +
        '</div>' +
        '<div class="form-group">' +
        '<label for="message-text" class="col-form-label">Description:</label>' +
        '<textarea name="content_event" class="form-control" id="message-text">' + description + '</textarea>' +
        '</div>' +
        '<input type="hidden" id="id" name="id" value="' + start.id + '">'+
        '<input type="hidden" id="start" name="start" value="' + start_date + '">'+
        '<input type="hidden" id="end" name="end" value="' + end_date + '">' +
        '<input type="hidden" id="save_method" name="method" value="update">' +
        '</form>';
    }
    $('#exampleModal .modal-body').html(pop_content);
    $('#exampleModal').modal('show');

  }


  $('.popsubmit').on('click', function (event) {
    debugger;
    event.preventDefault(); // on stop le submit
    var title = $('#recipient-name').val();
    var start = $('#start').val();
    var end = $('#end').val();
    var where_event = $('#where_event').val();
    var content_event = $('#message-text').val();
    var save_method = $('#save_method').val();

    if (title) {
      $('#calendar').fullCalendar('renderEvent', {
          title: title,
          start: start,
          end: end
        },
        true // make the event "stick"
      );
      // Now we push it to Google also :
      //add_event_gcal(title,start,end,where_event,content_event);  
    }

    // Wether we had the form fulfilled or not, we clean FullCalendar and close the popup   
    $('#calendar').fullCalendar('unselect');

    var url;
    if (save_method == 'add') {
      url = "<?php echo site_url('events/add_event')?>";
    } else {
      url = "<?php echo site_url('events/update_event')?>";
    }
    // ajax adding data to database
    $.ajax({
      url: url,
      type: "POST",
      data: $('#popup').serialize(),
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $('#modal_form').modal('hide');
        location.reload(); // for reload a page
      },
      error: function (jqXHR, textStatus, errorThrown) {
        location.reload();
      }
    });

  });
});
</script>

  <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
  </script>
    <!--Navbar Starts
    ==================-->
    <nav class="navbar navbar-default">
       <div class="logo12">
       <a href="<?php echo base_url()?>" class="pull-left" style="margin-left: 25px;margin-top: 5px;margin-bottom: 5px"><img style="height:60px;" src="<?php echo base_url('/images/logo.png');?>" alt="logo">

       </a>
        </div>
        <div class="container"><?php $User_id = $this->session->userdata('User_id');?>
          <div class="col-sm-8 col-md-8">
          <form class="navbar-form" action="<?php echo base_url('Vendor/search');?>" role="search">
          <div class="input-group" style=" margin-top: 10px;">
            <div class="col-sm-6 col-md-6">
              <select  class="form-control" required="required" id="vendor_type" name="vendor_type" style="width: 240px;">
                <option value="">Select Vendor Type</option>
              </select>
            </div>
            <div class="col-sm-6 col-md-6">
              <select  class="form-control" required="required" id="vendor_city" name="city" style="width: 180px;">
                <option value="">Select City</option>


              </select>
              <div class="input-group-btn">
                  <button class="btn btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>

          </div>
          </form>
      </div>
            <ul class="nav navbar-nav navbar-right header-menu hidden-xs" style="height: 70px;">
                <li><a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>"><b><span style="color:white;font-size: 12px;">Home</span></b></a></li>
                <li><a style="padding: 10px 0px 0px 0px;" href="#"><b><span style="color:white;font-size: 12px;">Suppliers</span></b></a></li>
                <li><a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>WeddingCost"><b><span style="color:white;font-size: 12px;">Cost</span></b></a></li>
                <!--<li><a href="#"><b><span style="color:white">News</span></b></a></li>-->
                <li><?php if(isset($User_id) && count($User_id)>0)
                      {?>
                    <a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>Welcome/logout"><b><span style="color:white;font-size: 12px;">LogOut</span></b></a>
                    <?php
                      }
                    else
                    {?>
                    <a style="padding: 10px 0px 0px 0px;" href="<?php echo base_url()?>Welcome/login"><b><span style="color:white;font-size: 12px;">Login</span></b></a>
                  <?php }?>
                </li>
            </ul>

        </div>
    </nav>
    <?php if(isset($User_id) && count($User_id)>0)
          {?>
    <div>
      <nav class="bellow-navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li ><a class="subheader" href="#"><i class="fa fa-align-justify"></i><b><span style="font-size: 12px;">Dashboard</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>/Events"><i class="glyphicon glyphicon-floppy-saved"></i><b><span style="font-size: 12px;" >Events</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>/Vendor/package"><i class="	glyphicon glyphicon-edit"></i><b><span style="font-size: 12px;">Packages</span></b></a></li>
                <li ><a class="subheader" href="#"><i class="	glyphicon glyphicon-edit"></i><b><span style="font-size: 12px;">Quote Request</span></b></a></li>
                <li ><a class="subheader" href="<?php echo base_url()?>Welcome/profile"><i class="fa fa-user"></i><b><span style="font-size: 12px;">Profile</span></b></a></li>
            </ul>

        </div>
      </nav>
    </div>
  <?php }?>

</header>
