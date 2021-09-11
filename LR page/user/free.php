<!-- <?php
						
      //              $total_mark = 0;
                
      //           	$db = mysqli_connect('localhost','root', '','online_examination' );
						// $cquery = "SELECT * 
						// FROM question_table 
						// WHERE question_id = '".$row["question_id"]."'
						// ";
						// $cresult = mysqli_query($db,$cquery);
      //                  $crows=mysqli_num_rows($cresult);
	

						// // //$sub_result = $exam->query_result();
						// $user_answer = '';
						// $orignal_answer = '';
						// $question_result = '';
                       


						// if($row['marks'] == '0')
						// {
						// 	echo $question_result = '<h4 class="badge badge-dark">Not Attend</h4>';
						// }

						// if($row['marks'] > '0')
						// {
						// 	echo $question_result = '<h4 class="badge badge-success">Right</h4>';
						// }

						// if($row['marks'] < '0')
						// {
						// 	echo $question_result = '<h4 class="badge badge-danger">Wrong</h4>';
						// }
						// ?>

						
						
						// <?php
						// for($i=1;$i<=$crows;$i++)
                     
      //           {
     //        	         $sub_row = mysqli_fetch_array($cresult);
     //            ?>

						
					// 	 <td><?php echo $sub_row["option_title"];?></td>
					// 	 <?php

					// 		if($sub_row["option_number"] == $row['user_answer_option'])
					// 		{
					// 			$user_answer = $sub_row['option_title'];
					// 		}

					// 		if($sub_row['option_number'] == $row['answer_option'])
					// 		{
					// 			$orignal_answer = $sub_row['option_title'];
					// 		}
					// 	}

					// 	echo '
					// 	<td>'.$user_answer.'</td>
					// 	<td>'.$orignal_answer.'</td>
					// 	<td>'.$question_result.'</td>
					// 	<td>'.$row["marks"].'</td>
					// </tr>
					// 	';
					// }

					// $marksquery = "
					// SELECT SUM(marks) as total_mark FROM user_exam_question_answer 
					// WHERE user_id = '".$_SESSION['user_id']."' 
					// AND exam_id = '".$exam_id."'
					// ";

     //    $m_result = mysqli_query($db,$marksquery);

// $m_rows=mysqli_num_rows($m_result);
// 	        for($i=1;$i<=$m_rows;$i++)
                     
//                 {
//             	         $row = mysqli_fetch_array($m_result);
//                 ?>


					
					<tr>
						<td colspan="8" align="right">Total Marks</td>
						<td align="right"><?php echo $row["total_mark"]; ?></td>
					</tr>
					<?php	
					}

					?>
				</table>
			</div>
		</div>
	</div>
<?php
}

?> -->