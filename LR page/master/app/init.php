<?php
include('server.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//session_start();
 $db = mysqli_connect('localhost','root', '','online_examination' );
 $_SESSION['admin_id'] = $row["admin_id"];
 // $query = "SELECT admin_id FROM admin_table ";
 //  $result = mysqli_query($db, $query);
 //                  $adminid=mysqli_num_rows($result);
 //                  $row = mysqli_fetch_array($result);
 //                  $_SESSION['user_id'] = $row["admin_id"];
                  


//$db = new PDO('mysql:dbname=online_examination;host=localhost','root','');
if(!isset($_SESSION['admin_id'])) {
	die('YOU ARE NOT SIGNED IN  ');
}
?>