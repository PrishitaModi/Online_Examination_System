<?php
error_reporting(0);
//require_once('class/pdf.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include('server.php');
require_once("dompdf/autoload.inc.php");



//$exam = new Examination;



$db = mysqli_connect('localhost','root', '','online_examination' );







$output='';
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



 $pdfquery = "
	SELECT * FROM question_table 
	INNER JOIN user_exam_question_answer 
	ON user_exam_question_answer.question_id = question_table.question_id 
	WHERE question_table.online_exam_id = '$exam_id' 
	AND user_exam_question_answer.user_id = '".$_SESSION["user_id"]."'
	";
	 $completed_result = mysqli_query($db,$pdfquery);
$completed_rows=mysqli_num_rows($completed_result);

$userquery = "SELECT * FROM user_table 
			WHERE user_id = '".$_SESSION["user_id"]."'
			";
 $userresult = mysqli_query($db,$userquery);
 $user=mysqli_num_rows($userresult);
 for($i=1;$i<=$user;$i++)
                      {
            	         $userrow = mysqli_fetch_array($userresult);


                  $output=
                          '
					<table width="30%" border="1" cellpadding="2" cellspacing="0">
						<tr>
							<th>Student Name</th>
							<td>'.$userrow["user_name"].'</td>
						</tr>
						<tr>
						     <th>Student Email ID</th>
							<td>'.$userrow["user_email_address"].'</td>
						</tr>
						</table>
					
						';
					}

	 


	 $output .='
	 <h3 align="center">Exam Result</h3>
	<table width="100%" border="2" cellpadding="5" cellspacing="0">
		<thead>
		<tr>
			<th>Question</th>
			<th>Option 1</th>
			<th>Option 2</th>
			<th>Option 3</th>
			<th>Option 4</th>
			<th>Your Answer</th>
			<th>Answer</th>
		     <th>Marks</th>
		</tr>
      </thead>
		';
		$option_1="";
            	         $option_2="";
            	         $option_3="";
            	         $option_4="";
            	         $user_answer_option="";
            	         $answer_option="";

		
              for($i=1;$i<=$completed_rows;$i++)
                     
                {
            	         $srow = mysqli_fetch_array($completed_result);
            	         $question_title=$srow["question_title"];
            	         $option_1=$srow["option_1"];
            	         $option_2=$srow["option_2"];
            	         $option_3=$srow["option_3"];
            	         $option_4=$srow["option_4"];
            	         $user_answer_option=$srow["user_answer_option"];
            	         $answer_option=$srow["answer_option"];


               $output .='<tr>
						<td>'.$question_title.'</td>
						 <td>'.$option_1.'</td>
						<td>'.$option_2.'</td>
						<td>'.$option_3.'</td>
						<td>'.$option_4.'</td>
						
                       <td>option'.$user_answer_option.'</td>
						<td>option'.$answer_option.'</td>
						
						
						';

            
              
							
                  
                  if($srow['marks'] == '0')
						{
						    $question_result ='<h4 class="badge badge-dark">Not Attend</h4>';
							 $marks=$srow["marks"];
						}

						if($srow['marks'] > '0')
						{
							echo $question_result = '<h4 class="badge badge-success">Right</h4>';
							$marks=$srow["marks"];
						}

						if($srow['marks'] < '0')
						{
							echo $question_result = '<h4 class="badge badge-danger">Wrong</h4>';
							$marks=$srow["marks"];
						}
					

						
					

						 $output .='

						
						
						
						<td>'.$marks.'</td>
						</tr>
						';
					
				
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
			

						 $output .='
					<tr>
						<td colspan="7" align="right">Total Marks</td>
						<td align="center">'. $total.'</td>
					</tr>';
					
						
					}

					
						


   $output .= '</table>';


   use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
ob_end_clean();

// Output the generated PDF to Browser
$dompdf->stream('StudentExamResult.pdf');

 // $pdf = new Pdf();

 // 	$pdf->set_paper('A4','landscape');

 // 	$file_name = 'Exam Result.pdf';

 // 	$pdf->loadHtml($output);

 // 	$pdf->render();

	// $pdf->stream($file_name, array("Attachment" => false));
 // 	exit(0);
 	?>











	?>
			
					
					



	
    




















