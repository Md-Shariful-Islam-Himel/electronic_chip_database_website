<?php
     session_start();

     if($_SESSION["username"]=="")
	   
	    {
	      header("Location: home.php");
        } 
   
 
     include ("inc/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Electronic Component Database for lab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
    
</head>
<body>

<?php 
//include the navigation bar
include ("inc/navbar.php");?>

<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5> UPDATE Saved </h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
<?php

			$id=$_GET['id'];
			$cname=$_GET['cname'];
			$htu=$_GET['htu'];
			$ctype=$_GET['ctype'];
			$modelno=$_GET['modelno'];
			
			//SQL to update record
			$query="UPDATE component SET 
			   modelno='$modelno', 
			   cname='$cname', 
			   htu='$htu', 
			   ctype='$ctype' 
			   where id='$id'";
			   //echo $query;
			   
			//Execute the query
			$qr=mysqli_query($conn,$query);
			if($qr==false){
				echo ("Query cannot be executed!<br>");
				echo ("SQL Error : ".mysqli_error($conn));
			}
			else{//insert successfull
				echo "UPDATE has been saved...<br>";
				echo "<a href='php-db-template.php?cname=$cname'>View $id $cname</a>";
			}

			?>
						
				
			
			<!-- ***********Edit your content ENDS here******** -->	
			</div> <!--body panel main -->
		</div><!--toc -->
		
    </div><!-- end main content -->
	
    <div class="col-md-3">
		<?php 
		//include the sidebar menu
		include ("inc/sidebar-menur.php");?>
    </div><!-- end main menu -->
  </div>
</div><!-- end container -->


<?php 
//include the footer
include ("inc/footer.php");?>

</body>
</html>
