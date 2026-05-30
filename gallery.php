<?php include 'header.php'; ?>

<div class="content-card" style="max-width: 1000px;">
    <h2>Uploaded Images</h2>

    <?php
    $target_dir = "uploads/";
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $images = array();

    if (is_dir($target_dir)) {
        $files = scandir($target_dir);
        foreach ($files as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, $allowed_extensions)) {
                $images[] = $file;
            }
        }
    }

    // Pagination logic
    $total_images = count($images);
    $items_per_page = 5;
    $total_pages = ceil($total_images / $items_per_page);
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($current_page < 1) $current_page = 1;
    if ($current_page > $total_pages && $total_pages > 0) $current_page = $total_pages;

    $offset = ($current_page - 1) * $items_per_page;
    $paged_images = array_slice($images, $offset, $items_per_page);
    ?>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 20px; margin-top: 20px;">
        <?php if (empty($paged_images)): ?>
            <p style="grid-column: 1 / -1; color: #888;">No images found.</p>
        <?php else: ?>
            <?php foreach ($paged_images as $img): ?>
                <div style="background: #eee; padding: 10px; border-radius: 8px; text-align: center;">
                    <img src="uploads/<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($img); ?>" style="width: 100%; height: 120px; object-fit: cover; border-radius: 4px; margin-bottom: 8px;">
                    <div style="font-size: 11px; color: #555; word-break: break-all;"><?php echo htmlspecialchars($img); ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Pagination Controls -->
    <?php if ($total_pages > 1): ?>
        <div style="margin-top: 30px; display: flex; justify-content: center; gap: 10px;">
            <?php if ($current_page > 1): ?>
                <a href="gallery.php?page=<?php echo $current_page - 1; ?>" style="padding: 8px 16px; background: #4a90e2; color: white; text-decoration: none; border-radius: 6px;">Previous</a>
            <?php endif; ?>

            <span style="padding: 8px 16px; color: #666;">Page <?php echo $current_page; ?> of <?php echo $total_pages; ?></span>

            <?php if ($current_page < $total_pages): ?>
                <a href="gallery.php?page=<?php echo $current_page + 1; ?>" style="padding: 8px 16px; background: #4a90e2; color: white; text-decoration: none; border-radius: 6px;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
