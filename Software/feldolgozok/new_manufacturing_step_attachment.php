<?php
include "../connection.php";
include_once("../html_frame/html_head.html");

print $manufacturing_step_ID = $_POST['manufacturing_step_ID'];

$target_dir = "../attachments/";
$filename   = uniqid() . "-" . time(); 
$extension  = pathinfo( $_FILES["srcfile"]["name"], PATHINFO_EXTENSION ); 
$basename   = $filename . "." . $extension; 
print $target_file = $target_dir . $basename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["srcfile"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["srcfile"]["name"])). " has been uploaded.";
	print $insert ="INSERT INTO attachment (name) 
              VALUES ('{$basename}')";
		$conn->query($insert);
		$sqlLast="SELECT MAX(ID) as id from attachment";
		$result = $conn->query($sqlLast);
		$last;
			if ($result->num_rows > 0) {
				foreach($result as $row) {
					$last=$row['id'];
				}
			}
    
		$insertProductAppendix="INSERT INTO manufacturing_step_attachment ( manufacturing_step_ID,attachment_ID)
                              VALUE ('{$manufacturing_step_ID}','{$last}')";
		$conn->query($insertProductAppendix);
		//header("Location: ../manufacturing_step_attachment.php");
  } else {
    echo "<br>Sorry, there was an error uploading your file.";
  }
}
?>