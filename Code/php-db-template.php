<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Electronic Database for Lab</title>
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
		<div class="panel-heading"><h5>Search Component</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				Search component to knoe about it<br>
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
								<th>Part Name</th>							
								
								<th>Component Type</th>
								<th>Model No</th>
								<th>Image</th>
								<th>Datsheet</th>
							</tr>
						</thead>
				<?php
					while ($rekod=mysqli_fetch_array($qr)){//redo to other records
				?>
					<tr>
						<td>
						
						</td>
						<td><?php echo $rekod['id']?></td>
						<td><?php echo $rekod['cname']?></td>
						
						<td><?php echo $rekod['ctype']?></td>
						<td><?php echo $rekod['modelno']?></td>
						<td> <img src = "img/<?php echo $rekod['img']?>"></td>
						<td> <a href src = "File/<?php echo $rekod['datasheet']?>"> Download </td>
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
		include ("inc/sidebar-menu.php");?>
    </div><!-- end main menu -->
  </div>
</div><!-- end container -->


<?php 
//include the footer
include ("inc/footer.php");?>

</body>
</html>
