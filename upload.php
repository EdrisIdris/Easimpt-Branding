 <?php 
  if (isset($_POST['submit'])) {
  	 
  	  $file = $_FILES['file'];
     

     
   
  	  $fileName = $_FILES['file']['name'];
  	  $fileTmpName = $_FILES['file']['tmp_name'];
  	  $fileSize = $_FILES['file']['size'];
  	  $fileError = $_FILES['file']['error'];
  	  $fileType = $_FILES['file']['type'];

  	  $fileExt = explode('.', $fileName);
  	  $fileActualExt = strtolower(end($fileExt));

  	  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
      
     

     
  	  if (in_array($fileActualExt, $allowed)) {
  	  	 if ($fileError === 0) {
           if ($fileSize < 500000) {
           	   $fileNameNew = uniqid('', true).".".$fileActualExt;
           	   $fileDestination = 'Images/'. $fileNameNew;
           	   move_uploaded_file($fileTmpName,  $fileDestination);
           	   echo "uploaded Success!";
           }else {
           	  echo "This file is too big!";
           }
  	  	 }else {
  	  	 	echo "There was an Error uploading your file!";
  	  	 }
  	  }else {
  	  	 echo "You cannot upload this type of file!";
  	  }

  }
  
 ?>