
 <?php

//header.php

include('Examination.php');

$exam = new Examination;



?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Admin</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../style/style.css" />
    </head>
<body>
<div class="dashboard-header">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand" href="#">HomeSchool.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                
                <!-- <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
                </li>
                 --> <li class="nav-item">
                    <a class="nav-link" href="maindashboard.php">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>   
                  
            </ul>
        </div>  
    </nav></div>
    <br />


	<!--<div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
  		<img src="logo.png" class="img-fluid" width="300" alt="Online Examination System in PHP" />
	</div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Admin Side</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="exam.php">Exam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>   
            </ul>
        </div>  
    </nav>-->

	<div class="container-fluid"><br />
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Students Enrolled List</h3>
			</div>
			<!-- <div class="col-md-3" align="right">
				<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
			</div>
		 --></div>
	</div>

<div class="card-body">
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped table-hover">
				<thead>
		</thead>
	 			<tr>
					<td id="user_data_table"></td>
				</tr>
			</table>
		</div>
	</div>
</div>


<div class="modal" id="detailModal">
  	<div class="modal-dialog">
    	<div class="modal-content">

      		<!-- Modal Header -->
      		<div class="modal-header">
        		<h4 class="modal-title">User Details</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		</div>

      		<!-- Modal body -->
      		<div class="modal-body" id="user_details">
        		
      		</div>

      		<!-- Modal footer -->
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>

<script>

$(document).ready(function(){
	
	function loaddata(){
		$.ajax({
			url:"admin_user_view.php",
			type:"POST",
			success:function(data) {
				$("#user_data_table").html(data);

			}
		});
	}
	loaddata();


	// $(document).on('click', '.details', function(){
	// 	var user_id = $(this).attr('id');
	// 	$.ajax({
	//       	url:"ajax_action.php",
	//       	method:"POST",
	//       	data:{action:'fetch_data', user_id:user_id, page:'user'},
	//       	success:function(data)
	//       	{
	//         	$('#user_details').html(data);
	//         	$('#detailModal').modal('show');
	//       	}
	//     });
	// });

});

</script>

