<?php 

include('server.php');


      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $db = mysqli_connect('localhost','root', '','online_examination' );
  

                 $admin_id	       =$_SESSION["admin_id"];
			    $question_id        =$_POST["question_id"]; 
			    $question_title    =trim($_POST["question_title"]);
			    $option_1     =trim($_POST["option_1"]);
				$option_2	=   trim($_POST["option_2"]);
				$option_3	=	trim($_POST["option_3"]);
				$option_4		=trim($_POST["option_4"]);
				$answer_option=	trim($_POST["answer_option"]);
				

				
					
			$updatequery = "
			UPDATE `question_table` 
			SET question_title='{$question_title}',option_1 ='{$option_1}',option_2 ='{$option_2}',option_3 ='{$option_3}', option_4 = '{$option_4}', answer_option ='{$answer_option}'  
			WHERE question_id = $question_id     
			";
			
			 $success=mysqli_query($db,$updatequery);

              
        header("Location:question.php");
        mysqli_close($db);
    
	
    
    

            // if($success)
            // {
            // 	echo 1;

            // }else
            // {
            // 	echo 0;
            // }

    
    ?>
  
 