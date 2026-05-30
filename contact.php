<?php
// Database setup
$db = new SQLite3('/workspace/project/database.db');
$db->exec("CREATE TABLE IF NOT EXISTS contacts (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, email TEXT, message TEXT)");

$status = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $db->prepare('INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':message', $message, SQLITE3_TEXT);

    if ($stmt->execute()) {
        $status = 'success';
        
        // Step 2 & 3: Prepare and send email
        $to = $email;
        $subject = "Thank you for contacting us!";
        $body = "Hi " . htmlspecialchars($name) . ",\n\nThank you for reaching out to us. We have received your message and will get back to you soon.\n\nBest regards,\nThe Team";
        $headers = "From: webmaster@example.com\r\n";
        $headers .= "Reply-To: support@example.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Note: mail() requires a configured mail server to actually send emails.
        @mail($to, $subject, $body, $headers);
    } else {
        $status = 'error';
    }
}
?>

<?php include 'header.php'; ?>

<div class="content-card">
    <h2>Contact Us</h2>
    
    <?php if($status == 'success'): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            Thank you! Your message has been saved to our database.
        </div>
    <?php elseif($status == 'error'): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            Sorry, there was an error saving your message.
        </div>
    <?php endif; ?>

    <form action="contact.php" method="post" style="text-align: left;">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #666;">Name</label>
            <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #666;">Email</label>
            <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #666;">Message</label>
            <textarea name="message" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; height: 100px; box-sizing: border-box;"></textarea>
        </div>
        <button type="submit" style="background-color: #4a90e2; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">Send Message</button>
    </form>
</div>

<?php include 'footer.php'; ?>
