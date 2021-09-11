<?php  

//require_once 'app/init.php';
include('server.php');
 
$db = mysqli_connect('localhost','root', '','online_examination' );
$user=$_SESSION['user_id'];

        
 if(isset($_GET['as'], $_GET['row']))
 {
 	$as = $_GET['as'];
 	$item = $_GET['row'];
   
 	switch($as) {
 		case 'done':
        $doneQuery="UPDATE user_todo SET done=1 WHERE id='$item'   
             AND user='$user'";
             $result = mysqli_query($db,$doneQuery);



 		   // $doneQuery=$db->prepare("
 		   // 	UPDATE admin_todo
 		   // 	SET done =1
 		   // 	WHERE id=:item
 		   // 	AND user=:user
      //       ");

 		   // $doneQuery->execute([
 		   // 	'item'=> $item,
 		   // 	'user'=>$_SESSION['admin_id']

 		   //  ]);
 		   break;
 		 }
 }
header('Location: todo.php');




















?>