 <?php 

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $db = mysqli_connect('localhost','root', '','online_examination' );
  

                    
                
			    $admin_id	         	=	$_SESSION["admin_id"];
			    $online_exam_id        =   $_POST["online_exam_id"];   
				$online_exam_title     =	trim($_POST["edit_online_exam_title"]);
				$online_exam_datetime	=    $_POST["edit_online_exam_datetime"];
				$online_exam_duration	=	$_POST["edit_online_exam_duration"];
				$total_question		=   $_POST["edit_total_question"];
				$marks_per_right_answer =	$_POST["edit_marks_per_right_answer"];
				$marks_per_wrong_answer =	$_POST["edit_marks_per_wrong_answer"];

				
					
			$updatequery = "
			UPDATE online_exam_table 
			SET online_exam_title ='{$online_exam_title}' , online_exam_datetime ='$online_exam_datetime', online_exam_duration ='{$online_exam_duration}', total_question =$total_question, marks_per_right_answer = $marks_per_right_answer, marks_per_wrong_answer = $marks_per_wrong_answer  
			WHERE online_exam_id = $online_exam_id     
			";
			
			 $success=mysqli_query($db,$updatequery);

              
        header("Location:exam.php");
        mysql_close($db);
    
    ?>
  
 