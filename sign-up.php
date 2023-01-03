<?php 
include ('freeup_db.php');

 ?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<head>
	<title></title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="sign_up.css">


    
<?php 
       if (isset($_POST['sign_up'])) {

      	 if (empty($_POST['fullname'])) {
      	    $empty_fname = "This field is required";
      	 }else {
      	 	$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['Email'])) {
      	    $empty_email= "This field is required";
      	 }else {
      	 	$Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['pword'])) {
      	    $pword_empty = "This field is required";
      	 }else {
      	 	$pword = filter_input(INPUT_POST, 'pword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['company_name'])) {
      	    $comp_empty= "This field is required";
      	 }else {
      	 	$company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['phone_number'])) {
      	    $num_empty = "This field is required";
      	 }else {
      	 	$phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['country_selection'])) {
      	    $country_empty = "This field is required";
      	 }else {
      	 	$country_selection = filter_input(INPUT_POST, 'country_selection', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['specify'])) {
      	    $specify_empty = "This field is required";
      	 }else {
      	 	$specify = filter_input(INPUT_POST, 'specify', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
      	 if (empty($_POST['terms'])) {
      	    $terms_empty = "Please accept the terms and policy to continue";
      	 }else {
      	 	$terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      	 }
         
         if (empty($empty_fname) && empty($empty_email) && empty($comp_empty) && empty($num_empty) && empty($country_empty) 
             && empty($specify_empty) && empty($terms_empty)) {
            
           

         	$sql = "INSERT INTO login_users (name, email, password, company_name, phone_number, country) VALUES 
			     	('$fullname', '$Email', '$pword','$company_name', '$phone_number', '$country_selection') ";
			    if (mysqli_query($conn, $sql)) {
			    	echo "<script>alert ('Successfully Login')</script>";
			  
			    }else {
				    	echo 'Error' . mysqli_error($conn);
				    
				}
	                
		  }
         } 
         	
 ?>
      
    

<!-- <?php  
/*  if (isset($_POST['sign_up'])) {	
       error_reporting(0);

	     	$fullname = $_POST['fullname'];
	     	$Email = $_POST['Email'];
	     	$pword = $_POST['pword'];
	        $company_name = $_POST['company_name'];
	     	$phone_number =  $_POST['phone_number'];
	     	$country_selection = $_POST['country_selection'];
	        $specify = "";
	        $terms = "";
            
	    	  
	      
            $fname = "SELECT * FROM login_users	WHERE name = '$fullname'";
            $fname_used  = mysqli_query($conn, $fname); 
            
            $email = "SELECT * FROM login_users WHERE email = '$Email'";
            $email_exist = mysqli_query($conn, $email);
           
            $number = "SELECT * FROM login_users WHERE phone_number = '$phone_number'";
            $num_exist = mysqli_query($conn, $number);
           
             
	
            if (empty($_POST['fullname']) && empty($_POST['Email']) && empty($_POST['pword']) && empty($_POST['company_name']) && 
            	empty($_POST['phone_number']) && empty($_POST['country_selection']) ) {
                   $All_empty = "All fields are required"; 
            }else if(empty($_POST['fullname'])) {
				$empty_fname= "This field is required!";
			}else if (mysqli_num_rows($fname_used) > 0) {
			    $fn_used = "This Username is already exist!";
			}else if(empty($_POST['Email'])) {
				$empty_email = "This field is required!";
			}else if(mysqli_num_rows($email_exist) > 0) {
				$email_used = "This Email is Already exist!";
			}else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
				$invalid_email = "This is not an Invalid Email";	    
			}else if(empty($_POST['pword'])) {
				$pword_empty = "This field is required!";
			}else if(empty($_POST['company_name'])) {
				$comp_empty= "This field is required!";
			}else if(empty($_POST['phone_number'])) {
				$num_empty= "This field is required!";
			}else if(mysqli_num_rows($num_exist) > 0) {
				$num_exist1 = "This Number has been used!";
			}else if(!isset($_POST['country_selection']) ) {
				$country_empty = "This field is required!";
			}else if(!isset($_POST['terms'])) {
				$terms_empty = "Please accept the terms and policy to continue";
			}else if(!isset($_POST['specify'])) {
				$specify_empty = "This field is required!";
			}
			
            
	        else {
	         	$sql = "INSERT INTO login_users (name, email, password, company_name, phone_number, country) VALUES 
			     	('$fullname', '$Email', '$pword','$company_name', '$phone_number', '$country_selection') ";
			     mysqli_query($conn, $sql);
			      echo "<script>alert ('Successfully Registered!') </script>";
			  
	        }
			
		} */
?> -->
            
 
<body>

	<header class="header">

		<div class="child_header1">
			<a href="sign-up.php"><img class="freeup_logo" src="Images/freeup_logo.png" width="30px" height="30px">
			<span class="free">Free</span><span class="up">Up</span>
			</a>
		</div>
        
        <div class="child_header2">
        	<span>Already have an account?</span>
        	<a href="login.php">Log In</a>
        </div>
   </header>
	<div class="main_parent" >
               
		<div class="parent_container">
            <div class="child_header3">
				<img src="Images/freeup_logo.png" width="40px" height="40px">
				<h1>Complete your Free Account &#38; Start Hiring</h1>
			</div>	
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST" enctype="multi/form-data">
					
			
				 <div class="mb-3" class="child_container1">
					    <small style="color: red; font-family: sans-serif; display: flex; justify-content: center;">
					    	<?php if (isset($All_empty)) { echo $All_empty; } ?>

					    </small>	
				
							<input class="form-control <?php echo !$empty_fname ?:'is-invalid'; ?>" type="text" name="fullname" placeholder="Full name">
							<small  class="small_errors"><?php if (isset($empty_fname)) { echo $empty_fname; } ?></small>
							
					
                        
						<input class="form-control <?php echo !$empty_email ?:'is-invalid'; ?>" type="email" name="Email" placeholder="Email">
						<small  class="small_errors"><?php if (isset($empty_email)) { echo $empty_email;} ?></small>
		                
                       

                        
						<input class="form-control <?php echo !$pword_empty ?:'is-invalid'; ?>" type="password" name="pword" placeholder="Create a Password">
						<div>
							<small  class="small_errors"><?php if (isset($pword_empty)) { echo $pword_empty;} ?></small>
						</div>
						
                        
				</div>

				<div class="mb-3" class="child_container2">
					 
						<input class="form-control <?php echo !$comp_empty ?:'is-invalid'; ?>" type="text" name="company_name" placeholder="Company Name">

						<small  class="small_errors"><?php if (isset($comp_empty)) {echo $comp_empty; } ?></small>
					
					
			            <input class="form-control <?php echo !$num_empty ?:'is-invalid'; ?>"  type="text" name="phone_number" placeholder="Phone Number">
			            <small  class="small_errors"><?php if (isset($num_empty)) {echo $num_empty; } ?></small>
			     
						
				   <select  class="form-control <?php echo !$country_empty ?:'is-invalid'; ?>"  name="country_selection">

						<option selected disabled  >Country</option>
						<option>Philippines</option>
						<option>United States</option>
						<option>Japan</option>
						<option>China</option>
						<option>Korea</option>

				   </select>

				<small class="small_errors" ><?php if (isset($country_empty)) { echo $country_empty;} ?></small>
				
								
					<select class="form-control <?php echo !$specify_empty ?:'is-invalid'; ?>"  name="specify">

						<option selected disabled  >How did you hear us? (Optional)</option>
						<option>Sales Email</option>
						<option>Social Media</option>
						<option>Advertisement</option>
						<option>Referral Partner</option>
						<option>Google</option>
						<option>Other</option>

					</select>
							
				<small  class="small_errors"><?php if (isset($specify_empty)) { echo $specify_empty; } ?></small>
                
						<div class="child_container3">
							
							<input class="checkbox" type="checkbox" name="terms"> 
							<p>Yes, I understand and agree to the</p>
							<a class="terms-of" href="#">FreeUp Terms of Service.</a>
						
						</div>

						<small class="small_errors1" ><?php if (isset($terms_empty)) { echo $terms_empty; } ?></small>
		                    <button class="Create" type="submit" name="sign_up">Create My Account</button>
			    </div>
		  </form>
	  </div>
  </div>


</body>
</html>
