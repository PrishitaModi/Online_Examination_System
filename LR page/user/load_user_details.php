<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include('server.php');

$db = mysqli_connect('localhost','root', '','online_examination' );
$query = "SELECT * FROM user_table 
			WHERE user_id = '".$_SESSION["user_id"]."'
			";
 $result = mysqli_query($db,$query);
 $user=mysqli_num_rows($result);

		?>

			<!-- <div class="card">
				<div class="card-header"></div>
				 -->
				 <div class="card-body">
					<div class="row">
			<?php

                   for($i=1;$i<=$user;$i++)
                      {
            	         $row = mysqli_fetch_array($result);

                       ?>

		
				
				<div class="col-md-9">
					<table class="table table-bordered">
						<tr>
							<th>Name</th>
							<td><?php echo $row["user_name"]; ?></td>
						</tr>
						<tr>
							<th>Email ID</th>
							<td><?php echo $row["user_email_address"]; ?></td>
						</tr>
						<?php
					}
					?>

						
					</table>
				</div>
				

			 </div></div></div>
			
		
		