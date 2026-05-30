<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding-top: 70px; /* Space for fixed navbar */
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: center;
            padding: 15px 0;
        }
        .navbar a {
            text-decoration: none;
            color: #333;
            margin: 0 20px;
            font-weight: 600;
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #4a90e2;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
            padding: 20px;
            box-sizing: border-box;
        }
        .content-card {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        h2 { color: #333; margin-bottom: 20px; }
        p { color: #666; line-height: 1.6; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php">Upload</a>
    <a href="gallery.php">Gallery</a>
    <a href="view_contacts.php">List Contacts</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</nav>

<div class="container">
