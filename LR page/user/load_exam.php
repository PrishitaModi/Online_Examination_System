<?php

$db = mysqli_connect('localhost','root', '','online_examination' );

		$query="SELECT online_exam_title 
			FROM online_exam_table 
			WHERE online_exam_status ='Created' OR online_exam_status = 'Pending' 
			ORDER BY online_exam_title ASC ";
	$result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){

       $output =mysqli_fetch_all($result,MYSQLI_ASSOC);
       echo json_encode($output);
 
        }
else
{
    	echo "NO EXAM SCHEDULED";
    }

		
		
?>	