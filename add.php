<?php
session_start();
$servername = "localhost";
$username = "Thanhnx";
$password = "Thanh@0123";
$database= "ClassVsStudent";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//echo "Connected successfully";

$FullName="";
$Orientation="";
$Class_id="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $FullName=$_POST["FullName"];
    $Orientation=$_POST["Orientation"];
    $Class_id=$_POST["Class_id"];
    do {
        if(empty($FullName) || empty($Orientation) || empty($Class_id)){
            $errorMessage = "Lỗi - yêu cầu nhập lại";
            break;
        }
        //Thêm người mới 
        $sql = "INSERT INTO `Students` (`Id`, `FullName`, `Orientation`, `Class_id`) VALUES (NULL, '$FullName','$Orientation' ,'$Class_id');";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
          
        $FullName="";
        $Orientation="";
        $Class_id="";

        $successMessage="Thêm thành công";

        $_SESSION['status'] = "Đã thêm thành công";
        header('location: http://localhost/CRUD/index.php?');
        exit;
    }while(false);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
   <h1>
    Thêm học sinh mới 
   </h1>
    <form method = "POST">
    <div class="mb-3">
        <label class="form-label">FullName</label>
        <input type="text" class="form-control" name="FullName" value='<?php echo $FullName; ?>'> 
    </div>
    <div class="mb-3">
        <label class="form-label">Orientation</label>
        <input type="text" class="form-control" name="Orientation" value='<?php echo $Orientation; ?>'> 
    </div>
    <!-- <div class="mb-3">
        <label class="form-label">Class_id</label>
        <input type="text" class="form-control" name="Class_id" value='<?php echo $Class_id; ?>'> 
    </div> -->

    <?php
    $sql1 = "SELECT * FROM `Class`";
    $result1 = $conn->query($sql1);
    ?>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Disabled select menu</label>
      <select id="disabledSelect" class="form-select" name ="Class_id" >
        <?php foreach ($result1 as $item) {
        ?>
        <option value="<?php echo $item['Id'] ?>"  > <?php echo $item['FullName'] ?></option>
        <?php
    } 
    ?>
        
      </select>
    </div>    

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Nhập</button>
        <a  type="submit" class="btn btn-primary" href='http://localhost/CRUD/index.php'>Trở về</a>
    </div>
    </form>


    <?php
    if(!empty($errorMessage)){
        echo $errorMessage;
    }
    if(!empty($successMessage)){
        echo $successMessage;
    }
    ?>
   </div>
    
  </body>
</html>