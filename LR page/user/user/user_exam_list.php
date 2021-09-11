<?php
include('Examination.php');
include('server.php');
$exam = new Examination;
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Exam List</title>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <!--------ADD POP UP -------------->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
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
                <li class="nav-item">
                    <a class="nav-link" href="enroll_exam.php">Exam Enroll</a>
                </li>
               
                 <li class="nav-item">
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
				<h3 class="panel-title">Online Exam List</h3>
			</div>
		</div>
   </div>
</div>
<br>
<br>
<br>
<?php
if(isset($_SESSION["user_id"]))
{
?>

<div class="row">
  
            <div class="col-md-3"></div>
            <div class="col-md-6">
                 <select name="exam_list" id="exam_list" class="form-control input-lg">
                    <option value="">Select Exam</option>
                    </select>
                
                </div>
</div>
            <table>
        <tr>
            <td id="exam_details"></td>
        </tr>
    </table>

           <!--   </div>
         </div>
 -->
<br><br>
<?php
}
?>

</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{

$.ajax({
    url:"load_exam.php",
    type:"POST",
    dataType:"JSON",
    success:function (data){
        $.each(data,function (key,value)
         {
            $("#exam_list").append("<option value='"+ value.online_exam_title+"'>"+value.online_exam_title+"</option");
        });
       
    } 
});

$("#exam_list").change(function() 
 {
     
    var exam=$(this).val();


    if(exam=="")
    {
       $("#exam_details").html("");

    }
    else{
        $.ajax({
            url:"user_ajax.php",
            type:"POST",
            data:
            {
            
             exam:exam
            },
            success:function(data) 
            {
                $("#exam_details").html(data);

            }

               });

         }
});

$(document).on('click', '#enroll_button', function(){
                exam_id = $('#enroll_button').data('exam_id');
                $.ajax({
                    url:"user_enroll.php",
                    method:"POST",
                    data:{
                        exam_id:exam_id
                    },
                    // beforeSend:function()
                    // {
                    //     $('#enroll_button').attr('disabled', 'disabled');
                    //     $('#enroll_button').text('please wait');
                    // },
                    success:function()
                    {
                        $('#enroll_button').attr('disabled', false);
                        $('#enroll_button').removeClass('btn-warning');
                        $('#enroll_button').addClass('btn-success');
                        $('#enroll_button').text('Enroll success');
                    }
                });
            });





















 
 }); 
 </script>
  </body>






