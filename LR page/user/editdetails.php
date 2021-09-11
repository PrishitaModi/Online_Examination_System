 <?php 

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $db = mysqli_connect('localhost','root', '','online_examination' );
   // $online_exam_id=$_POST['online_exam_id'];



 // $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
 //                $randid=(rand(1,10000));
                        
                
			    $admin_id	         	=	$_SESSION["admin_id"];
			    $online_exam_id        =   $_POST["online_exam_id"];   
				$online_exam_title     =	trim($_POST["online_exam_title"]);
				$online_exam_datetime	=    $_POST["online_exam_datetime"];
				$online_exam_duration	=	$_POST["online_exam_duration"];
				$total_question		=   $_POST["total_question"];
				$marks_per_right_answer =	$_POST["marks_per_right_answer"];
				$marks_per_wrong_answer =	$_POST["marks_per_wrong_answer"];

				
					
			$updatequery = "
			UPDATE online_exam_table 
			SET online_exam_title ='{$online_exam_title}' , online_exam_datetime ='$online_exam_datetime', online_exam_duration ='{$online_exam_duration}', total_question =$total_question, marks_per_right_answer = $marks_per_right_answer, marks_per_wrong_answer = $marks_per_wrong_answer  
			WHERE online_exam_id = $online_exam_id     
			";
			
			 $success=mysqli_query($db,$updatequery);

              if($success)
               {
              	echo 1;
              } else{
              	echo 0;
              }
       
                                                             
             
        
    
           ?>
  
 