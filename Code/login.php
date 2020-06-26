<html>  
<head>
  <title>Electronic Component Database for Lab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">

</head> 
    <style>  
        .login-panel {  
            margin-top: 150px;  
        }
    </style>
    <body>  
    <?php 
session_start();
//include the navigation bar
include ("inc/navbar.php");?>

<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5>Login</h5></div>
			<div class="panel-body">

      
    <div class="container">  
        <div class="row">  
            <div class="col-md-4 col-md-offset-4">  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Sign In</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="login.php">  
                            <fieldset>  
                                <div class="form-group"  >  
                                    <input class="form-control" placeholder="Name" name="username" type="text" autofocus>  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                                </div>  
      
      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="admin_login" >  
      
      
                            </fieldset>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      
      
    </body>  
      
    </html>  
      
    <?php  
    
    include("inc/dbconn.php");  
      
    if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.  
    {  
        $username=$_POST['username'];  
        $password=$_POST['password'];  
      
        $admin_query="select * from users where username='$username' AND password='$password'";  
      
        $run_query=mysqli_query($conn,$admin_query);  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
            $_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: homer.php');
            echo "<script>window.open('homer.php','_self')</script>";  
        }  
        else {echo"<script>alert('User Infornation(s) are incorrect..!')</script>";}  
      
    }  
      
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



