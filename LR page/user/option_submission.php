 <?php
//session_start();
 
include('server.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



$db = mysqli_connect('localhost','root', '','online_examination' );

 $exam_right_answer_mark = Get_question_right_answer_mark($_POST['exam_id']);

 $exam_wrong_answer_mark = Get_question_wrong_answer_mark($_POST['exam_id']);
 $orignal_answer =Get_question_answer_option($_POST['question_id']);

		
 
function Get_question_right_answer_mark (int $exam_id) 
{
       $db = mysqli_connect('localhost','root', '','online_examination' );
		$query = "SELECT marks_per_right_answer FROM online_exam_table 
		WHERE online_exam_id = '".$exam_id."' ";
		$right_answer=mysqli_query($db,$query);
		$result=mysqli_num_rows($right_answer);

		 for($i=1;$i<=$result;$i++)
                     
      {
          $row = mysqli_fetch_array($right_answer);

             
			   return $row['marks_per_right_answer'];
			      

	  	}
	  	mysqli_close($db);
	  }
	

//$exam_wrong_answer_mark = Get_question_wrong_answer_mark($_POST['exam_id']);




		function Get_question_wrong_answer_mark(int $exam_id)
	{
		$db = mysqli_connect('localhost','root', '','online_examination' );
		$query = "
		SELECT marks_per_wrong_answer FROM online_exam_table 
		WHERE online_exam_id = '".$exam_id."' 
		";
		$wrong_answer=mysqli_query($db,$query);
		$result=mysqli_num_rows($wrong_answer);

		 for($i=1;$i<=$result;$i++)
                     
      {
           $row = mysqli_fetch_array($wrong_answer);
           return $row['marks_per_wrong_answer'];

			
	  	}
	  		mysqli_close($db);
	}

//  $orignal_answer =Get_question_answer_option($_POST['question_id']);

		function Get_question_answer_option(int $question_id)
	{
		$db = mysqli_connect('localhost','root', '','online_examination' );
		$query = "
		SELECT answer_option FROM question_table 
		WHERE question_id = '".$question_id."' 
		";
		$answer=mysqli_query($db,$query);
		$result=mysqli_num_rows($answer);

		 for($i=1;$i<=$result;$i++)
                     
      {
           $row = mysqli_fetch_array($answer);
           
           return $row['answer_option'];
 }
       	mysqli_close($db);
}


            

			$marks = 0;

			if($orignal_answer == $_POST['answer_option'])
			{

				$marks = '+'. $exam_right_answer_mark;
			}
			else
			{
				$marks = '-' . $exam_wrong_answer_mark;
			}

			
			$user_answer_option	=$_POST['answer_option'];
			$marks = $marks;
	

$up_query=" INSERT INTO user_exam_question_answer (user_answer_option,marks,user_id,exam_id,question_id) VALUES ('$user_answer_option','$marks',".$_SESSION['user_id'].",".$_POST['exam_id'].",".$_POST['question_id'].")";

	$insert_answer=mysqli_query($db,$up_query);
    	

		
		mysqli_close($db);
?>
