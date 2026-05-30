<?php include 'header.php'; ?>

<div class="content-card">
    <h2>File Uploader</h2>
    
    <?php if(isset($_GET['status'])): ?>
        <div class="message <?php echo $_GET['status'] == 'success' ? 'success' : 'error'; ?>" style="margin-top: 20px; padding: 10px; border-radius: 6px; font-size: 14px; <?php echo $_GET['status'] == 'success' ? 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;' : 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;'; ?>">
            <?php 
                if($_GET['status'] == 'success') echo "All files uploaded successfully!";
                else if($_GET['status'] == 'partial') echo "Some files were uploaded, but others failed.";
                else if($_GET['status'] == 'exists') echo "Error: File already exists.";
                else if($_GET['status'] == 'toolarge') echo "Error: File is too large.";
                else if($_GET['status'] == 'invalidtype') echo "Error: Only JPG, JPEG, PNG, GIF, & TXT allowed.";
                else echo "Error: Upload failed.";
            ?>
        </div>
    <?php endif; ?>

    <form action="upload.php" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="fileToUpload" style="display: block; margin-bottom: 8px; color: #666; font-weight: 600;">Select files</label>
            <input type="file" name="filesToUpload[]" id="fileToUpload" multiple required style="width: 100%; padding: 10px; border: 2px dashed #ddd; border-radius: 8px; cursor: pointer; box-sizing: border-box;">
        </div>
        <button type="submit" name="submit" style="background-color: #4a90e2; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background-color 0.3s; width: 100%;">Upload Files</button>
    </form>
    <p style="font-size: 12px; color: #888; margin-top: 10px;">Allowed formats: JPG, PNG, GIF, TXT (Max 5MB)</p>
</div>

<?php include 'footer.php'; ?>
