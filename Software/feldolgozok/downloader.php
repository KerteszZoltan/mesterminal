<?php 

include "../connection.php";
include_once("../html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}

print $_POST['attachmentID'];



if(isset($_POST['attachmentID'])){
	$attachmentID=$_POST['attachmentID'];
	$selectAttachment="SELECT name FROM `attachment` where `ID`='$attachmentID'";
	$resultAttachment = $conn -> query($selectAttachment);
    if ($resultAttachment->num_rows > 0) {
    while($row = $resultAttachment->fetch_assoc()) {
        print $filename=$row["name"];
		}
	}
	
	$filename1="./attachments".$filename;
	//Check the file exists or not
if(file_exists($filename1)) {

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($filename1).'"');
header('Content-Length: ' . filesize($filename1));
header('Pragma: public');

//Clear system output buffer
flush();

//Read the size of the file
readfile($filename1);

//Terminate from the script
die();
}
else{
echo "File does not exist.";
}
}
else
echo "Filename is not defined."
	
}


	
/*
//Read the filename
$filename = '../attachments/'.$filename;
//Check the file exists or not
if(file_exists($filename)) {

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($filename).'"');
header('Content-Length: ' . filesize($filename));
header('Pragma: public');

//Clear system output buffer
flush();

//Read the size of the file
readfile($filename);

//Terminate from the script
die();
}
else{
echo "File does not exist.";
}
}
else
echo "Filename is not defined.";
*/
?>