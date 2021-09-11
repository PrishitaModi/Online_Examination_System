<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include('Examination.php');
include('server.php');
$exam = new Examination;
 $db = mysqli_connect('localhost','root', '','online_examination' );
//$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

//-----------------------------------------------------------ADMIN EXAM DETAILS----------------------------------------------
$examquery = "SELECT * FROM user_exam_enroll_table 
			INNER JOIN online_exam_table 
			ON online_exam_table.online_exam_id = user_exam_enroll_table.exam_id 
			WHERE user_exam_enroll_table.user_id = '".$_SESSION['user_id']."'";

$result = mysqli_query($db,$examquery);
$adminid=mysqli_num_rows($result);
?>

        <div class="card-body">
		<div class="table-responsive">
		<table id="" class="table table-bordered table-striped table-hover">
		<thead>
		<tr>
						<th>Exam Title</th>
						<th>Date & Time</th>
						<th>Duration</th>
						<th>Total Question</th>
						<th>Right Answer Mark</th>
						<th>Wrong Answer Mark</th>
						<th>Status</th>
						<th>Action</th>
		</tr>
		</thead>
		 <?php
              for($i=1;$i<=$adminid;$i++)
                     
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

					    // $exam_start_time="14:55:00";
					    // $duration="00:05:00";
					    //  $exam_endd_time =strtotime($exam_start_time . '+' . $duration);
         //                 $exam_end_time = date('Y-m-d H:i:s', $exam_endd_time);
					    //  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
		              


		              $Time =$row["online_exam_datetime"];
                      $dt = new DateTime($Time);

                     $exam_start=$dt->format('H:i:s');


					 $exam_start_time= $row["online_exam_datetime"];

			          $duration = '00:'.$row["online_exam_duration"].':00';

			          $exam_endd_time =strtotime($exam_start. '+' . $duration);

		             $exam_end_time = date('Y-m-d H:i:s', $exam_endd_time);

		           	$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
		           
					    	
					  if($exam_start_time > $current_datetime)
	             	{
	             		// $db = mysqli_connect('localhost','root', '','online_examination' );


		              	$statusquery ="
			                      	UPDATE online_exam_table 
			                       	SET online_exam_status ='Pending' 
				                      WHERE online_exam_id ='".$row['online_exam_id']."'
				                     ";
				         $status_exam=mysqli_query($db,$statusquery);
		                   
		            }

		            
		            elseif($current_datetime >= $exam_start_time && $current_datetime <= $exam_end_time)

                { 
                	 //$db = mysqli_connect('localhost','root', '','online_examination' );


                   $status_started_query = "UPDATE online_exam_table 
			                              	 SET online_exam_status ='Started' 
				                              WHERE online_exam_id ='".$row['online_exam_id']."'
				                               ";

				    $status_started_exam=mysqli_query($db,$status_started_query);
		                  
		             }

			          else{

                                   if($current_datetime > $exam_end_time)
			          	{
					            

                               $finish_exam="
                            UPDATE online_exam_table
                            SET online_exam_status='Completed' 
                            WHERE online_exam_id =".$row['online_exam_id']."
                            ";
					                                    

					       $completed_exam=mysqli_query($db,$finish_exam);
					         }
					     }
		           	
					if($row["online_exam_status"] == 'Pending')
				            {
					          echo $status ='<span class="badge badge-success">Pending</span>';
				            }
					           if($row["online_exam_status"] == 'Created')
				            {
					          echo $status ='<span class="badge badge-success">Created</span>';
				            }

				            if($row["online_exam_status"] == 'Started')
				            {
					           echo $status = '<span class="badge badge-primary">Started</span>';
				             }

				            if($row["online_exam_status"] == 'Completed')
				             {
					            echo $status = '<span class="badge badge-dark">Completed</span>';
				              }

				      ?>
			</td>
					 
					 <td>
				<?php
				if($row["online_exam_status"] == 'Started')
				{
					echo $view_exam ='<a href="view_exam.php?code='.$row["online_exam_code"].'" class="btn btn-info btn-sm">View Exam</a>';
				}
				
				if($row["online_exam_status"] == 'Completed')
				{
					echo $view_exam = '<a href="view_completed_exam.php?code='.$row["online_exam_code"].'" class="btn btn-info btn-sm">View Exam</a>';
				}

					
               ?>
		</td>
			
		
<?php 

			}	
				
		
?>

	
		</tr> 

				
			
</table>

		</div>

	</div>
</div>


<!-- ----------------------------------------------------------------------------------------------------------------------

			$exam->query = "
			SELECT * FROM user_exam_enroll_table 
			INNER JOIN online_exam_table 
			ON online_exam_table.online_exam_id = user_exam_enroll_table.exam_id 
			WHERE user_exam_enroll_table.user_id = '".$_SESSION['user_id']."'";

			$total_rows = $exam->total_row();

			$data = array();

			foreach($result as $row)
			{
				$sub_array = array();
				$sub_array[] = html_entity_decode($row["online_exam_title"]);
				$sub_array[] = $row["online_exam_datetime"];
				$sub_array[] = $row["online_exam_duration"] . ' Minute';
				$sub_array[] = $row["total_question"] . ' Question';
				$sub_array[] = $row["marks_per_right_answer"] . ' Mark';
				$sub_array[] = '-' . $row["marks_per_wrong_answer"] . ' Mark';
				$status = '';

				if($row['online_exam_status'] == 'Created')
				{
					$status = '<span class="badge badge-success">Created</span>';
				}

				if($row['online_exam_status'] == 'Started')
				{
					$status = '<span class="badge badge-primary">Started</span>';
				}

				if($row['online_exam_status'] == 'Completed')
				{
					$status = '<span class="badge badge-dark">Completed</span>';
				}

				$sub_array[] = $status;				

				if($row["online_exam_status"] == 'Started')
				{
					$view_exam = '<a href="view_exam.php?code='.$row["online_exam_code"].'" class="btn btn-info btn-sm">View Exam</a>';
				}
				if($row["online_exam_status"] == 'Completed')
				{
					$view_exam = '<a href="view_exam.php?code='.$row["online_exam_code"].'" class="btn btn-info btn-sm">View Exam</a>';
				}

				
				$sub_array[] = $view_exam;

				$data[] = $sub_array;
			}

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			echo json_encode($output);
		}
	}
 -->