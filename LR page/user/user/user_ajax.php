<?php
session_start();
include('Examination.php');
include('server.php');
$exam = new Examination;
 $db = mysqli_connect('localhost','root', '','online_examination' );
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
$conn=$db;
//-----------------------------------------------------------USEREXAMDETAILS----------------------------------------------

$examquery="SELECT * FROM `online_exam_table` WHERE online_exam_title = '".$_POST['exam']."'";
$result = mysqli_query($conn,$examquery);



$queryexam_id="SELECT online_exam_id FROM `online_exam_table` WHERE online_exam_title = '".$_POST['exam']."'";
$exam_id=mysqli_query($conn,$queryexam_id);
$exam_result=mysqli_num_rows($exam_id);


$examlist=mysqli_num_rows($result);
if(mysqli_num_rows($result)>0)
{
?>
<br><br>
 <div class="card-body">
		<div class="table-responsive">
		<table  id="" class="table table-bordered table-striped table-hover">
		<thead>
		<tr>
						<th>Exam Title</th>
						<th>Date & Time</th>
						<th>Duration</th>
						<th>Total Question</th>
						<th>Right Answer Mark</th>
						<th>Wrong Answer Mark</th>
						<th>Status</th>
						
		</tr>
		</thead>
		 <?php
              for($i=1;$i<=$examlist;$i++)
                     
                {
            	         $row = mysqli_fetch_array($result);

            	 ?>
            
             <tr>
						<td><?php echo $row["online_exam_title"] ;?></td>
            <td><?php echo $row["online_exam_datetime"] ;?></td>
						<td><?php echo $row["online_exam_duration"] ;?>Minutes</td>
						<td><?php echo $row["total_question"] ;?>Questions</td>
						<td><?php echo $row["marks_per_right_answer"]; ?>Marks</td>
						<td>-<?php echo $row["marks_per_wrong_answer"] ?>Marks</td>

			<td>
				<?php

				if($exam->If_user_already_enroll_exam($row["online_exam_id"], $_SESSION["user_id"]))
				{
					
		       $enroll_button ='<button type="button" name="enroll_button" class="btn btn-info">You Already Enroll it</button>';
				}
				else
				{
			       $enroll_button ='
					
							<button type="button" name="enroll_button" id="enroll_button" class="btn btn-warning" data-exam_id="'.$row["online_exam_id"].'">Enroll it</button>
						
					
					';
					
				}
				echo $enroll_button;
				?>

				</td>
				<?php
			}

		}



    else
{
	echo "NO RECORD FOUND";

}

?> 	

						



























































































 