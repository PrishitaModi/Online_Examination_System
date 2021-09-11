<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// include('Examination.php');
include('server.php');
// $exam = new Examination;

 $db = mysqli_connect('localhost','root', '','online_examination' );

$examquery ="SELECT * FROM user_exam_enroll_table 
			INNER JOIN online_exam_table 
			ON online_exam_table.online_exam_id = user_exam_enroll_table.exam_id 
			WHERE user_exam_enroll_table.user_id = '".$_SESSION['user_id']."'";
 
$result = mysqli_query($db,$examquery);
$adminid=mysqli_num_rows($result);
 for($i=1;$i<=$adminid;$i++)
                     
                {
            	         $row = mysqli_fetch_array($result);
                        $exam_code =$row["online_exam_code"];
                 }


function Get_exam_id(int $exam_code)
	{
	    $db = mysqli_connect('localhost','root', '','online_examination' );

		$query = "
		SELECT online_exam_id FROM online_exam_table 
		WHERE online_exam_code = '$exam_code'
		";

	 $result = mysqli_query($db,$query);
    $examid=mysqli_num_rows($result);

		foreach($result as $row)
		{
			return $row['online_exam_id'];
		}
	}


	
 $exam_id =Get_exam_id($exam_code);
$completed_query = "
	SELECT * FROM question_table 
	INNER JOIN user_exam_question_answer 
	ON user_exam_question_answer.question_id = question_table.question_id 
	WHERE question_table.online_exam_id = '$exam_id' 
	AND user_exam_question_answer.user_id = '".$_SESSION["user_id"]."'
	";
 $completed_result = mysqli_query($db,$completed_query);
$completed_rows=mysqli_num_rows($completed_result);
?>

		<div class="card-body">
			<div class="table-responsive">
				<table id="" class="table table-bordered table-hover">
					<thead>
		        	<tr>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Your Answer</th>
						<th>Answer</th>
						<th>Result</th>
						<th>Marks</th>
					</tr>

		</thead>
		 <?php
              for($i=1;$i<=$completed_rows;$i++)
                     
                {
            	         $srow = mysqli_fetch_array($completed_result);

            	 ?>
            
               <tr>
						<td><?php echo $srow["question_title"] ;?></td>
                        <td><?php echo $srow["option_1"] ;?></td>
						<td><?php echo $srow["option_2"] ;?></td>
						<td><?php echo $srow["option_3"] ;?></td>
						<td><?php echo $srow["option_4"]; ?></td>
						<td>option<?php echo $srow["user_answer_option"] ?></td>
						<td>option<?php echo $srow["answer_option"] ?></td>
						<td>

							
                       <?php
                        
                     
      //                 $tquery = "SELECT * 
						// FROM user_exam_question_answer 
						// WHERE question_id = '".$srow["question_id"]."' AND user_id='".$_SESSION["user_id"]."'";
						// $mresult = mysqli_query($db,$tquery);
      //                   $mrows=mysqli_num_rows($mresult);
      //                    for($i=1;$i<=$mrows;$i++)
                     
      //                     {
      //       	               $trow = mysqli_fetch_array($mresult);
      //       	                //$marks = $trow['marks'];
            	           
            	           

					if($srow['marks'] == '0')
						{
							echo $question_result ='<h4 class="badge badge-dark">Not Attend</h4>';
						}

						if($srow['marks'] > '0')
						{
							echo $question_result = '<h4 class="badge badge-success">Right</h4>';
						}

						if($srow['marks'] < '0')
						{
							echo $question_result = '<h4 class="badge badge-danger">Wrong</h4>';
						}
					

						?>
						</td>
						
						<td><?php echo $srow["marks"]; ?></td>
						</tr>
				<?php
					}	
						
					$m_query ="SELECT SUM(marks) as total_mark FROM user_exam_question_answer 
					WHERE user_id = '".$_SESSION['user_id']."' 
					AND exam_id = '".$exam_id."'
					";

					$marks_result=mysqli_query($db,$m_query);
					$m_rows=mysqli_num_rows($marks_result);
					for($i=1;$i<=$m_rows;$i++)
					{

					  $rows=mysqli_fetch_array($marks_result);
                      $total=$rows['total_mark'];
				
					?>
					<tr>
						<td colspan="8" align="right">Total Marks</td>
						<td align="right"><?php echo $total; ?></td>
					</tr>
					<?php	
					}

					?>
						</table>

		</div>

	</div>
</div>
			
					
					