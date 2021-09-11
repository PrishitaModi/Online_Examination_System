<?php

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db = mysqli_connect('localhost','root', '','online_examination' );


                $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                $randid=(rand(1,10000));
                        
                
			    $admin_id	         	=	$_SESSION["admin_id"];
				$online_exam_title	    =	trim($_POST["online_exam_title"]);
				$online_exam_datetime	=	$_POST["online_exam_datetime"];
				$online_exam_duration	=	$_POST["online_exam_duration"];
				$total_question		    =	$_POST["total_question"];
				$marks_per_right_answer =	$_POST["marks_per_right_answer"];
				$marks_per_wrong_answer =	$_POST["marks_per_wrong_answer"];
				
					// echo "<pre>";
					// print_r($_POST);
					// die;	

			$insertquery = "
			INSERT INTO online_exam_table 
			(admin_id, online_exam_title, online_exam_datetime, online_exam_duration, total_question, marks_per_right_answer, marks_per_wrong_answer, online_exam_created_on, online_exam_status, online_exam_code) 
			VALUES ('{$admin_id}', '{$online_exam_title}', '{$online_exam_datetime}', '{$online_exam_duration}', '{$total_question}', '{$marks_per_right_answer}', '{$marks_per_wrong_answer}', '{$current_datetime}','Pending', '$randid')
			";


              $success=mysqli_query($db,$insertquery);

              if($success) {
              	echo 1;
              } else{
              	echo 0;
              }
       
                                                             
             
         // header('location:.php');
     // }
      
           ?>
  
 