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
		<div class="panel-heading"><h5>DELETE</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->

            Please Enter the Part id to delete the entry permanently<br>
				<form action="delete.php" method="get"> 
     Part Id: <input class="form-control" type="text" maxlength="6" name="id" required="required" placeholder ="Ex:31064" /> <br/>
            
                        <?php
                        if($_SERVER["REQUEST_METHOD"] == "GET")
                        {
                             $id = $_GET['id'];
                        }
			$query="DELETE from component  
            where id='$id'";
            $qr=mysqli_query($conn,$query);
			if($qr==false){
				echo ("Query cannot be executed!<br>");
				echo ("SQL Error : ".mysqli_error($conn));
			}
			else{//insert successfull
				echo "UPDATE has been saved...<br>";
			}

            //echo $query;
            
            ?>

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
