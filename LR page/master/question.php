<?php

//header.php

include('Examination.php');

$exam = new Examination;

/*$exam->admin_session_private();*/

?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../style/style.css" />
    <!-- <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
    <script src="../style/bootstrap-datetimepicker.js"></script>
 -->


   
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
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                   <a class="nav-link" href="exam.php">Exam List</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="maindashboard.php">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>   
                  
            </ul>
        </div>  
    </nav></div>
    <br />

<br />
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Question List</h3>
			</div>
			<div class="col-md-3" align="right">
				
			</div>
		</div>
	</div>
	<div class="card-body">
		<span id="message_operation"></span>
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped table-hover">
				<thead></thead>
					<tr>
						<td id="question_data_table">
					</tr>
				</thead>
			</table>
		</div>
	</div>
<!-- 
------------------------------------------EDIT QUESTION MODAL------------------------------------------------------------------------------ -->
<div class="modal" id="questionModal">
</div>
  <!-- ------------------------------------------------------------------------------------------------------------------------------
 --><div class="modal" id="deleteModal">
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
      			<button type="button" name="ok_button" id="del_button" class="btn btn-primary btn-sm">OK</button>
        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>





<script type="text/javascript">

$(document).ready(function()
{
	function loaddata(){
	 	 

		$.ajax({
            url:"questionview.php",
			type:"POST",
			data:({
				
				online_exam_id :<?php echo $_GET["code"];?>,
				
			}),
			success:function(data) {

				$("#question_data_table").html(data);

			}
		});
	
	}
	loaddata();


$(document).on('click', '.edit', function(){
   	
       $("#questionModal").modal('show');
     	 var question_id = $(this).data("id");
     	$.ajax({
			url:"question_edit.php",
			method:"POST",
			data:{
				question_id:question_id
				
           },
			success:function(data)
				{
					$('#questionModal').html(data);
					
				}
 });


	
	});
loaddata();

$(document).on('click', '#question_button_action', function(){
              var question_id =$("#question_id").val(); 
			    var question_title =$("#question_title").val();
			    var option_1 =$("#option_1").val();
				var option_2 = $("#option_2").val();
				var option_3=$("#option_3").val();
				var option_4		=$("#option_4").val();
				 var answer_option=	 $("#answer_option").val();
$.ajax({
			url:"update_question_details.php",
			type:"POST",
			data:{
			question_id:question_id,
			question_title:question_title,
			option_1:option_1,
			option_2:option_2,
			option_3:option_3,
			option_4:option_4,
			answer_option:answer_option
		   },
			success:function(data)
				{
						loaddata();
			    } 
					
				
			});
          


	});

	
 $(document).on('click', '.delete', function(){
		question_id = $(this).data('id');
		$('#deleteModal').modal('show');
	});

	$('#del_button').click(function(){
		$.ajax({
			url:"deletequestion.php",
			method:"POST",
			data:{

				question_id:question_id,
			},
		success:function(data)
				{
					if(data==1) 
					{
                             $('#deleteModal').modal('hide');
                      
						     alert("Exam Deleted Successfully Added");
						     loaddata();
					} 
					else
					 {
						alert("Oops something went wrong!!!");
					}
				}


	
		})
	});

});


</script>

