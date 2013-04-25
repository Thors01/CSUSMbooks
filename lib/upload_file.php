<?php
if ($_FILES['file']['size'] != 0) {
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 1048576)
	&& in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else {
			$file = $_FILES["file"]["name"];
			$pos = strpos($file, ".");
			$filename = substr($file, 0, $pos);
			$i = 0;
			$exists = false;
			
			while (!$exists) {
				if(file_exists("upload/".$filename."_".$i.".".$extension)) {
					$i++;
				}
				else {
					echo $filename."_".$i.".".$extension;
					move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$filename."_".$i.".".$extension);
					$exists = true;
				}
			}
			
			$imagePath = "upload/".$filename."_".$i.".".$extension;	
		}
	}
	else {
		echo "Invalid file! Your file should be gif, jpg or png and smaller than 1024kB.";
	}
}
?>