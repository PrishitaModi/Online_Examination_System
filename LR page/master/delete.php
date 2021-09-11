<?php

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 
 $db = mysqli_connect('localhost','root', '','online_examination' );
  $online_exam_id = $_POST['online_exam_id'];
  $delquery="DELETE FROM online_exam_table WHERE online_exam_id =".$_POST["online_exam_id"]." ";
  $delexecute=mysqli_query($db,$delquery);
	 


			if($delexecute)
			 {
              	echo 1;
              } 
              else
              {
              	echo 0;
              }

?>
