<?php 

     include('server.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <title>User Login</title>

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
                        <a href="registration.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                         
                        <h2 class="form-title">User Sign up</h2>

                       
                            <form method="post" action="login.php">
                            <div class="form-group">

                                <?php include('errors.php'); ?>
                                <br>
                                <br>
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                 <input type="email" name="user_email_address" placeholder="User Email Address">
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <!--<input type="password" name="admin_password" id="admin_password" placeholder="Password"/>-->
                                <input type="password" name="user_password"placeholder="User password">

                            </div>
                            <div class="form-group">
                       <!--<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>-->
                              <div class="form-group">
                 
                <button type="submit" name="login" class="btn btn-info"> Login </button>
            </div>
                              
                            

                        </form>
                        
                    </div>
                </div> 
            </div>
        </section>

    </div>
</body>
</html>
