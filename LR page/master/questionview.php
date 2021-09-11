<?php
session_start();
include('Examination.php');
include('server.php');

$examm = new Examination;

$exam_id = '';
$db = mysqli_connect('localhost','root', '','online_examination' );
$gei = "SELECT * FROM question_table 	WHERE online_exam_id=".$_POST["online_exam_id"]." ";
$examresult =mysqli_query($db,$gei);
$adminid=mysqli_num_rows($examresult);
		?>
 <div class="card-body">
		
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Question Title</th>
						<th>Right Option</th>
						<th>Action</th>
					</tr>
				</thead>
		 <?php
              for($i=1;$i<=$adminid;$i++)
                     
                {

            	         $row = mysqli_fetch_array($examresult);

            	 ?>
            
             <tr>

						<td><?php echo $row["question_title"];?></td>
            <td><?php echo $row["answer_option"];?></td>
						<td>
					<?php
					
				
					echo $edit_button = '<button type="button" name="edit" class="btn btn-primary btn-sm edit" data-id="'.$row['question_id'].'"> Edit </button>
					';

					echo $delete_button = '<button type="button" name="delete" class="btn btn-danger btn-sm delete" data-id="'.$row['question_id'].'"> Delete</button>';

				
		
				?>

</td>
		

<?php
		}
?>
				
			
</table>

		</div>

	</div>


            