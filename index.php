<?php
  require "conn.php";

  if(isset($_FILES['files'])){
    $title = $_POST['title'];
    $descrip = $_POST['desc'];
    $filename = $_FILES['files']['name'];
    $temp_name = $_FILES['files']['tmp_name'];

    move_uploaded_file($temp_name, "files/".$filename);
    mysqli_query($conn, "insert into file_data(file_name, description, file_path) values('{$title}', '{$descrip}', '{$filename}')") or die("Can't able to upload the file");
    header("index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document Maintenance System</title>
  <style>
    /* Body Styling */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: white;
    }

    /* Container */
    .container {
      padding: 20px;
    }

    /* Navbar Styling */
    .navbar {
      display: flex;
      justify-content: space-around;
      background-color: rgb(81, 156, 247);
      padding: 10px;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      padding: 10px 15px;
    }

    .navbar a:hover {
      background-color: #575757;
      border-radius: 5px;
    }

    /* Highlight Styling */
    .highlight {
      color: #007bff;
    }

    /* Main Content Styling */
    .main-content {
      text-align: center;
      margin: 20px 0;
    }

    h1, h2 {
      color: #333;
    }

    input {
      display: block;
      margin: 10px auto;
      padding: 10px;
      width: 80%;
      max-width: 400px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Add Document Section */
    .add-document-section {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Navbar -->
    <nav class="navbar">
      <a href="#">🏠 Home</a>
      <a href="#contacts">📞 Contact Us</a>
      <a href="#help">❓ Help</a>
    </nav>

    <center>
    <!-- Main Content -->
    <div class="main-content">
      <h1>
        Document Maintenance System
      </h1>

      <form action="files_a.php" method="post">
        <!-- Search Section -->
        <div class="search-section">
          <h2>🔍 Find Your Documents here</h2>
          <p>Answer a few quick questions to get access for the Documents.</p>
          <input type="text" id="q2" name="desc" placeholder="Enter Keyword of Description">
          <input type="submit" name="sub_btn" value="SEARCH DOC">
        </div>
      </form>

      <!-- Add Document Section -->
      <form action="" method="post" enctype="multipart/form-data">
        <div class="add-document-section">
          <h2>📂 Add a New Document</h2>
          <p>Fill in the details to upload a file and save it.</p>
          <input type="text" id="title" name="title" placeholder="Document Title" required>
          <input type="text" id="description" name="desc" placeholder="Description" required>
          <input type="file" id="filepath" name="files" placeholder="File Path" required>
          <input type="submit" name="sub_btn" value="ADD DOC">
        </div>
      </form>
    </div>
    </center>
  </div>
  <script src="script.js"></script>
</body>
</html>
