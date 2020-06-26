<?php 
//include the database connectivity setting
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
		<div class="panel-heading"><h5>Registration</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
		
				Register as a Lab User:<br>
				<form action="register.php" method="post"> 
     Regno: <input class="form-control" type="text" maxlength="10" name="id" required="required" placeholder ="Ex:2015338036" /> <br/> 
     User Name: <input class="form-control" type="text" name="username" required="required" placeholder ="Write the name of user..." /> <br/> 
		 Password: <input class="form-control" type="password" name="password" required="required" placeholder ="Careful! Case Sensetive!...."> </textarea> <br/>
     Designation:
					  <select class="form-control" name="designation">
						<option value="lin">STUDENT</option>
						<option value="nlin">TEACHER</option>
						<option value="ic">TEACHING ASSISTANT</option>
						<option value="measure">DEMONSTRATOR</option>
						<option value="tran">PROJECT/THESIS WORKER</option>
					  </select> <br/>
		 Contact No: <input class="form-control" type="text" name="contactno" required="required" placeholder ="Contact Number..." /> <br/>
		 Image: <input class="btn btn-embosed btn-primary" type="file" name="img" placeholder ="Upload Image..." /><br>
     Comment: <textarea class="form-control" type="text" name="comment" placeholder ="Briefly describe why do u want to use this lab..."> </textarea> <br>
     
     <br>
     <br>
     <input class="btn btn-embosed btn-primary" type="submit" value="Insert" />
     <input class="btn btn-embosed btn-primary" type="reset" value="clear" />
     </form>
				<?php

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
           $id = mysqli_real_escape_string($conn, $_POST['id']); 
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $designation = mysqli_real_escape_string($conn, $_POST['designation']);
      $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
      $comment = mysqli_real_escape_string($conn, $_POST['comment']);
      $img = mysqli_real_escape_string($conn, $_POST['img']);


      $bool = true; mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server 
      mysqli_select_db($conn, "component") or die("Cannot connect to database"); //Connect to database 
      $query = mysqli_query($conn, "Select * from users"); //Query the component table
       while($row = mysqli_fetch_array($query)) //display all rows from query
        { $table_id = $row['id']; // the first id row is passed on to $table_component, and so on until the query is finished 
         if($id == $table_id) // checks if there are any matching fields
             { $bool = false; // sets bool to false
                 Print '<script>alert("id has been taken!");</script>'; //Prompts the user 
                 Print '<script>window.location.assign("insert-form.php");</script>'; // redirects to insert-form.php
                 }
             } if($bool) // checks if bool is true 

             {
               mysqli_query($conn,"INSERT INTO users (id, username, password, comment, designation, contactno, img) VALUES ('$id','$username','$password','$comment','$designation','$contactno','$img')"); //Inserts the value to table component 
                Print '<script>alert("Successfully registered!");</script>'; // Prompts the user 
                Print '<script>window.location.assign("register.php");</script>'; 
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
		include ("inc/sidebar-menu.php");?>
    </div><!-- end main menu -->
  </div>
</div><!-- end container -->


<?php 
//include the footer
include ("inc/footer.php");?>

</body>
</html>
