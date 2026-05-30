<?php
include 'auth.php';
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["filesToUpload"])) {
        $total_files = count($_FILES["filesToUpload"]["name"]);
        $success_count = 0;
        $error_status = 'success';

        for ($i = 0; $i < $total_files; $i++) {
            $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Allow certain file formats
            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "txt");
            if (!in_array($fileType, $allowedExtensions)) {
                $error_status = 'invalidtype';
                continue;
            }

            // Check file size (limit to 5MB)
            if ($_FILES["filesToUpload"]["size"][$i] > 5000000) {
                $error_status = 'toolarge';
                continue;
            }

            // Move uploaded file
            if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
                $success_count++;
            } else {
                $error_status = 'error';
            }
        }

        if ($success_count == $total_files) {
            header("Location: index.php?status=success");
        } else if ($success_count > 0) {
            header("Location: index.php?status=partial");
        } else {
            header("Location: index.php?status=" . $error_status);
        }
        exit;
    } else {
        echo "No files were uploaded.";
    }
} else {
    echo "Invalid request method.";
}
?>
