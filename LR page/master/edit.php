<?php

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db = mysqli_connect('localhost','root', '','online_examination' );
    $online_exam_id=$_POST['online_exam_id'];

                  

      $query = "SELECT * FROM online_exam_table WHERE online_exam_id = '".$_POST["online_exam_id"]."'";  
      $result = mysqli_query($db, $query);  
      $output="";
     
      
      if(mysqli_num_rows($result)>0)
      {
           
            while($row = mysqli_fetch_assoc($result))
            {
                  ?>
                  <head>
                   <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
                  <script src="../style/bootstrap-datetimepicker.js"></script>
            </head>
                   <div class='modal-dialog modal-lg'>
                        <form class="post-form" action="editdetails.php" method="post">
                 <div class='modal-content'>
                        
                  <div class='modal-header'>
                        <h4 class='modal-title' id='edit_modal_title'>EDIT EXAM DETAILS</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div> 
                  <div class='modal-body'>
                         <div class='form-group'>
                       <div class='row'>
                           
                      
                       <label class='col-md-4 text-right'>Exam Title <span class='text-danger'>*</span></label>
                     <div class='col-md-8'>
<input type='hidden' name='online_exam_id' value='<?php echo $row["online_exam_id"];?>'/>
<input type='text' name='edit_online_exam_title' id='edit_online_exam_title' value='<?php echo $row["online_exam_title"];?>' class='form-control' required />


                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Exam Date & Time <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' name='edit_online_exam_datetime' id='edit_online_exam_datetime' value='<?php echo $row["online_exam_datetime"] ;?>' class='form-control' required />
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Exam Duration in Minutes <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text'name='edit_online_exam_duration' id='edit_online_exam_duration' value='<?php echo $row["online_exam_duration"] ;?>' class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Total Question <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' name='edit_total_question' id='edit_total_question' value='<?php echo $row["total_question"] ;?>'class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Marks for Right Answer <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' name='edit_marks_per_right_answer' id='edit_marks_per_right_answer' value='<?php echo $row["marks_per_right_answer"] ;?>' class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Marks for Wrong Answer <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' name='edit_marks_per_wrong_answer' id='edit_marks_per_wrong_answer' value='<?php echo $row["marks_per_wrong_answer"] ;?>' class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>

                  </div>

                 
                  <div class='modal-footer'>
                       <!--  <input type='hidden' name='online_exam_id' id='online_exam_id'/>

                          <input type='hidden' name='' value='hidden_user_id' />

       <input type='hidden' name='edit_action' id='edit_action' value='Edit'/>-->
  
      <input type='submit'  id='edit_button_action' class='btn btn-success btn-sm' value='Save'/>
 
      <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button>
                  </div>
                  </div>
            </form>
  
</div>
<?php 

            }
    
     mysqli_close($db);
      }
else
{
      echo "Oops something went wrong";

}
?>












  
      
		
                  