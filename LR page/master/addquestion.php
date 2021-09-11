<?php

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db = mysqli_connect('localhost','root', '','online_examination' );
    $online_exam_id		= $_POST['online_exam_id'];
	$question_title		=trim($_POST['question_title']);
    $answer_option		=$_POST['answer_option'];
    $option_1      = trim($_POST['option_title_1']);
    $option_2      = trim($_POST['option_title_2']);
	$option_3     =  trim($_POST['option_title_3']);
	$option_4      = trim($_POST['option_title_4']);
					

   $questionquery = "INSERT INTO question_table (online_exam_id, question_title,option_1,option_2,option_3,option_4,answer_option) VALUES ($online_exam_id, '$question_title','$option_1','$option_2','$option_3','$option_4','$answer_option')";
	
	$question=mysqli_query($db,$questionquery);
	 
	
			if($question) {
              	echo 1;
              } 
              else{
              	echo 0;
              }
        
		
	?>
