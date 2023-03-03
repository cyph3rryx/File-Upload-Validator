<?php
if(isset($_POST["submit"])){
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $extensions = array("jpeg","jpg","png","pdf","doc","docx","xls","xlsx");

    // File Type Validation
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_tmp);
    if (!in_array($mime_type, $mime_types)) {
        echo "Invalid file type. Please upload a valid file.";
    } else {
        // Virus Scan
        $virus_scan = shell_exec("clamscan - -no-summary - -detect-pua $file_tmp");
        if (strpos($virus_scan, "OK") !== false) {
            // File Hashing
            $file_hash = hash_file("sha256", $file_tmp);
            // Size Limit
            $max_size = 2097152;
            if($file_size > $max_size){
                echo 'File size must be less than 2 MB';
            } else {
                // File Naming Convention
                $target_dir = "uploads/";
                $target_file = $target_dir . $file_hash . "_" . basename($file_name);
                move_uploaded_file($file_tmp, $target_file);
                // Logging
                $upload_time = date("Y-m-d H:i:s");
                $user_ip = $_SERVER['REMOTE_ADDR'];
                $log_message = "$file_name uploaded successfully by $user_ip at $upload_time";
                error_log($log_message, 3, "logs/upload.log");
                echo "File uploaded successfully.";
            }
        } else {
            echo "The file you are attempting to upload appears to be infected with a virus or malware. Please scan your device for viruses and try again.";
        }
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload" />
</form>
