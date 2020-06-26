<?php
     session_start();

     if($_SESSION["username"]=="")
	   
	    {
	      header("Location: home.php");
        } 
   
	 if( isset( $_SESSION['counter_if'] ) )
	  
	    {
          $_SESSION['counter_if'] ++;
		}
	
	else 
	    {
          $_SESSION['counter_if'] = 1;
        }
	
    $msg = "You have visited this page ".  $_SESSION['counter_if'];
    $msg .= " times in this current session.";
 
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
   <?php  
       echo ( $msg );

       if ($_SESSION['counter_d']==1)
    
         {
               echo("\nYou are Browsing this page for the first time in this session!");
       }
   
include ("inc/navbar.php");
?>

<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5>INSERT new component</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
<?php
    echo ( $msg );

    if ($_SESSION['counter_if']==1)
 
	    {
            echo("\nYou are Browsing this page for the first time in this session!");
		}
		
?>		
				Insert new component Info<br>
				<form action="insert-form.php" method="post"> 
     Part Id: <input class="form-control" type="text" maxlength="6" name="id" required="required" placeholder ="Ex:31064" /> <br/> 
     Part Name: <input class="form-control" type="text" name="cname" required="required" placeholder ="Write the name of component..." /> <br/> 
		 How to Use: <textarea class="form-control" type="text" name="htu" required="required" placeholder ="Briefly describe how to use it...."> </textarea> <br/>
		 Type:
					  <select class="form-control" name="ctype">
						<option value="lin">LINEAR DEVICE</option>
						<option value="nlin">NON-LINEAR DEVICE</option>
						<option value="ic">INTEGRATED CIRCUIT</option>
						<option value="measure">MEASURING DEVICE</option>
						<option value="tran">TRANSISTOR</option>
					  </select> <br/>
		 Model No: <input class="form-control" type="text" name="modelno" required="required" placeholder ="Model Number..." /> <br/>
		 Image: <input class="btn btn-embosed btn-primary" type="file" name="img" placeholder ="Upload Image..." /> <br/>
     <br>
     Datasheet: <input class="btn btn-embosed btn-primary" type="file" name="datasheet" placeholder ="Upload Datasheet File..." /> <br/>
     <br><br>
     <input class="btn btn-embosed btn-primary" type="submit" value="Insert" />
     <input class="btn btn-embosed btn-primary" type="reset" value="clear" />
     </form>
						
				<?php

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
           $id = mysqli_real_escape_string($conn, $_POST['id']); 
      $cname = mysqli_real_escape_string($conn, $_POST['cname']);
      $htu = mysqli_real_escape_string($conn, $_POST['htu']);
      $ctype = mysqli_real_escape_string($conn, $_POST['ctype']);
      $modelno = mysqli_real_escape_string($conn, $_POST['modelno']);
      $img = mysqli_real_escape_string($conn, $_POST['img']);
      $datasheet = mysqli_real_escape_string($conn, $_POST['datasheet']);

      $bool = true; mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server 
      mysqli_select_db($conn, "component") or die("Cannot connect to database"); //Connect to database 
      $query = mysqli_query($conn, "Select * from component"); //Query the component table
       while($row = mysqli_fetch_array($query)) //display all rows from query
        { $table_id = $row['id']; // the first id row is passed on to $table_component, and so on until the query is finished 
         if($id == $table_id) // checks if there are any matching fields
             { $bool = false; // sets bool to false
                 Print '<script>alert("id has been taken!");</script>'; //Prompts the user 
                 Print '<script>window.location.assign("insert-form.php");</script>'; // redirects to insert-form.php
                 }
             } if($bool) // checks if bool is true 
             { mysqli_query($conn,"INSERT INTO component (id, cname, htu, ctype, modelno, img, datasheet) VALUES ('$id','$cname','$htu','$ctype','$modelno','$img' ,'$datasheet')"); //Inserts the value to table component 
                Print '<script>alert("Successfully insert-formed!");</script>'; // Prompts the user 
                Print '<script>window.location.assign("insert-form.php");</script>'; 
    // redirects to insert-form.php 
    }
 } 				?>
			
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
