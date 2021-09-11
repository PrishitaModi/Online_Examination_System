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
				<h3 class="panel-title">User Details</h3>
		
		<div id="user_details_area"></div>
		</div>
			
		</div>
	</div>
</div>
	 
<?php
if(isset($_GET['code']))
{
	$db = mysqli_connect('localhost','root', '','online_examination' );
	$exam_id = $exam->Get_exam_id($_GET["code"]);
	$query = "
	SELECT online_exam_status, online_exam_datetime, online_exam_duration FROM online_exam_table 
	WHERE online_exam_id = '$exam_id'
	";

$result = mysqli_query($db,$query);
$adminid=mysqli_num_rows($result);
for($i=1;$i<=$adminid;$i++)
                     
    {
        $row = mysqli_fetch_array($result);

		$exam_status = $row['online_exam_status'];
		$exam_star_time = $row['online_exam_datetime'];
		$duration = $row['online_exam_duration'] . ' minute';
		$exam_end_time = strtotime($exam_star_time . '+' . $duration);
        $exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
		$remaining_minutes = strtotime($exam_end_time) - time();
	}
}

else{
	header('Location:enroll_exam.php');
}
?>

<br />
<?php
if($exam_status == 'Started')
{
$db = mysqli_connect('localhost','root', '','online_examination' );

		$user_id	=	$_SESSION['user_id'];
		$exam_id	=	$exam_id;
		$attendance_status	='Present';
	
$query = "UPDATE user_exam_enroll_table SET attendance_status='$attendance_status' WHERE user_id='$user_id' AND exam_id='$exam_id'";
$result = mysqli_query($db,$query);
//$started_status=mysqli_num_rows($result);
}
?>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<!-- <div class="card-header">Good Luck!!</div>
			 -->
			 <div class="card-body">
				<div id="single_question_area"></div>
			</div>
		</div>
		<br />
		<!-- <div id="question_navigation_area"></div>
	 -->
	</div>

	<div class="col-md-4">
		<br />
		<div align="center">
			<div id="exam_timer" data-timer="<?php echo $remaining_minutes;?>"style="max-width:400px; width: 100%; height: 200px;"></div>
		</div>
	</div>
		
</div>
</div>

</body>
</html>

<script type="text/javascript">

$(document).ready(function()
{
	var exam_id = "<?php echo $exam_id; ?>";

	load_question();
	

	function load_question(question_id ='')
	{
		$.ajax({
			url:"exam_question_view.php",
			method:"POST",
			data:
			{
				exam_id:exam_id, 
				question_id:question_id,
			},
			success:function(data)
			{
				$('#single_question_area').html(data);
			}
		});
	}

	$(document).on('click', '.next', function(){
		var question_id = $(this).attr('id');
        load_question(question_id);

	});

	// $(document).on('click', '.previous', function(){
	// 	var question_id = $(this).attr('id');
	// 	load_question(question_id);
	// });
	$("#exam_timer").TimeCircles({ 
		time:{
			Days:{
				show: false
			},
			Hours:{
				show: false
			}
		}
	});
	setInterval(function(){
		var remaining_second = $("#exam_timer").TimeCircles().getTime();
		if(remaining_second < 1)
		{
			alert('Exam time over');
			//location.reload();

			header("Location:enroll_exam.php");

		}
	}, 1000);

	function load_user_details()
	{
		$.ajax({
			url:"load_user_details.php",
			method:"POST",
			
			success:function(data)
			{
				$('#user_details_area').html(data);
			}
		})
	}
         load_user_details();
	$(document).on('click', '#answer_option', function(){
		var question_id = $(this).data('question_id');
        var answer_option = $(this).data('id');
		

		$.ajax({
			url:"option_submission.php",
			method:"POST",
			data:{
				
				question_id:question_id,
				 answer_option:answer_option,
				  exam_id:exam_id
			},
			
		});
	});
	
	$(document).on('click', '#submit', function(){
		
		
        alert("Exam Completed");


      var newLocation = "view_completed_exam.php";
      window.location = newLocation;


});

});


</script>



