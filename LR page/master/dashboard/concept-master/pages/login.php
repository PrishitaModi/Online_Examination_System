<?php

//login.php

include('Examination.php');

$exam = new Examination;

/*$exam->admin_session_public();*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
    <title>Admin Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>
                    
      <div class="col-md-6" style="margin-top:20px;">
          
          <span id="message">
          <?php
          if(isset($_GET['verified']))
          {
            echo '
            <div class="alert alert-success">
              Your email has been verified, now you can login
            </div>
            ';
          }
          ?>
          </span>

                    <div class="signin-form">
                         
                        <h2 class="form-title">Admin Sign up</h2>

                        <form method="post" id="admin_login_form" data-parsley-validate>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text"  name="admin_email_address" id="admin_email_address"placeholder="Email Address"/ required>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="admin_password" id="admin_password" placeholder="Password"/ required>
                            </div>
                            <!--<div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>-->
                             <div class="form-group">
                  <input type="hidden" name="page" value="login" />
                  <input type="hidden" name="action" value="login" />
                  <input type="submit" name="admin_login" id="admin_login" a href="dashboard/concept-master/pages/datatable.php"class="form-submit" value="Login" />
                </div>
                            <!--<div class="form-group form-button">
                 <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>-->
                        </form>
                        <!--<div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div> 
            </div>
        </section>

    </div>

    <!-- JS -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>-->
</body>
</html>
<script>

$(document).ready(function(){

  $('#admin_login_form').parsley();

  $('#admin_login_form').on('submit', function(event){
    event.preventDefault();

    $('#admin_email_address').attr('required', 'required');

    $('#admin_email_address').attr('data-parsley-type', 'email');

    $('#admin_password').attr('required', 'required');

    if($('#admin_login_form').parsley().validate())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#admin_login').attr('disabled', 'disabled');
          $('#admin_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href="index.php";
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          $('#admin_login').attr('disabled', false);
          $('#admin_login').val('Login');
        }
      });
    }

  });

});

</script>