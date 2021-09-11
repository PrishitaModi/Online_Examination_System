<?php

//enroll_exam.php

include('Examination.php');
include('server.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$exam = new Examination;
$exam->Change_exam_status($_SESSION['user_id']);
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User</title>
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
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                
               <!--  <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
                </li>
                -->  <li class="nav-item">
                    <a class="nav-link" href="student_dashboard.php">DashBoard</a>
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
				<h3 class="panel-title">User Enrolled Exam List</h3>
			</div>
			
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped table-hover">
				<thead>
		</thead>
	 			<tr>
					<td id="enrolled_exam_data"></td>
				</tr>
			</table>
		</div>
	</div>
</div>


</body>
</html>

<script type="text/javascript">

$(document).ready(function(){
  
  function loaddata(){
		$.ajax({
			url:"enroll_exam_view.php",
			type:"POST",
			success:function(data) 
            {
				
				$("#enrolled_exam_data").html(data);

			}
		});
	}
	loaddata();
});

</script>














