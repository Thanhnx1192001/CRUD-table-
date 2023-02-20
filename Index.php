<?php
session_start();
$servername = "localhost";
$username = "Thanhnx";
$password = "Thanh@0123";
$database= "ClassVsStudent";
// Create connection
$conn = new mysqli($servername, $username, $password,$database );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Search And Filter Data

if(isset($_POST['Search'])){
  $valuetoSearch = $_POST['ValuetoSearch'];
  $select = $_POST['select'];
  If($select == 'all'){
    $sql = "SELECT * FROM `Students` WHERE CONCAT(`Id`, `FullName`, `Orientation`, `Class_id`) LIKE '%".$valuetoSearch."%'";
    $result = $conn->query($sql);
  }
  If($select == 'Id'){
    $sql = "SELECT * FROM `Students` WHERE CONCAT(`Id`) LIKE '%".$valuetoSearch."%'";
    $result = $conn->query($sql);
  }
  If($select == 'FullName'){
    $sql = "SELECT * FROM `Students` WHERE CONCAT(`FullName`) LIKE '%".$valuetoSearch."%'";
    $result = $conn->query($sql);
  }
  If($select == 'Orientation'){
    $sql = "SELECT * FROM `Students` WHERE CONCAT(`Orientation`) LIKE '%".$valuetoSearch."%'";
    $result = $conn->query($sql);
  }
  If($select == 'Class_id'){
    $sql = "SELECT * FROM `Students` WHERE CONCAT(`Class_id`) LIKE '%".$valuetoSearch."%'";
    $result = $conn->query($sql);
  }
}else{
  $sql = "SELECT * FROM Students";
  $result = $conn->query($sql);
}

$sql1 = "SELECT * FROM `Class`";
$result1 = $conn->query($sql1);
?>

<!doctype html>
<html lang="vi">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ClassVsStudent</title>
</head>
<body>

<div class="container">
<h1>LIST STUDENTS</h1>

<form action="index.php" method="post">
  <input type ="text" name="ValuetoSearch" ><br><br>

  <select name="select" class="select" data-mdb-filter="true">
    <option value="all"> All   </option>
    <option value="Id"> Id   </option>
    <option value="FullName">FullName</option>
    <option value="Orientation">Orientation</option>
    <option value="Class_id">Class_id</option>
  </select>

  <input type ="submit" name='Search' value="Tìm"><br><br>

  

</form>

<a class="btn btn-success" href="/CRUD/add.php" role ="button">Thêm nhân viên</a>

<table  class="table"> 
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">FullName</th>
      <th scope="col">Orientation</th>
      <th scope="col">Class_id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  while($row = $result->fetch_assoc()) {
    echo "
    <tr>
      <td>$row[Id]</td>
      <td>$row[FullName]</td>
      <td>$row[Orientation]</td>
      <td>$row[Class_id]</td>
      <td>
        <a class='btn btn-primary' href='http://localhost/CRUD/edit.php?Id=$row[Id]'>Sửa</a>
        <a class='btn btn-secondary' href='http://localhost/CRUD/delete.php?Id=$row[Id]'>Xoá</a>
      </td>
    </tr>";
  }
  ?>
  </tbody>


    <?php if(isset($_SESSION['status'])){?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Thông báo :</strong> <?php echo $_SESSION['status'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['status']); }?>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>    
  </body>
</html>
