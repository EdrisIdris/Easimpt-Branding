<?php 
 include ('freeup_db.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="login.css">
<link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto:wght@700;&display=swap" rel="stylesheet">
 <?php 


    if (isset($_POST['login'])) {
        
   	    $Email   = $_POST['Email'];
        $pword   = $_POST['pword'];
       

       if (empty($Email)) {
        	    $errors['email_empty'] = "This field is required";
       }
       if (empty($pword)) {
       	        $errors['password_empty'] = "This field is required";
       }
       else {
	        	$query = "SELECT * FROM login_users WHERE email = '$Email' AND password = '$pword'";
	        	$result = mysqli_query($conn, $query);
            if ($result) {
            	$num = mysqli_num_rows($result);
            	if ($num > 0 ) {
            		session_start();
            		$_SESSION['email'] = $Email;
            		header('Location: welcome.php'); 
            	}else if (empty($Email) || empty($pword) ) {
        		  		
                }else {
                	$errors['incorrect'] = "Incorrect Email or Password try again!";
                }
            }
        }
     }
 ?>

<body>
	<header>
		<div class="parent_header1">
			<img src="Images/freeup_logo.png" width="32px" height="32px">
			<div class="child_header">
				<span class="free">Free</span>
				<span class="Up">Up</span>
			</div>	
		</div>
		<div class="parent_header2">
			<span class="New">New here?</span>
			<a href="Sign-up.php" class="Sign">Sign Up</a>
		</div>
	</header>
<div class="original_container">
	<div class="main_container1">
		<div class="parent_container">
			<form method="post">
				   
				<div class="second_container">
                   <div class="third_container">
						<img src="Images/freeup_logo.png" width="50px" height="50px">
						<p class="login">Login to FreeUp</p>
						<p class="errors" > 
						<?php if (isset($errors['incorrect'])) { echo $errors['incorrect']; } ?> 
						</p>
				   </div>
				    <div class="fourth_container" >
						<input class="email" type="email" name="Email" placeholder="Email">
						<small class="errors_empty1"> 
						<?php if (isset($errors['email_empty'])) {echo $errors['email_empty'];} ?>					
						</small>
						<input class="password" type="password" name="pword" placeholder="Password">
						<small class="errors_empty2"> <?php if (isset($errors['password_empty'])) {echo $errors['password_empty'];} ?></small>
					</div>	
					<a class="pass" href="#">Forgot password?</a>
					<button class="login-btn" type="submit" name="login">Login</button>
					 <div class="new_sign">
					  <p class="New">New to FreeUp?</p><a class="sign" href="Sign-up.php">Sign Up!</a>
                    </div>
				</div>	
			</form>
		</div>	
	</div>
	<div class="parent_second_container" style="">
		<p>
		<span>We're always here for you</span> <br>
        <br>
		Thanks so much for using FreeUp. Feel free to reach out to us about <br> anything. 
		<a class="Schedule" href="#">Schedule a meeting with us,</a> email us at 
		<a class="support" href="#">support@freeup.net,</a> <br> or start a Live Chat.
       </p>
	</div>
</div>



</body>
</html>