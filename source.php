<?php
if(isset($_POST["submit"])){
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
    $extensions = array("jpeg","jpg","png","pdf","doc","docx","xls","xlsx");

    if(in_array($file_ext,$extensions)=== false){
         echo "Extension not allowed, please choose a JPEG, JPG, PNG, PDF, DOC, DOCX, XLS, or XLSX file.";
    }else{
         if($file_size > 2097152){
            echo 'File size must be less than 2 MB';
         }else{
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            move_uploaded_file($file_tmp, $target_file);
            echo "File uploaded successfully.";
         }
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload" />
</form>
