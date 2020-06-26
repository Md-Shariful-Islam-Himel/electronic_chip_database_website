<?php
     session_start();

     if($_SESSION["username"]=="")
	   
	    {
	      header("Location: home.php");
        } 
   
	 if( isset( $_SESSION['counter_sud'] ) )
	  
	    {
          $_SESSION['counter_sud'] ++;
		}
	
	else 
	    {
          $_SESSION['counter_sud'] = 1;
        }
	
    $msg = "You have visited this page ".  $_SESSION['counter_sud'];
    $msg .= " times in this current session.";
 
     include ("inc/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Electronic Component Database for Lab</title>
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
		<div class="panel-heading"><h5>Update/Delete Component</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				Search component to update/delete record<br>

<?php
    echo ( $msg );

    if ($_SESSION['counter_sud']==1)
 
	    {
            echo("\nYou are Browsing this page for the first time in this session!");
		}
		
?>

				<form class="form-inline" role="form" name="" action="" method="GET">
					<div class="form-group">
					  <input class="form-control" name="cname" type="text" placeholder="Component name...">
					  <input class="btn btn-embosed btn-primary" type="submit" value="Search">
					</div>
				</form>
				<hr>
				
				
				<?php
				//check staff name input by the user if null
				if(!isset($_GET['cname'])){
					echo "Search result here will be displayed here<br>";
					//exit();
				}
				else{//if there's user search - then perform db search
				//Create SQL query
					$cname=$_GET['cname'];
					$query="select *
					from component where cname like '%$cname%'";
					//Execute the query
					$qr=mysqli_query($conn,$query);
					if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($conn));
					}
					
					//Check the record effected, if no records,
					//display a message

				//display a message
				if(mysqli_num_rows($qr)==0)
				{
					echo ("Sorry, seems that no record found by the keyword $cname...<br>");
				}//end no record
				else
				{//there is/are record(s)
				?>
					<h5>Search result "<?php echo $cname; ?>"</h5><br>
					<table width="150%" class="table table-hover">
						<thead>
							<tr >
							    <th></th>
							    <th>Id</th>	
								<th>Name</th>							
								<th>How to Use</th>
								<th>Component Type</th>
								<th>Model No</th>
								<th>Image</th>
								<th>Datasheet</th>
							</tr>
						</thead>
				<?php
					while ($rekod=mysqli_fetch_array($qr)){//redo to other records
				?>
					<tr>
						<td>
						<?php
						$id=$rekod['id'];
						echo $id;
						$urlupdate="update-form.php?id=$id";
						$urldelete="delete.php?id=$id";
						?>
						<a href="<?php echo $urlupdate?>" class="btn btn-warning" title="Update staff record" 
						data-toggle="tooltip" > 
						<span class="fui-new"></span></a>
						<a href="#" class="btn btn-danger" title="Delete staff record!" 
						data-toggle="tooltip" onclick="alertdelete()"> 
						<script>
							//script to redirect delete page
							function alertdelete() {
								var r = confirm("You really want to delete the staff?");
								if (r == true) {
									window.location="<?php echo $urldelete?>";
								} else {
									
								}
							}
							</script>
						<span class="fui-trash"></span></a>
						
						</td>
						<td><?php echo $rekod['id']?></td>
						<td><?php echo $rekod['cname']?></td>
						<td><?php echo $rekod['htu']?></td>
						<td><?php echo $rekod['ctype']?></td>
						<td><?php echo $rekod['modelno']?></td>
						<td> <img src = "img/<?php echo $rekod['img']?>"></td>
						<td> <a href = "File/<?php echo $rekod['datasheet']?>"> Download </a> </td>
					</tr>
				<?php
					}//end of records
				?>
				</table>
				<?php
				}//end if there are records
			}//end db search
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
