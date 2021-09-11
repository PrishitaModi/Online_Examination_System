<?php


include('server.php');

 $db = mysqli_connect('localhost','root', '','online_examination' );
 $user=$_SESSION['admin_id'];
$itemsQuery="SELECT id,name,done FROM  admin_todo  WHERE user= '$user'";
$result = mysqli_query($db,$itemsQuery);
$items=mysqli_num_rows($result);
//$row = mysqli_fetch_array($result);


//$items = $itemsQuery->rowCount() ? $itemsQuery:[];

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin-To Do List </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
<link rel="stylesheet" href="todocss.css">
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
                    <a class="nav-link" href="maindashboard.php">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>   
                  
            </ul>
        </div>  
    </nav></div>
    <br />
<div class="list">
		<h1 class="header">To do. </h1>
        
           
		<?php if(!empty($items)):?>

            <?php
              for($i=1;$i<=$items;$i++)
            
             {
            
                $row = mysqli_fetch_array($result);

             ?>
            
        <ul class="items">
			
			    <li>
			    	<span class="item">
                    <?php echo $row['name'] ;?>
                    <?php echo $row['done'] ? ' done' : '' ?>
                    </span>
				   
                   <?php if(!$row['done']):?>

                    <a href="mark.php?
                    as=done&row=<?php echo $row['id'] ; ?>" 
                    class="done-button" 
                    style="background-color:LightGray">Mark as done</a>

                <?php endif; ?>
               </li>
                
            </ul> 
        <?php
    }
    ?>
        
			<?php else:?>
				<p>You haven't added any items yet</p>
		<?php endif; ?>
		<form class="item-add" method="post" action="add.php">
			<input type="text" name="name" placeholder="TYPE TO ADD SOMETHING." class="input" autocomplete="off"required>
			<input type="submit" value="Add" class="submit">
		</form>
 

</div>
</body>
</html>