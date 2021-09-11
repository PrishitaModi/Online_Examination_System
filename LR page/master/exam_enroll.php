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
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
    <script src="../style/bootstrap-datetimepicker.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   

</head>
<div class="dashboard-header">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand" href="../index.html">HomeSchool.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">-->
       <!-- <a class="navbar-brand" href="index.php">Admin Side</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <!--<li class="nav-item">
                    <a class="nav-link" href="exam.php">Exam</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
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

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Exam Enrollment List</h3>
			</div>
			<div class="col-md-3" align="right">
				
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="enroll_table" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						
						<th>Name</th>
						<th>Mobile No.</th>
						<th>Email Status</th>
						<th>Result</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>



<script>

$(document).ready(function(){
	var code = "<?php echo $_GET['code']; ?>";

	var dataTable = $('#enroll_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"ajax_action.php",
			type:"POST",
			data:{action:'fetch', page:'exam_enroll', code:code},
		},
		"columnDefs" : [
			{
				"targets" : [0],
				"orderable" : false
			}
		]
	});
});

</script>

