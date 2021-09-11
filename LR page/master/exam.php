

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <!--------ADD POP UP -------------->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
    <script src="../style/bootstrap-datetimepicker.js"></script>
   

   
</head>
<body>
<div class="dashboard-header">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand" href="../index.html">HomeSchool.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="float: right;">
            <ul class="navbar-nav">
                
               
                  <li class="nav-item">
                    <a class="nav-link" href="maindashboard.php">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" name="logout">Logout</a>
                </li>   
                  
            </ul>
        </div>  
    </nav></div>
    <br />
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Online Exam List</h3>
			</div>
			 <div class="col-md-3" align="right">
				<button type="button" id="add_button" name="add_button" class="btn btn-info btn-sm">Add</button>
			 </div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
		</thead>
	 			<tr>
					<td id="exam_data_table"></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="formModal">
  	<div class="modal-dialog modal-lg">
	<div class="modal-content">
      			<!-- Modal Header -->
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title"></h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>

        		<!-- Modal body -->

        		<div class="modal-body">
        			
        			<form  id="exam_form" action="addinsert.php" method="post">
      	
        			 <div class="form-group">

            			<div class="row">
              				<label class="col-md-4 text-right">Exam Title <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="online_exam_title" id="online_exam_title" class="form-control" required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Exam Date & Time <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="online_exam_datetime" id="online_exam_datetime" class="form-control" readonly required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Exam Duration in Minutes <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text"  name="online_exam_duration" id="online_exam_duration" class="form-control" required>
	                				
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Total Question <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="total_question" id="total_question" class="form-control" required>
	                				
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Marks for Right Answer <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="marks_per_right_answer" id="marks_per_right_answer" class="form-control" required>
	                				
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Marks for Wrong Answer <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="marks_per_wrong_answer" id="marks_per_wrong_answer" class="form-control" required>
	                				
	                		</div>
            			</div>
          			</div>

        		</div>

	        	<!-- Modal footer -->
	        	<div class="modal-footer">
	        		<input type="hidden" name="online_exam_id" id="online_exam_id" />

	        		<input type="hidden" name="page" value="exam" />

	        		<input type="hidden" name="action" id="action" value="Add" />

	        		<input type="button" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" />

	          		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	        	</div>
        	</div>
    	
  	</div>
  </form>
</div>
<!------------------------------------------EDIT MODAL------------------------------------------------------------->
<div class="modal" id="form_Modal_Edit">
 </div>
    	
  
<!----------------------------------------------------DELETE MODAL---------------------->

<div class="modal" id="deleteModal">
  	<div class="modal-dialog">
    	<div class="modal-content">

      		<!-- Modal Header -->
      		<div class="modal-header">
        		<h4 class="modal-title">Delete Confirmation</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		</div>

      		<!-- Modal body -->
      		<div class="modal-body">
        		<h3 align="center">Are you sure you want to remove this?</h3>
      		</div>

      		<!-- Modal footer -->
      		<div class="modal-footer">
      			<button type="button" name="ok_button" id="ok_button" class="btn btn-primary btn-sm">OK</button>
        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>
<!----------------------------------------------------QUESTION MODAL------------------->
<div class="modal" id="questionModal">
  	<div class="modal-dialog modal-lg">
    	<form method="post" action="addquestion.php"id="question_form">
      		<div class="modal-content">
      			<!-- Modal Header -->
        		<div class="modal-header">
          			<h4 class="modal-title" id="question_modal_title"></h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>

        		<!-- Modal body -->
        		<div class="modal-body">
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Question Title <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="question_title" id="question_title" autocomplete="off" class="form-control" required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Option 1 <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="option_title_1" id="option_title_1" autocomplete="off" class="form-control" required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Option 2 <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="option_title_2" id="option_title_2" autocomplete="off" class="form-control" required/>
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Option 3 <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="option_title_3" id="option_title_3" autocomplete="off" class="form-control" required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Option 4 <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="option_title_4" id="option_title_4" autocomplete="off" class="form-control" required />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
            			<div class="row">
              				<label class="col-md-4 text-right">Answer Option <span class="text-danger">*</span></label>
	              			<div class="col-md-8">
	                			<input type="text" name="answer_option" id="answer_option" class="form-control" required>
	                				
	                		</div>
            			</div>
          			</div>
        		</div>

	        	<!-- Modal footer -->
	        	<div class="modal-footer">
	        		<input type="hidden" name="question_id" id="question_id" />

	        		<input type="hidden" name="online_exam_id" id="hidden_online_exam_id" />

	        		<input type="hidden" name="page" value="question" />

	        		<input type="hidden" name="action" id="hidden_action" value="Add" />

	       <input type="submit" name="question_button_action" id="question_button_action" class="btn btn-success btn-sm" value="Add" />

	          		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	        	</div>
        	</div>
    	</form>
  	</div>
</div>

<script type="text/javascript">
// ----------------------------------------------LOAD DATA-------------------------------
$(document).ready(function(){
  
  function loaddata(){
		$.ajax({
			url:"ajax_action.php",
			type:"POST",
			success:function(data) {
				$("#exam_data_table").html(data);

			}
		});
	}
	loaddata();

	//-------------------------------------------------------------ADD EXAM DETAILS MODAL-------------------------------
	function reset_form()
	{
		$('#modal_title').text('Add Exam Details');
		  $('#button_action').val('Add');
	 	  $('#action').val('Add');
	 	$('#exam_form')[0].reset();
	// 	$('#exam_form').parsley().reset();
	 }

	$('#add_button').click(function(){
		reset_form();
		$('#formModal').modal('show');
		
	});

//-------------------------------------------------------------SET DATE---------------------------------

	var date = new Date();

	date.setDate(date.getDate());

	$('#online_exam_datetime').datetimepicker({
		startDate :date,
		format: 'yyyy-mm-dd hh:ii',
		autoclose:true
	});

//  -----------------------------------------------------------DATA INSERTION OF ADD BUTTON------------------------------
	 $('#button_action').click(function(e){
	    e.preventDefault();
        var online_exam_title=$("#online_exam_title").val();
        var online_exam_datetime=$("#online_exam_datetime").val();
        var online_exam_duration=$("#online_exam_duration").val();
       
       var total_question=$("#total_question").val();
     var marks_per_right_answer=$("#marks_per_right_answer").val();
    var marks_per_wrong_answer=$("#marks_per_wrong_answer").val();

	$.ajax({
			url:"addinsert.php",
			type:"POST",
			data:{online_exam_title:online_exam_title, online_exam_datetime:online_exam_datetime,online_exam_duration:online_exam_duration,total_question:total_question,marks_per_wrong_answer:marks_per_wrong_answer,marks_per_right_answer:marks_per_right_answer},
			success:function(data)
				{
					if(data==1) {

                      reset_form();
                       $('#formModal').modal('hide');
						alert("Data Successfully Added");
						loaddata();
					} 
					else
					 {
						alert("Oops something went wrong!!!");
					}
				}
			});

	});
	 
//------------------------------------------------edit date ------------------------------------------------------
	//  var date = new Date();

	// date.setDate(date.getDate());

	// $('#online_exam_datetime').datetimepicker({
	// 	startDate :date,
	// 	format: 'yyyy-mm-dd hh:ii',
	// 	autoclose:true
	// });

//----------------------------------TRY ONE EDIT----------------------------------------------

 
var date = new Date();

	date.setDate(date.getDate());

	$('#edit_online_exam_datetime').datetimepicker({
		startDate :date,
		format: 'yyyy-mm-dd hh:ii',
		autoclose:true
	});
//-----------------------------------------------------


















//--------------------------------------------------------------ON CLICK EDIT---------------------------------------------
     $(document).on('click', '.edit', function(event){
    // edit_form();		
       $("#form_Modal_Edit").modal('show');
     	 var online_exam_id = $(this).data("id");
     	$.ajax({
			url:"edit.php",
			method:"POST",
			data:{
				online_exam_id:online_exam_id,
				
           },
			success:function(data)
				{
					$('#form_Modal_Edit').html(data);
					
				}
 });


	
	});
















	
//------------------------------------------------------------DELETE MODAL------------------------------

	$(document).on('click', '.delete', function(){
		exam_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});

	$('#ok_button').click(function(){
		$.ajax({
			url:"delete.php",
			method:"POST",
			data:{
				online_exam_id:exam_id,
			},
		success:function(data)
				{
					if(data==1) {
                             $('#deleteModal').modal('hide');
                      
						alert("Exam Deleted Successfully Added");
					} 
					else
					 {
						alert("Oops something went wrong!!!");
					}
				}


	
		})
	});

//-----------------------------------------------------------ADD QUESTION MODAL ----------------------------------------
	function reset_question_form()
	{
		$('#question_modal_title').text('Add Question');
		$('#question_button_action').val('Add');
		$('#hidden_action').val('Add');
		$('#question_form')[0].reset();
		//$('#question_form').parsley().reset();
	}

	$(document).on('click', '.add_question', function(){
		reset_question_form();
		$('#questionModal').modal('show');
	   exam_id = $(this).attr('id');
		//$('#hidden_online_exam_id').val(exam_id);
	});

	 $('#question_button_action').click(function(e){
	    e.preventDefault();
	  //  var online_exam_id=$(this).attr('id');
        var question_title=$("#question_title").val();
        var option_title_1 =$("#option_title_1").val();
        var option_title_2=$("#option_title_2").val();
        var option_title_3=$("#option_title_3").val();
         var option_title_4=$("#option_title_4").val();
        var answer_option=$("#answer_option").val();

	$.ajax({
			url:"addquestion.php",
			type:"POST",
			data:{
			online_exam_id:exam_id,
			question_title:question_title,
			 option_title_1:option_title_1,
			option_title_2:option_title_2,
			option_title_3:option_title_3,
			option_title_4:option_title_4,
			answer_option:answer_option
		   },
			success:function(data)
				{
					if(data==1) {

                    reset_question_form();
                     $('#questionModal').modal('hide');
					alert("Question Successfully Added");
					} 
					else
					 {
						alert("Oops something went wrong!!!");
					}
				}
			});

	});
	

});

</script>

<?php

include('footer.php');

?>