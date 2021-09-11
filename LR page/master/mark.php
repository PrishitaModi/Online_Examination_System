<?php  

//require_once 'app/init.php';
include('server.php');
 
$db = mysqli_connect('localhost','root', '','online_examination' );
$user=$_SESSION['admin_id'];

        
 if(isset($_GET['as'], $_GET['row']))
 {
 	$as = $_GET['as'];
 	$item = $_GET['row'];
   
 	switch($as) {
 		case 'done':
        $doneQuery="UPDATE admin_todo SET done=1 WHERE id='$item'   
             AND user='$user'";
             $result = mysqli_query($db,$doneQuery);



 		   break;
 		 }
 }
header('Location: todo.php');




















?>