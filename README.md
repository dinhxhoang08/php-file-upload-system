# Professional PHP File Upload System

A robust and secure PHP-based web application for file management, featuring multiple file uploads, a paginated image gallery, and a contact system with SQLite database integration.

## 🚀 Features

- **Multi-File Upload**: Select and upload multiple files simultaneously.
- **File Restrictions**: Built-in validation for file types (JPG, PNG, GIF, TXT) and size limits (5MB).
- **Image Gallery**: View uploaded images in a clean grid layout with pagination (5 items per page).
- **Contact Form**: Integrated contact system that saves messages to a local SQLite database.
- **Admin Dashboard**: View all contact submissions with the ability to delete individual entries or clear the entire list.
- **Automated Notifications**: Sends a thank-you email to users upon successful contact form submission.
- **Basic Authentication**: Secured access for all pages (User: `admin`, Pass: `837939`).
- **Responsive Design**: Modern and clean UI built with professional CSS.

## 🛠️ Project Structure

- `index.php`: Main dashboard and multi-file uploader.
- `gallery.php`: Paginated image viewer.
- `contact.php`: Contact form with database and email logic.
- `view_contacts.php`: Admin panel for contact management.
- `auth.php`: Authentication security layer.
- `header.php` & `footer.php`: Shared UI components.
- `upload.php`: Backend file processing engine.

## 📦 Installation & Setup

1. **Requirements**:
   - PHP 7.4 or higher
   - SQLite3 PHP extension installed

2. **Setup**:
   - Clone the repository.
   - Ensure the `uploads/` directory and `database.db` are writable by the web server.
   ```bash
   chmod 777 uploads/
   chmod 777 .
   ```

3. **Run Locally**:
   Use the built-in PHP server:
   ```bash
   php -S localhost:8011
   ```

## 🔐 Security Information

Access to all pages is protected via Basic Auth:
- **Username**: `admin`
- **Password**: `837939`

## 📝 References

- For more technical details, see the [AGENTS.md](AGENTS.md) file.
- Database schema is automatically initialized in `database.db`.

---
_This project was developed and documented with the assistance of OpenHands (AI Agent)._
