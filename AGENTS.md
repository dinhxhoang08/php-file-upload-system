# OpenHands Project Memory

This repository contains a PHP-based web application with file upload, contact management, and gallery features.

## Project Structure
- `index.php`: Main upload interface (supports multiple files).
- `upload.php`: Backend logic for file processing.
- `gallery.php`: Image gallery with pagination (5 items/page).
- `contact.php`: Contact form integrated with SQLite.
- `view_contacts.php`: Admin interface for viewing and deleting contact submissions.
- `auth.php`: Basic Authentication handler.
- `header.php` / `footer.php`: Shared UI components and styles.
- `uploads/`: Directory for stored files.
- `database.db`: SQLite database for contact information.

## Technical Details
- **Environment**: PHP CLI with SQLite3 extension.
- **Server**: Runs on `0.0.0.0:8011` (local access via `http://localhost:38705`).
- **Security**: 
  - Basic Auth (User: `admin`, Pass: `837939`).
  - File extension filtering (`.jpg`, `.jpeg`, `.png`, `.gif`, `.txt`).
  - File size limit: 5MB.
- **Data Storage**: 
  - Files are stored in `uploads/` with overwrite enabled.
  - Contacts are stored in the `contacts` table of `database.db`.

## Development Insights
- The UI uses a modular `header.php` which includes `auth.php`. Any new page must include the header to be protected.
- Permissions: The root directory and `uploads/` must be writable for SQLite and file uploads to function.
- PHP Extensions: `php-sqlite3` is required for the contact system.
