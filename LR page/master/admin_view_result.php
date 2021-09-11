<?php
session_start();
include('Examination.php');
include('server.php');

$exam = new Examination;

$db = mysqli_connect('localhost','root', '','online_examination' );

 $exam_id=Get_exam_id($_POST["code"]);

 function Get_exam_id(int $exam_code)
	{
		$db = mysqli_connect('localhost','root', '','online_examination' );
		$query = "
		SELECT online_exam_id FROM online_exam_table 
		WHERE online_exam_code = '$exam_code'
		";
		$result = mysqli_query($db,$query);
        $adminid=mysqli_num_rows($result);
        for($i=1;$i<=$adminid;$i++)
            {
            	         $row = mysqli_fetch_array($result);
            	         {

              		            return $row['online_exam_id'];
		                }
	        }
	 }

			
 ?>
<div class="card-body">
<div class="table-responsive">
			<table id=""class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>User Name</th>
						<th>Attendance Status</th>
						<th>Marks</th>
					</tr>
				</thead>
			

<?php
$vquery = "
			SELECT user_table.user_id, user_table.user_name, sum(user_exam_question_answer.marks) as total_mark  
			FROM user_exam_question_answer  
			INNER JOIN user_table 
			ON user_table.user_id = user_exam_question_answer.user_id 
			WHERE user_exam_question_answer.exam_id = '$exam_id' 
			";
			 $vresult = mysqli_query($db,$vquery);
			  $vusers=mysqli_num_rows($vresult);
             for($i=1;$i<=$vusers;$i++)
                     
                      {
            	         $rows = mysqli_fetch_array($vresult);
            	        

            	         ?>



<?php


	    $admin_view_query = "
			SELECT 	user_table.user_name, sum(user_exam_question_answer.marks) as total_mark  
			FROM user_exam_question_answer  
			INNER JOIN user_table 
			ON user_table.user_id = user_exam_question_answer.user_id 
			WHERE user_exam_question_answer.exam_id = '$exam_id' 
			GROUP BY user_exam_question_answer.user_id 
			ORDER BY total_mark DESC
			";
			
			 $result = mysqli_query($db,$admin_view_query);
             $view=mysqli_num_rows($result);
             for($i=1;$i<=$view;$i++)
                     
                      {
            	         $row = mysqli_fetch_array($result);
            	         $total=$row['total_mark'];

            	         ?>

                    <tr>
							
							<td><?php echo $row["user_name"]; ?></td>
					
						 <?php
						 $attedance=Get_user_exam_status($exam_id, $rows["user_id"]);?>
						 <td><?php echo $attedance;?></td>
					 
							<td><?php echo $total; ?></td>
						</tr>

						<?php
					}
				}

					?> 
					</table>
		</div>
	</div>
	<?php
	function Get_user_exam_status($exam_id, $user_id)
	{
		$db = mysqli_connect('localhost','root', '','online_examination' );
		$query = "SELECT attendance_status FROM user_exam_enroll_table WHERE exam_id = '$exam_id' AND user_id = '$user_id'";
		 $results = mysqli_query($db,$query);
     $views=mysqli_num_rows($results);
       for($i=1;$i<=$views;$i++)
                     
          {
            $row = mysqli_fetch_array($results);
            	        
			return $row["attendance_status"];
		}
	}
	?>
	 
					

					



			
			

			
				
				

