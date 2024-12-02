<?php
  require "conn.php";

  if(isset($_POST['sub_btn'])){
    $keyword = $_POST['desc'];

    $data =  mysqli_query($conn, "Select * from file_data where description like '{$keyword}%' or description like '%{$keyword}%' or description like '%{$keyword}'") or die("Can't able to fecth the data");


  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <center>
        <h2>Searched files</h2>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Sl No.</th>
                <th scope="col">File Title</th>
                <th scope="col">Description</th>
                <th scope="col">File Name</th>
                <th scope="col">Date</th>
                <th scope="col">Download</th>
              </tr>
            </thead>
            <tbody>
              <?php if(mysqli_num_rows($data)){
                      $n = 1;
                      while($rows = mysqli_fetch_assoc($data)){
                ?>
              <tr>
                <th><?php echo $n; ?></th>
                <td><?php echo $rows['file_name']; ?></td>
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $rows['file_path']; ?></td>
                <td><?php echo $rows['date']; ?></td>
                <td><a href="files/<?php echo $rows['file_path']; ?>" download="file" class="btn btn-primary">Download</a></td>
              </tr>

              <?php $n++; }}?>
              
            </tbody>
          </table>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>