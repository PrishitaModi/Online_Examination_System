<?php


include('server.php');

 $db = mysqli_connect('localhost','root', '','online_examination' );

$conn=$db;
//-----------------------------------------------------------ADMINSIDE USERENROLLED DETAILS----------------------------------------------
$userquery = "SELECT * FROM user_table"; 
$result = mysqli_query($conn,$userquery);
$user=mysqli_num_rows($result);
?>

        <div class="card-body">
		<div class="table-responsive">
		<table id="" class="table table-bordered table-striped table-hover">
		<thead>
		<tr>
						
					
						<th>User Name</th>
						<th>Email Address</th>
						
						<th>Mobile No.</th>
						
						
					
		</tr>
		</thead>
		 <?php
              for($i=1;$i<=$user;$i++)
                     
                {
            	         $row = mysqli_fetch_array($result);

            	 ?>
            
             <tr>
						<td><?php echo $row["user_name"] ;?></td>
            <td><?php echo $row["user_email_address"] ;?></td>
						<td><?php echo $row["user_mobile_no"] ;?></td>
						
						
					    


	
		</tr> 
<?php
		}
?>
				
			
</table>

		</div>

	</div>
</div>


