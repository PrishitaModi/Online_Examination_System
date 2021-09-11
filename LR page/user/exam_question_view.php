<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include('server.php');

$db = mysqli_connect('localhost','root', '','online_examination' );
date_default_timezone_set('Asia/Calcutta');
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));


		
  if($_POST['question_id'] == '')
{
	$question_query = "
				SELECT * FROM question_table 
				WHERE online_exam_id = '".$_POST["exam_id"]."' 
				ORDER BY question_id ASC 
				LIMIT 1
				";


         $result = mysqli_query($db,$question_query);
        $user=mysqli_num_rows($result);
			}
			else
			{
				$query = "
				SELECT * FROM question_table 
				WHERE question_id = '".$_POST["question_id"]."' 
				";

            $result = mysqli_query($db,$query);
            $user=mysqli_num_rows($result);
			}

			for($i=1;$i<=$user;$i++)
                      {
            	         $row = mysqli_fetch_array($result);

 ?>
                <h1><?php echo $row["question_title"] ;?></h1>
				<hr />
				<br />
				<div class="row"> 
				
				<?php

				$query = "
				SELECT option_1,option_2,option_3,option_4 FROM question_table 
				WHERE question_id = '".$row['question_id']."'
				";
				$result = mysqli_query($db,$query);
                $quser=mysqli_num_rows($result);

				
				for($i=1;$i<=$quser;$i++)
                     
                {
            	         $sub_row = mysqli_fetch_array($result);
                ?>

					<div class="col-md-6" style="margin-bottom:32px;">
						<div class="radio">
						<label><h4><input type="radio" name="option_1" id="answer_option" 
							data-question_id='<?php echo $row['question_id'];?>'
							data-id="1"/>&nbsp;<?php echo $sub_row['option_1'];?></h4></label>
						</div>
					</div>
					<div class="col-md-6" style="margin-bottom:32px;">
						<div class="radio">
<label><h4> <input type="radio" name="option_1" id="answer_option" data-question_id='<?php echo $row['question_id'];?>' data-id="2"/>&nbsp;<?php echo $sub_row['option_2'];?></h4></label>
						</div>
					</div>
					<div class="col-md-6" style="margin-bottom:32px;">
						<div class="radio">
						<label><h4><input type="radio" name="option_1" id="answer_option" data-question_id='<?php echo $row['question_id'];?>'data-id="3"/>&nbsp;<?php echo $sub_row['option_3'];?></h4></label>
						</div>
					</div>
					<div class="col-md-6" style="margin-bottom:32px;">
						<div class="radio">
						<label><h4><input type="radio" name="option_1" id="answer_option" data-question_id='<?php echo $row['question_id'];?>' data-id="4"/>&nbsp;<?php echo $sub_row['option_4'];?></h4></label>
						</div>
					</div>
				</div>


				 <?php

					
				}
			}

		
            ?>
				</div>
				<?php
				// $db = mysqli_connect('localhost','root', '','online_examination' );

				
				// $previous_query = "
				// SELECT question_id FROM question_table 
				// WHERE question_id < '".$row['question_id']."' 
				// AND online_exam_id = '".$_POST["exam_id"]."' 
				// ORDER BY question_id DESC 
				// LIMIT 1";
				
				// $previous_result = mysqli_query($db,$previous_query);
    //             $quser=mysqli_num_rows($previous_result);
    //             $previous_id = '';
				
				// for($i=1;$i<=$quser;$i++)
                     
    //             {
    //         	     $previous_row= mysqli_fetch_array($previous_result);
                
				// 	$previous_id = $previous_row['question_id'];
				// }

				$nextquery = "
				SELECT question_id FROM question_table 
				WHERE question_id > '".$row['question_id']."' 
				AND online_exam_id = '".$_POST["exam_id"]."' 
				ORDER BY question_id ASC 
				LIMIT 1";
				$next_result = mysqli_query($db,$nextquery);
                $next_user=mysqli_num_rows($next_result);
                $next_id = '';
                for($i=1;$i<=$next_user;$i++)
                     
                {
            	         $next_row= mysqli_fetch_array($next_result);
                
					    $next_id = $next_row['question_id'];

				}

  				
				// $if_previous_disable = '';
			 $if_next_disable = '';

				// if($previous_id == "")
				// {
				// 	$if_previous_disable = 'disabled';
				// }
			 ?>
			 <br /><br />

				  	<div align="center">
				  		<?php
				


				if($next_id == "")
				{
					//$if_next_disable = 'disabled';
				
				echo '<input type="submit" id="submit" class="btn btn-warning">';

				   	
				   	 

				}else{

					echo $next='<button type="button" name="next" class="btn btn-warning btn-lg next" id="'.$next_id.'" '.$if_next_disable.'>Next</button>';
				   	
				}
?>
					<!-- echo $next='<button type="button" name="next" class="btn btn-warning btn-lg next" id="'.$next_id.'" '.$if_next_disable.'>Next</button>';
				   	 -->

					
					<!-- <br /><br />

				  	<div align="center">
				  		
				  		 
                      <?php

				   	// echo $previous='<button type="button" name="previous" class="btn btn-info btn-lg previous" id="'.$previous_id.'" '.$if_previous_disable.'>Previous</button>';

				   	
				   	
				   	
				   	 
				   	 ?>

				   	 --> 
				   	</div>
				   
				  	</div>

				  	<br /><br />

	<!-- <script type="text/javascript">


$('submit').click(function() {
    alert("hiii");		
});
</script>
	 -->		
		

				
		
	 