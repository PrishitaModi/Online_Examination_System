<?php
include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
$db = mysqli_connect('localhost','root', '','online_examination' );
			
		$user_id =	$_SESSION['user_id'];
		$exam_id  = $_POST['exam_id'];

$query ="INSERT INTO user_exam_enroll_table(user_id, exam_id) VALUES('$user_id', '$exam_id')";
 $enrollquery=mysqli_query($db,$query);
// $userrows=mysqli_num_rows($enrollquery);
 mysqli_close($db);

$db = mysqli_connect('localhost','root', '','online_examination' );

$enrollquestionquery ="SELECT * FROM `question_table` WHERE online_exam_id = ".$_POST['exam_id']." ";
$result = mysqli_query($db,$enrollquestionquery);
 $adminid=mysqli_num_rows($result);
             
             for($i=1;$i<=$adminid;$i++)
                     
               {     
                     $row = mysqli_fetch_array($result);



                     $question_id =$row['question_id'];
                     $user_id =	$_SESSION['user_id'];
					$exam_id		=	$_POST['exam_id'];
					
					// $user_answer_option	='0';
					// $marks				='0';
				}
					

			$insertquery = "
				INSERT INTO user_exam_question_answer 
				(user_id, exam_id,question_id, user_answer_option, marks) 
				VALUES ('$user_id','$exam_id','$question_id','0','0')
				";
				
				

			$insertresult = mysqli_query($db,$insertquery);
          // $insert=mysqli_num_rows($insertresult);
           
        mysqli_close($db);
	?>
		

	