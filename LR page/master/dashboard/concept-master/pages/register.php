<?php

//register.php

include('Examination.php');

$exam = new Examination;

/*$exam->admin_session_public();*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/parsley.css">
     <script src="js/jquery-3.4.1.min.js"></script>
     <script src="js/parsley.min.js"></script>
     <script src="jquery.js"></script>
     <script src="parsley.min.js"></script>-->


  	<!--<link rel="stylesheet" href="../style/style.css" />-->

    <title>Admin Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                
                <div class="signup-content">
                    <span id="message"></span>
                   
                    <div class="signup-form">
                        <h2 class="form-title">Admin Registration</h2>
                        
                        <form method="post" id="admin_register-form" data-parsley-validate>
                             
                            <div class="form-group">
                                <label><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="admin_email_address" id="admin_email_address" data-parsley-checkemail data-parsley-checkemail-message='Email Address already Exist' placeholder="Admin Email Address"/ required>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="admin_password" id="admin_password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_admin_password"  id="confirm_admin_password" placeholder="Confirm password" required/>
                            </div>

                           <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>-->
                            <div class="form-group">
                             <input type="hidden" name="page" value="register" />
                             <input type="hidden" name="action" value="register" />
                             <input type="submit" name="admin_register" id="admin_register" class="btn btn-info" value="Register"/>
                              
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        

    <!-- JS -->
<!--<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>-->
</body>
</html>
<script>
    
$(document).ready(function(){

	window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value)
    {
      return $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:{page:'register', action:'check_email', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#admin_register_form').parsley();

  $('#admin_register_form').on('submit', function(event){

    event.preventDefault();

    $('#admin_email_address').attr('required','required');

    $('#admin_email_address').attr('data-parsley-type', 'email');

    $('#admin_password').attr('required', 'required');

    $('#confirm_admin_password').attr('required', 'required');

    $('#confirm_admin_password').attr('data-parsley-equalto', '#admin_password');

    if($('#admin_register_form').parsley().isValid())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#admin_register').attr('disabled', 'disabled');
          $('#admin_register').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            $('#message').html('<div class="alert alert-success">Please check your email</div>');
            $('#admin_register_form')[0].reset();
            $('#admin_register_form').parsley().reset();
          }

          $('#admin_register').attr('disabled', false);
          $('#admin_register').val('Register');
        }
      });
    }

  });

});

</script>
