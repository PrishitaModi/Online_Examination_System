<?php
session_start();

include('Examination.php');
include('server.php');
$exam = new Examination;
 $db = mysqli_connect('localhost','root', '','online_examination' );
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
$conn=$db;
$examquery = "SELECT * FROM online_exam_table WHERE admin_id =".$_SESSION["admin_id"]." ";
$result = mysqli_query($conn,$examquery);
$adminid=mysqli_num_rows($result);

?>

<table class="table table-bordered table-striped table-hover">
		 <thead>
		<tr>
						<th>Exam Title</th>
						<th>Date & Time</th>
						<th>Duration</th>
						<th>Total Question</th>
						<th>Right Answer Mark</th>
						<th>Wrong Answer Mark</th>
						<th>Status</th>
						<th>Questions</th>
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

					
						
					    
									    	
<!---------------------------------------STATUS UPDATE------------------------------------------------------------->
<?php 
					   	 $exam_start_time = $row["online_exam_datetime"];

			          $duration = $row["online_exam_duration"] . ' minute';

			          $exam_end_time = strtotime($exam_start_time . '+' . $duration);

		           	$exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
		          
		           date_default_timezone_set('Asia/Calcutta'); 

              $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
		           
					    	
	        if($exam_start_time > $current_datetime)
	             	{
	             		 $db = mysqli_connect('localhost','root', '','online_examination' );


		              	$statusquery="
			                      	UPDATE online_exam_table 
			                       	SET online_exam_status ='Pending' 
				                       WHERE online_exam_id ='".$row['online_exam_id']."'
				                        ";
				               
				                 $status_exam=mysqli_query($db,$statusquery);
		                   
		             }
	 elseif($current_datetime >= $exam_start_time && $current_datetime <= $exam_end_time)

                { 
                           $db = mysqli_connect('localhost','root', '','online_examination' );


                   $status_started_query = "
				                             UPDATE online_exam_table 
			                              	 SET online_exam_status ='Started' 
				                              WHERE online_exam_id ='".$row['online_exam_id']."'
				                               ";

				         $status_started_exam=mysqli_query($db,$status_started_query);
		                  
		             }

	else 
		//($current_datetime > $exam_end_time)
			          	{
					            
                         $completed_query="UPDATE online_exam_table SET online_exam_status='Completed'
                         WHERE online_exam_id ='".$row['online_exam_id']."'";
					                                    

					              $completed_exam=mysqli_query($db,$completed_query);
					        }
		           	
					 
//--------------------------------------------------------------------------------------------------------------->	
?>	
	<td>
            	<?php 

					    	if($row['online_exam_status'] == 'Pending')
				            { 
				             echo $status = '<span class="badge badge-warning">Pending</span>';
				        
				            }
				           
				            if($row['online_exam_status'] == 'Created')
				            {
					          echo $status = '<span class="badge badge-success">Created</span>';
				            }

				            if($row['online_exam_status'] == 'Started')
				            {
					           echo $status = '<span class="badge badge-primary">Started</span>';
				             }

				            if($row['online_exam_status'] == 'Completed')
				             {
					            echo $status = '<span class="badge badge-dark">Completed</span>';
				              }
				      ?>
			</td>
					 <td>
					<?php
                               
                       if($exam->Is_allowed_add_question($row['online_exam_id']))
				        
				        {
					        echo  $question_button = '<button type="button" name="add_question" class="btn btn-info btn-sm add_question" id="'.$row['online_exam_id'].'">Add Question</button>';
				        }
				         else
			        	{

					     echo $question_button = '<a href="question.php?code='.$row['online_exam_id'].'" class="btn btn-warning btn-sm">View Question</a>';
			        	}
			?>
		</td>
			
			<td>
			<?php
			//if($exam->Is_exam_is_not_started($row["online_exam_id"]))
		if($row["online_exam_status"]=='Pending')
		{
			
		       echo	$edit_button = '
		  			<button type="button" name="edit" class="btn btn-primary btn-sm edit" data-id="'.$row['online_exam_id'].'">Edit</button>
					';
			 
              echo $delete_button='<button type="button" name="delete" class="btn btn-danger btn-sm delete" id="'.$row['online_exam_id'].'"> Delete</button>';

		}	
			
		
		if($row["online_exam_status"]=='Completed')
		{
			 echo $result_button ='<a href="admin_exam_result.php?code='.$row['online_exam_code'].'" class="btn btn-dark btn-sm result">Result</a>';
			        	



		}

					
		    
?>
</td>
	
		</tr> 
<?php
		}
?>
				
			
</table>

		</div>

	</div>
</div>




