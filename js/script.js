$(document).ready(function(){
  var url = window.location.origin+"/Wedishedi/Vendor" ;
  $.ajax({ url: url+"/get_all_vendor_type", success: function(result){
    var json_array = $.parseJSON(result);
    var select = document.getElementById("vendor_type");
    for(index in json_array) {
      debugger;
        select.options[select.options.length] = new Option(json_array[index].Vendor_type_name, json_array[index].Vendor_type_id);
    }
  }});
  $.ajax({ url: url+"/get_all_city", success: function(result){
    var json_array = $.parseJSON(result);
    var select = document.getElementById("vendor_city");
    for(index in json_array) {
        select.options[select.options.length] = new Option(json_array[index].city_name, json_array[index].city_id);
    }
  }});
});

jQuery(function(){



// start timecounter
  var clock;
  var ck_string = [];
  clock = $('#timecounter').FlipClock({
        clockFace: 'DailyCounter',
        autoStart: false,
        callbacks: {
          stop: function() {
            $('.message').html('The clock has stopped!')
          }
        }
    });

    clock.setTime(220880);
    clock.setCountdown(true);
    clock.start();
/* end time counter
  $('#phoneNumber').on('change', function () {
    debugger;
      var phone_num_regex = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/i;
      if (phone_num_regex.test($(this).val())) {
        $('#message_phone').html('Valid Pakistan Phone Number').css('color', 'green');
      }
      else {
        $('#message_phone').html('Invalid Pakistan Phone Number').css('color', 'red');
      }
  });

  $('#confirm_password').on('keyup', function () {
      if ($(this).val() == $('#password').val()) {
          $('#message_pass').html('Matching').css('color', 'green');
      } else $('#message_pass').html('Not Matching').css('color', 'red');
  });

    //Singup Validation
  /*  $('#SingupForm')
        .formValidator({
            FeedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                phoneNumber: {
                    required : true,
                    minlength:11,
                    validators: {
                        phone: {
                            message: 'The value is not valid pakistan phone number'
                        }
                    }
                }
            }
        })
        // Revalidate phone number when changing the country
        .on('change' , function(e) {
            $('#SingupForm').formValidation('revalidateField', 'phoneNumber');
        });

*/


$(".switch").click(function() {
  debugger;
  $.ajax({ url: "../Vendor/get_service_by_vendor_type", data:"vendor_type_id="+$(this).val(), success: function(result){
    debugger;
    $("#panel-body-vendor-service").html(result);
  }});
  $.ajax({ url: "../Vendor/get_faq_by_vendor_type", data:"vendor_type_id="+$(this).val(), success: function(result){
    debugger;
    $("#panel-body-service").html(result);
  }});
});

//login form validation and submittion
$('.login').click(function(){
debugger;

$('#user-login').bootstrapValidator({
  trigger: 'blur',
  fields: {
      User_email: {
          validators: {
              notEmpty: {
                  message: 'The email is required'
              },
              emailAddress: {
                  message: 'User email is not a valid email address'
              }
          }
      },
      User_password: {
              validators: {
                  notEmpty: {
                      message: 'The password is required and can\'t be empty'
                  }
              }
          }
  }
});
if($('#user-login').bootstrapValidator('validate').has('.has-error').length > 0){
  return false;
}
else {
  debugger;
  $.ajax({type: "POST", url: "dologin", data:$("#user-login").serialize(), success: function(result){
      if(result == "true")
      {
        window.location.href = 'http://localhost:8080/Wedishedi/Welcome/dashboard';
      }
      else {
        window.location.href = 'http://localhost:8080/Wedishedi/Welcome/login/?result=false';
      }

	  }});
}
});
// signup form validation and submittion
$('.signup').click(function(){
debugger;
$('#user_signup').bootstrapValidator({
  trigger: 'blur',
  fields: {
      User_fname: {
          validators: {
              notEmpty: {
                  message: 'First name is required'
              },
              regexp: {
                  regexp: /^[a-zA-Z ]+$/,
                  message: 'First name cannot have numbers or symbols'
              }
          }
      },
      User_lname: {
          validators: {
              notEmpty: {
                  message: 'Last name is required'
              },
              regexp: {
                  regexp: /^[a-zA-Z ]+$/,
                  message: 'Last name cannot have numbers or symbols'
              }
          }
      },
      User_email: {
          validators: {
              notEmpty: {
                  message: 'The email is required'
              },
              emailAddress: {
                  message: 'User email is not a valid email address'
              }
          }
      },
      User_phone_no: {
          validators: {
              notEmpty: {
                  message: 'User contact number is required'
              },
              regexp: {
                  regexp: /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/,
                  message: 'The input is not a valid Pakistan phone number'
              }
          }
      },
      User_password: {
              validators: {
                  notEmpty: {
                      message: 'The password is required and can\'t be empty'
                  },
                  identical: {
                      field: 'confirm_password',
                      message: 'The password and its confirm are not the same'
                  }
              }
          }
  }
});

$.ajax({type: "POST", url: "chk_email", async: false, data:{User_email:$("#User_email").val()}, success: function(result){
    debugger;
    if(result == "false")
    {
     $('#User_email').css({'border-color':'#a94442'});
     $('#message_phone').html('Email already exists. Please Login with your existed account.').css({'color':'#a94442','font-size':'12px'});
     return false;
    }
    else {
      $('#User_email').css({'border-color':'#3c763d'});
      $('#message_phone').html('');
      return true;
    }
  }});
if($('#user_signup').bootstrapValidator('validate').has('.has-error').length > 0 || $('#message_phone').html().length > 0){
    return false;
}
else {
  debugger;

  $.ajax({type: "POST", url: "save", async: false, data:$("#user_signup").serialize(), success: function(result){
       window.location.href = 'http://localhost:8080/Wedishedi/Welcome/login';
	  }});
}
});


    $("#service-slider").owlCarousel({
        items : 3,
        itemsCustom : false,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        autoPlay : true,
        stopOnHover : true,
        pagination : true,
        paginationNumbers: false,
    });

    $("#testimonial-slider").owlCarousel({
        items : 2,
        itemsCustom : false,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        autoPlay : true,
        stopOnHover : true,
        pagination : true,
        paginationNumbers: false,
    });

    $('.counter').counterUp({
        delay: 10,
        time: 1200
    });

    $('.hamburger').click(function(){
        $('.header-menu').fadeToggle(200);
    });


  /*  $('.datepicker').datepicker({
       format:"dd-mm-yyyy",
       ignoreReadonly: false
        }).on('changeDate', function(e){
        (e.viewMode=='days') ? $(this).datepicker('hide') : '';
   });
*/
    $('.switch').switchable({
        label_position: 'after'
        ,click: function( ev, checked )
            {
              debugger;
              $.each($("input[name='Vendor_type[]']:not(:checked)"), function(){
                debugger;
                $("#"+$(this).val()+"").remove();
                var index = ck_string.indexOf($(this).val());
                if( index > -1 )
                {
                  ck_string.splice(index, 1);
                }
              });

            $.each($("input[name='Vendor_type[]']:checked"), function(){
              debugger;
              if(ck_string.indexOf($(this).val()) > -1 )
              {

              }
              else {
                ck_string.push($(this).val());
                $.ajax({ url: "../Vendor/get_service_by_vendor_type", data:"vendor_type_id="+$(this).val(), success: function(result){
                  debugger;
                  $("#panel-body-vendor-service").append(result);
                }});
                $.ajax({ url: "../Vendor/get_faq_by_vendor_type", data:"vendor_type_id="+$(this).val(), success: function(result){
                  debugger;
                  $("#panel-body-service").append(result);
                }});
              }

            });

            }
    });

    $('.closebutton').click(function() {
        var parent = $(this).closest('div');
        var head = parent.prev('h3');
        var next = parent.nextAll();
        parent.add(head).add(next).fadeOut('slow',function(){$(this).remove();});
    });


    $('.next-2').click(function(){
        debugger;
        debugger;
      	$('#vendor_add').bootstrapValidator({
          trigger: 'blur',
          fields: {
              Vendor_name: {
                  validators: {
                      notEmpty: {
                          message: 'Vendor name is required'
                      },
                      regexp: {
                          regexp: /^[a-zA-Z ]+$/,
                          message: 'Vendor name cannot have numbers or symbols'
                      }
                  }
              },
              Vendor_contact_no: {
                  validators: {
                      notEmpty: {
                          message: 'Vendor contact number is required'
                      },
                      regexp: {
                          regexp: /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/,
                          message: 'The input is not a valid Pakistan phone number'
                      }
                  }
              },
              Vendor_email_address: {
                  validators: {
                      notEmpty: {
                          message: 'The email is required'
                      },
                      emailAddress: {
                          message: 'Vendor email is not a valid email address'
                      }
                  }
              },
      				Vendor_description: {
                  validators: {
                      notEmpty: {
                          message: 'Vendor Description is required'
                      }
                  }
              },
      				Vendor_address: {
                  validators: {
                      notEmpty: {
                          message: 'Vendor Address is required'
                      }
                  }
              },
      				Vendor_owner_name: {
                  validators: {
                      notEmpty: {
                          message: 'Owner name is required'
                      },
                      regexp: {
                          regexp: /^[a-zA-Z ]+$/,
                          message: 'Owner name cannot have numbers or symbols'
                      }
                  }
              },
              Vendor_owner_contact_no: {
                  validators: {
                      notEmpty: {
                          message: 'Owner phone number is required'
                      },
                      regexp: {
                          regexp: /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/,
                          message: 'The input is not a valid Pakistan phone number'
                      }
                  }
              },
      				city: {
                  validators: {
                      notEmpty: {
                          message: 'City is required'
                      }
                  }
              },
              Vendor_picture:{
                validators: {
                      file: {
                        extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 1024 * 1024,
                            message: 'The selected file is not valid, or the size is not large enough!'
                      }
                }
              }
          }
      	});

      	if($('#vendor_add').bootstrapValidator('validate').has('.has-error').length > 0 && $("input[name='Vendor_type[]']:checked").length >0){
      		return false;
      	}
      else {
        var file_name=$("#Vendor_picture").val();
            var fileName = $("#Vendor_picture").val();
            var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
            var file_data=$("#Vendor_picture").prop("files")[0];
            var form = $('#vendor_add').serialize();
            var form_data= new FormData($('form')[0]);
            form_data.append("file",file_data);
        $.ajax({type: "POST", url: "../Vendor/save", data:form_data, cache : false,contentType: false,
    processData: false,success: function(result){
	    debugger;
    			window.location.href = 'http://localhost:8080/Wedishedi/Welcome/dashboard';
    	  },
          error:function()
        {
          return false;
        }});
        //$('.step-one').fadeOut(200);
        //$('.step-three').fadeIn(200);

        //$('#step1').removeClass('active');
        //$('#step2').addClass('active');
      }

    });

    $('.next-3').click(function(){
      debugger;
      $('.input_validator').bootstrapValidator({
        trigger: 'blur',
        required:true,
        message: 'City is required'
        });
        if($('#vendor_add').bootstrapValidator('validate').has('.has-error').length > 0){
      		return false;
      	}
        $('.step-one').fadeOut(200);
        $('.step-three').fadeIn(200);
        $('.step-two').fadeOut(200);

        $('#step1').removeClass('active');
        $('#step3').addClass('active');
        $('#step2').removeClass('active');
    });

    $('.prev-1').click(function(){
        $('.step-two').fadeOut(200);
        $('.step-one').fadeIn(200);
        $('.step-three').fadeOut(200);

        $('#step2').removeClass('active');
        $('#step1').addClass('active');
        $('#step3').removeClass('active');
    });

    $('.prev-2').click(function(){
        $('.step-one').fadeIn(200);
        $('.step-three').fadeOut(200);

        $('#step1').addClass('active');
        $('#step3').removeClass('active');
    });

});


var $hamburger = $(".hamburger");
    $hamburger.on("click", function(e) {
    $hamburger.toggleClass("is-active");
    // Do something else, like open/close menu
});
$(document).scroll(function() {
  if($('.nav-search').offset() != null || $('.nav-search').offset() != undefined)
  {
  var fixmeTop = $('.nav-search').offset().top;
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= fixmeTop && fixmeTop > 450) {
        $('.nav-search').css({
            position: 'fixed',
            top: '0',
            left: '0'
        });
    } else {
        $('.nav-search').css({
            position: 'static'
        });
    }
  }
});


/*button hover
===========================*/

    var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
    buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
    totalButtons7Click = buttons7Click.length,
    totalButtons9Click = buttons9Click.length;

    buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
    buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
    function activate() {
    var self = this, activatedClass = 'btn-activated';

    if( classie.has( this, 'btn-7h' ) ) {
    // if it is the first of the two btn-7h then activatedClass = 'btn-error';
        // if it is the second then activatedClass = 'btn-success'
    activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
                    }
    else if( classie.has( this, 'btn-8g' ) ) {
                    // if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
                    // if it is the second then activatedClass = 'btn-error3d'
        activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
    }

    if( !classie.has( this, activatedClass ) ) {
        classie.add( this, activatedClass );
        setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
    }
    }

    document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
        classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
    }, false );
