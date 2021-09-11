<?php

include('server.php');

      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $db = mysqli_connect('localhost','root', '','online_examination' );
    $query = "SELECT * FROM question_table WHERE question_id = '".$_POST["question_id"]."'";  
      $result = mysqli_query($db, $query);  
     
   
      
      if(mysqli_num_rows($result)>0)
      {
           
            while($row = mysqli_fetch_assoc($result))
            {
                  ?>
                 
                   <div class='modal-dialog modal-lg'>
                        <form class="post-form"  method="post">
                 <div class='modal-content'>
                        
                  <div class='modal-header'>
                        <h4 class='modal-title' >EDIT QUESTION DETAILS</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div> 
                 <div class='modal-body'>
                         <div class='form-group'>
                       <div class='row'>
                  <label class='col-md-4 text-right'>Question Title <span class='text-danger'>*</span></label>
                  <div class='col-md-8'>
                       
<input type='hidden' id="question_id" name='question_id' hidden value='<?php echo $row["question_id"];?>'/>
<input type='text'  id='question_title' name='question_title' value='<?php echo $row["question_title"];?>' class='form-control' required />


                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Option 1 <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' id='option_1' name='option_1' value='<?php echo $row["option_1"] ;?>' class='form-control' required />
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Option 2 <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text' id='option_2' name='option_2' value='<?php echo $row["option_2"] ;?>' class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Option 3 <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text'  id='option_3' name='option_3' value='<?php echo $row["option_3"] ;?>'class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'>Option 4 <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text'  id='option_4' name='option_4' value='<?php echo $row["option_4"] ;?>' class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>
                        <div class='form-group'>
                              <div class='row'>
                                    <label class='col-md-4 text-right'> Answer Option <span class='text-danger'>*</span></label>
                                    <div class='col-md-8'>
<input type='text'  id='answer_option'name='answer_option' value="'<?php echo $row["answer_option"] ;?>'"class='form-control' required>
                                          
                              </div>
                              </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                       
                         <input type="submit"  id="question_button_action" class="btn btn-success btn-sm" value="Save" />
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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












  
      
		
                  