<?php
     session_start();

     if($_SESSION["username"]=="")
	   
	    {
	      header("Location: home.php");
        } 
   
	 if( isset( $_SESSION['counter_homer'] ) )
	  
	    {
          $_SESSION['counter_homer'] ++;
		}
	
	else 
	    {
          $_SESSION['counter_homer'] = 1;
        }
	
    $msg = "You have visited this page ".  $_SESSION['counter_homer'];
    $msg .= " times in this current session.";
 
     include ("inc/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Electronic Component Database lab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>


<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<a href="register.php"> <div class="panel-heading"><h5>Hi!</h5></div> </a>
			<div class="panel-body">
			
						Here you can CRUD the necessary information and datasheet of your necessary chip!

            <?php  echo ( $msg );
            if ($_SESSION['counter_homer']==1)
            {
              echo("\nYou are Browsing this page for the first time in this session!");
			}
		
            ?>
			</div> <!--body panel main -->
		</div>
		
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
