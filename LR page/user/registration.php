<?php 

     include('server.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <title>User Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main" style="padding-top: 50px ;padding-bottom: 50px;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                
                <div class="signup-content">
                    
                   
                    <div class="signup-form">
                        <div class="col-md-6">
                
                </div>
                        
                        <h2 class="form-title">User Registration</h2>
                        
                        <form method="post" action="registration.php" id="register">
                         <!-- Validation errors here-->
                           <?php include('errors.php'); ?>
                           <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                   <input type="text" placeholder="User Name" name="user_name" autofocus>
                            </div>
                            
                             <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                  <input type="number" placeholder="User Contact Number" maxlength="10"name="user_mobile_no" autofocus autocomplete="off">
                            </div>
                             
                            <div class="form-group">
                                <label><i class="zmdi zmdi-email"></i></label>
                                
                                
                                <input type="email" placeholder="User Email Address" name="user_email_address"autofocus autocomplete="off" pattern="[^ @]*@[^ @]*">
                        
                                       </div>
                                        
                            
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <!--<input type="password" name="admin_password" id="admin_password" placeholder="Password"/>-->
                                <input type="password" placeholder="User Password" name="user_password" autofocus>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                
                                <input type="password"placeholder="Confirm password" name="confirm_user_password" autofocus>
                            </div>

                         
                            <div class="form-group">
                            
                             <button type="submit" name="register" class="btn btn-info" a href="login.php"> Register </button>
                              
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
  
    
 

</body>
</html>

   