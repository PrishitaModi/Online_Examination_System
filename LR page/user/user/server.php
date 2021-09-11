<?php 
      
      
      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      $email = "";
      $username="";
      $user_mobile_no="";
      $errors = array();
      
      $db = mysqli_connect('localhost','root', '','online_examination' );

      //if register button clicked
      if(isset($_POST['register'])){
            
            $email = @($_POST['user_email_address']);
            $password_1 = @($_POST['user_password']);
            $password_2 = @($_POST['confirm_user_password']);
            $username = @($_POST['user_name']);
            $user_mobile_no = @($_POST['user_mobile_no']);
            
            if(empty($username)){
                  array_push($errors, "Name is required");
                   // add to error array
            }
            if(empty($user_mobile_no)){
                  array_push($errors, "Contact detail is required");
                  // add to error array
            }
            if(empty($email)){
                  array_push($errors, "Email is required"); 
                 // add to error array
            }
            if(empty($password_1)){
                  array_push($errors, "Password is required");
                  // add to error array
            }
            if($password_1 != $password_2){
                  array_push($errors, "Passwords don't match"); 
                 // add to error array
            }

            


            //if there are no errors, save to db
            if (count($errors) == 0){

                  $password = md5($password_1); 
                  $sql = "INSERT INTO user_table (user_email_address, user_password,user_name,user_mobile_no)
                              VALUES ('$email', '$password','$username','$user_mobile_no')";
                  mysqli_query($db, $sql);
                  

                 
                  $_SESSION['success'] = "You are now logged in";
                  header('location:login.php'); 
            }
      }

      

      
      // log user from login page
      if (isset($_POST['login'])){
            $username = ($_POST['user_email_address']);
            $password = ($_POST['user_password']);


            if(empty($username)){
                  array_push($errors, "User email is required"); // add to error array
            }
            if(empty($password)){
                  array_push($errors, " User Password is required"); // add to error array
            }

            if (count($errors) == 0) {
                  $password = md5($password); 
                  $query = "SELECT * FROM user_table WHERE user_email_address='$username' AND user_password='$password'";
                  $result = mysqli_query($db, $query);
                  $userid=mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);
                  $_SESSION['user_id'] = $row["user_id"];
                  

             if ($userid == 1) {

                        
                         header('location:student_dashboard.php'); //redirect to home page
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