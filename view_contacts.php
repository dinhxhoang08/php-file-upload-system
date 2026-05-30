<?php
$db = new SQLite3('/workspace/project/database.db');

// Handle single delete
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $db->prepare('DELETE FROM contacts WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
    header("Location: view_contacts.php");
    exit;
}

// Handle delete all
if (isset($_POST['delete_all'])) {
    $db->exec('DELETE FROM contacts');
    header("Location: view_contacts.php");
    exit;
}

include 'header.php'; 
?>

<div class="content-card" style="max-width: 900px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Contact Submissions</h2>
        <form method="post" onsubmit="return confirm('Are you sure you want to delete ALL contacts?');">
            <button type="submit" name="delete_all" style="background-color: #dc3545; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600;">Delete All</button>
        </form>
    </div>
    
    <?php
    $results = $db->query('SELECT * FROM contacts ORDER BY id DESC');
    
    if ($results) {
        echo '<table style="width: 100%; border-collapse: collapse; text-align: left;">';
        echo '<thead style="background-color: #f8f9fa;">';
        echo '<tr>';
        echo '<th style="padding: 12px; border-bottom: 2px solid #dee2e6;">ID</th>';
        echo '<th style="padding: 12px; border-bottom: 2px solid #dee2e6;">Name</th>';
        echo '<th style="padding: 12px; border-bottom: 2px solid #dee2e6;">Email</th>';
        echo '<th style="padding: 12px; border-bottom: 2px solid #dee2e6;">Message</th>';
        echo '<th style="padding: 12px; border-bottom: 2px solid #dee2e6;">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        $hasRows = false;
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $hasRows = true;
            echo '<tr>';
            echo '<td style="padding: 12px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($row['id']) . '</td>';
            echo '<td style="padding: 12px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($row['name']) . '</td>';
            echo '<td style="padding: 12px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($row['email']) . '</td>';
            echo '<td style="padding: 12px; border-bottom: 1px solid #dee2e6;">' . nl2br(htmlspecialchars($row['message'])) . '</td>';
            echo '<td style="padding: 12px; border-bottom: 1px solid #dee2e6;">';
            echo '<a href="view_contacts.php?delete_id=' . $row['id'] . '" onclick="return confirm(\'Delete this contact?\');" style="color: #dc3545; text-decoration: none; font-weight: 600;">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        if (!$hasRows) {
            echo '<tr><td colspan="5" style="padding: 20px; text-align: center; color: #888;">No submissions found.</td></tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p style="color: #721c24;">Error loading data.</p>';
    }
    ?>
</div>

<?php include 'footer.php'; ?>
