<?php


//pdf_exam_result.php

include("Examination.php");

//require_once('class/pdf.php');
require_once("dompdf/autoload.inc.php");
//require_once("dompdf/dompdf_config.inc.php");

$exam = new Examination;
$db = mysqli_connect('localhost','root', '','online_examination' );

$exam_id =Get_exam_id($_GET["code"]);

$query = "
	SELECT user_table.user_id, user_table.user_name, sum(user_exam_question_answer.marks) as total_mark  
	FROM user_exam_question_answer  
	INNER JOIN user_table 
	ON user_table.user_id = user_exam_question_answer.user_id 
	WHERE user_exam_question_answer.exam_id = '$exam_id' 
	GROUP BY user_exam_question_answer.user_id 
	ORDER BY total_mark DESC
	";
	$pdfresult = mysqli_query($db,$query);
    $pdfrows=mysqli_num_rows($pdfresult);

	$output = 
	'<html><body>
	<h2 align="center">Exam Result</h2><br/>
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
		<tr>
		<th>Student Name</th>
		<th>Attendance Status</th>
		<th>Marks</th>
		</tr>
	';

	 for($i=1;$i<=$pdfrows;$i++)
       {
             $row = mysqli_fetch_array($pdfresult);
             // $attendance=Get_user_exam_status($exam_id, $rows["user_id"]);
             // $total=$row['total_mark'];
             // $username=$row['user_name'];
	
    $output .= 
		'<tr>
		<td align="center">'.$row["user_name"].'</td>
		<td align="center">'.Get_user_exam_status($exam_id, $row["user_id"]).' </td>
		<td align="center">'.$row["total_mark"].'</td>
		</tr>
		';

		
	}

	$output .= '</table>
	</body>
	</html>';
	


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
$dompdf->stream('ExamResultlist.pdf');


	


?>
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
