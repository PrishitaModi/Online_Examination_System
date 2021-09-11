<?php

//view_exam.php

include('Examination.php');
include('server.php');

$exam = new Examination;

$exam_id = '';
$exam_status = '';
$remaining_minutes = '';
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
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/TimeCircles.css" />
    <script src="style/TimeCircles.js"></script>
   

   
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
				<h3 class="panel-title">RESULT</h3>
		
		<div id="user_details_area"></div>
		</div>
			
		</div>
	</div>
</div>
	 

<br />
<?php

$db = mysqli_connect('localhost','root', '','online_examination' );
$examquery ="SELECT * FROM user_exam_enroll_table 
			INNER JOIN online_exam_table 
			ON online_exam_table.online_exam_id = user_exam_enroll_table.exam_id 
			WHERE user_exam_enroll_table.user_id = '".$_SESSION['user_id']."'";
 
$result = mysqli_query($db,$examquery);
$adminid=mysqli_num_rows($result);
 for($i=1;$i<=$adminid;$i++)
                     
                {
            	         $row = mysqli_fetch_array($result);
                        
                 }

?>

	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4" align="right">
					<!-- <a href="pdf_exam_result.php? code=<?php //echo $_GET["code"]; ?>" class="btn btn-danger btn-sm" target="_blank">PDF</a>-->
				<a href="user_result_pdf.php? code=<?php echo $row["online_exam_code"]; ?>" class="btn btn-danger btn-sm" target="_blank">PDF</a>
				</div>
			</div>
		</div>
		

		<div class="card-body">
			<div class="table-responsive">
				<table id="" class="table table-bordered table-hover">
					<thead>
		         </thead>
	 		<tr>
					<td id="completed_exam_data_table"></td>
				</tr>
			</table>
		</div>
	</div>
</div>

			
					
<script type="text/javascript">
// ----------------------------------------------LOAD DATA-------------------------------
$(document).ready(function(){

	// var user_id ="<?php //echo $user_id; ?>";
	// var exam_id ="<?php //echo $exam_id; ?>";
	var online_exam_code = $(this).data("id");
  
  function loaddata(){
		$.ajax({
			url:"view_completed_action.php",
			type:"POST",
			data:{
				online_exam_code:online_exam_code
			},
			success:function(data) {
				$("#completed_exam_data_table").html(data);

			}
		});
	}
	loaddata();
});

</script>