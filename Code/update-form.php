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

include ("inc/navbar.php");
?>

<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5>UPDATE</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			<?php

                $id=$_GET['id'];
				//sql to fetch selected staff
				$sql="select * from component 
					where id='$id'";
					//echo $sql;
				$rs=mysqli_query($conn,$sql);
				//check sql command
				if($rs==false){//sql error
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($conn));
				}
				else{//no sql error
					$rekod=mysqli_fetch_array($rs);
				}
			?>
				Update Existing Component Record<br>
				<form role="form" name="" action="save-update.php" method="GET">
					<div class="form-group">
					  ID <input class="form-control" name="id" 
					  type="text" maxlength="6" 
					  value="<?php echo $rekod['id']?>" readonly>
					  Part name <input class="form-control" name="cname" type="text" 
					  value ="<?php echo $rekod['cname']?>" >
						How to Use: <textarea class="form-control" name="htu"
					  value ="<?php echo $rekod['htu']?>" > </textarea> <br>
					  Type:
					  <select class="form-control" name="ctype">
						<option value="lin">LINEAR DEVICE</option>
						<option value="nlin">NON-LINEAR DEVICE</option>
						<option value="ic">INTEGRATED CIRCUIT</option>
						<option value="measure">MEASURING DEVICE</option>
						<option value="tran">TRANSISTOR</option>
					  </select
					  value ="<?php echo $rekod['ctype']?>" >
					  Model: <input class="form-control" name="modelno" type="text" maxlength="12" 
					  value="<?php echo $rekod['modelno']?>" >
						Image: <input class="btn btn-embosed btn-primary" type="file" name="img" placeholder ="Upload Image..." 
						value="<?php echo $rekod['img']?>" > 
						<br/>
						Datasheet: <input class="btn btn-embosed btn-primary" type="file" name="datasheet" placeholder ="Upload Datasheet File..." /> <br/>
     <br><br>
     <br>
					  
					  <input class="btn btn-embosed btn-primary" type="submit" value="Save UPDATE" >
					</div>
				</form>
				<hr>
						
				
			
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
