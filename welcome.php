<?php
include ('freeup_db.php');
session_start();
if (!isset($_SESSION['email'])) {
 	header('Location: login.php');
 } 
 ?>
 <?php 
  if (isset($_POST['submit']) && isset($_FILES['file'])) {
  	  $file = $_FILES['file'];
      
			$image_name = $_FILES['file']['name'];
			$image_size = $_FILES['file']['size'];
			$tmp_name = $_FILES['file']['tmp_name'];
			$image_error = $_FILES['file']['error'];

      if ($image_error === 0) {
      	if ($image_size > 5000000) {
      	   echo "Sorry this file is too large!";
      	}else {
      		$image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
      		$image_location = strtolower($image_extension);

      		$allowed = array("jpg", "jpeg", "png");
      		if (in_array($image_location, $allowed)) {
      		 	$new_imageName = uniqid("IMG-", true).".".$image_location;
      		 	$image_path = 'uploads/'. $new_imageName;
      		 	move_uploaded_file($tmp_name, $image_path);
             $sql_img = "UPDATE profile SET image = '$new_imageName'";
             $result_img = 	mysqli_query($conn, $sql_img);
            
			$sql = "INSERT INTO profile (image) VALUES ('$new_imageName') ";
			mysqli_query($conn, $sql);
      		 }else {
      		 	echo "You can only upload JPG, JPEG and PNG";
      		 }
      	}
      }else {
      	 echo "Choose a file!";
      } 
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<style >
 * {
 	padding: 0;
 	margin: 0;
 	box-sizing: border-box;
 }
.main-header {
	height: 100px;
	display: flex;
    
	justify-content: space-between;
	align-items: center;
	background-color: #8cbd97;
}
.main-header h1 {
   font-family: sans-serif;
   position: relative;
   left: 1%;
}
.second-container {
  position: absolute;
  right: 5%;
  display: flex;
  grid-gap: 10px;
}
.second-container a{
	text-decoration-line: none;
	color: #fff;
	font-family: monospace;
	font-weight: bold;

}
.sign-up, .log-out {
	padding: 10px;
	font-size: 20px;
	border-radius: 5px;
	border: none;
	background-color: #5d83b3;
}
.form {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 400px;
	grid-gap: 10%;
}
.Upload {
	font-family: sans-serif;
	font-weight: bold;
	font-size: 20px;

}
.profile {
	display: flex;
	align-items: center;
	height: 150px;
}
.user_img {
	height: 100px;
	width: 100px;
	border-radius: 100px;
}


</style>

<body>
	<div class="main-header">
		<h1>Welcome <?php echo $_SESSION['email']; ?> </h1>
	   <div class="second-container">
	   
		     <button class="sign-up"><a href="sign-up.php">Go to Sign up Page</a></button>
	         <button class="log-out"><a href="log_out.php">Log out</a></button>
	      
       </div>
    </div>
		<?php
		 $sql = "SELECT * FROM profile ORDER BY image ASC";
		 $result = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($result) > 0 ) {
		 	while ($images = mysqli_fetch_assoc($result)) { ?>
		 		<div class="profile">
		 			<img class="user_img" src="uploads/<?=$images['image']?>">
		 		</div>
		<?php } }?>
	<form class="form" method="post" enctype="multipart/form-data">

		<label class="Upload">Upload Profile: </label>
		<input type="file" name="file" accept=".jpg, .jpeg, .png">
		<button type="submit" name="submit">UPLOAD PROFILE</button>

	</form>

    	
</body>
</html>