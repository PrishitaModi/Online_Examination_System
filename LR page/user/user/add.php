<?php
 

include('server.php');
$db = mysqli_connect('localhost','root', '','online_examination' );
$user=$_SESSION['user_id'];

 if(isset($_POST['name']))
 {
 	$name = trim($_POST['name']);
 	 if(!empty($name))
     {
 	 	$addedQuery ="INSERT INTO user_todo (name,user,done,created)
 	 		VALUES('$name','$user',0,NOW())";
    $result = mysqli_query($db,$addedQuery);

 	 }
    }

 header('Location:todo.php');
 ?>
 