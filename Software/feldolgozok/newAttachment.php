<?php
include "../connection.php";
include_once("../html_frame/html_head.html");

$productId = $_POST['productId'];

/*if(!empty($_FILES['file'])){
		$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
		$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
		$basename   = $filename . "." . $extension; // 5dab1961e93a7.jpg
		$source       = $_FILES["file"]["tmp_name"];
		$destination  = "../attachments/{$basename}";
		$productId=$_POST['productId'];
		move_uploaded_file( $source, $destination );
		
		$insert ="INSERT INTO attachment (name) 
           VALUES ('{$basename}')";
		//$conn->query($insert);
		$sqlLast="SELECT MAX(ID) as id from attachment";
		$result = $conn->query($sqlLast);
		$last;
			if ($result->num_rows > 0) {
				foreach($result as $row) {
					$last=$row['id'];
				}
			}
    
		$insertProductAppendix="INSERT INTO product_attachment (attachment_ID, product_Id)
                              VALUE ('{$last}', '{$productId}')";
		//$conn->query($insertProductAppendix);            
    }*/

$target_dir = "../attachments/";
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["srcfile"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7.jpg
print $target_file = $target_dir . $basename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["srcfile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["srcfile"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["srcfile"]["name"])). " has been uploaded.";
	$insert ="INSERT INTO attachment (name) 
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
    
		$insertProductAppendix="INSERT INTO product_attachment (attachment_ID, product_Id)
                              VALUE ('{$last}', '{$productId}')";
		$conn->query($insertProductAppendix);
		header("Location: ../attachment.php");
  } else {
    echo "<br>Sorry, there was an error uploading your file.";
  }
}
?>