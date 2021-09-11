<?php 
      
      
      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      $email = "";
      $errors = array();
      
      $db = mysqli_connect('localhost','root', '','online_examination' );

      //if register button clicked
      if(isset($_POST['register'])){
            
            $email = @($_POST['admin_email_address']);
            $password_1 = @($_POST['admin_password']);
            $password_2 = @($_POST['confirm_admin_password']);

            
            
            if(empty($email)){
                  array_push($errors, "Email is required"); // add to error array
            }
            if(empty($password_1)){
                  array_push($errors, "Password is required"); // add to error array
            }
            if($password_1 != $password_2){
                  array_push($errors, "Passwords don't match"); // add to error array
            }

            //if there are no errors, save to db
            if (count($errors) == 0){
                  $password = md5($password_1); 
                  $sql = "INSERT INTO admin_table (admin_email_address, admin_password)
                              VALUES ('$email', '$password')";
                  mysqli_query($db, $sql);
                 
                  // $_SESSION['success'] = "You are now logged in";
                  header('location: login.php'); 
            }
      }

      

      
      // log user from login page
      if (isset($_POST['login'])){
            $username = ($_POST['admin_email_address']);
            $password = ($_POST['admin_password']);


            if(empty($username)){
                  array_push($errors, "Admin email is required"); // add to error array
            }
            if(empty($password)){
                  array_push($errors, " Admin Password is required"); // add to error array
            }

            if (count($errors) == 0) {
                  $password = md5($password); 
                  $query = "SELECT * FROM admin_table WHERE admin_email_address='$username' AND admin_password='$password'";
                  $result = mysqli_query($db, $query);
                  $adminid=mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);
                  $_SESSION['admin_id'] = $row["admin_id"];
                  

             if ($adminid == 1) {

                        
                         header('location: maindashboard.php'); //redirect to home page
                   } 
            else {
                        array_push($errors, "The username or password is incorrect.");
                  }
            }
      }


      


      // logout
      if (isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['username']);
            header('location: login.php');
      }

?>