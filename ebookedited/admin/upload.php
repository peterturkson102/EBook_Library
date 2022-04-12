<?php

 $targetfolder = "../books/";

 $target_file = $targetfolder . basename( $_FILES['fileToUpload']['name']) ;

 $ok=1;

$file_type=$_FILES['fileToUpload']['type'];

if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
}

else {

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
}

else {
if ($file_type=="application/pdf" || $file_type=="application/ebup " ) {

 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))

 {

 echo "The file ". basename( $_FILES['fileToUpload']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading file";

 }

}

else {

 echo "You may only upload PDFs, JPEGs or GIF files.<br>";

}
}
}

?>