<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Provider</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <style>
    table {
      width: 50%;
      height: 150px;
      padding: 12px 20px;
      box-sizing: border-box;
      border: 2px #ccc;
      border-radius: 4px;
      background-color: #f1f1f1;
      resize: none;
      margin-top: 5%;
      font-size: large;
      /* border-radius: 30px; */
    }

    input[type=button],
    input[type=submit],
    input[type=reset] {
      /* background-color: #04AA6D; */
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
    }

    label {
      font-size: larger;
      width: 150px;
    }
  </style>
</head>
<?php
$cn = mysqli_connect("localhost", "root", "", "electronics");
if (isset($_POST['insert'])) {
  $name = $_POST['txtname'];
  $pass = $_POST['txtpass'];
  $age = $_POST['txtage'];
  $cno = $_POST['txtcno'];
  // $type=$_POST['type'];
  //$photo=$_POST['txtphoto'];

  $filename = $_FILES['fileToUpload']['name'];
  $basename = substr($filename, 0, strripos($filename, '.'));
  $ext = substr($filename, strripos($filename, '.'));
  $size = $_FILES['fileToUpload']['size'];
  $tmpname = $_FILES['fileToUpload']['tmp_name'];
  $allowed_array = array('.jpg', '.gif', '.tmp', '.jpeg', '.png');
  $uploadok = 0;
  $newfilename = md5($basename) . rand(50, 500) . $ext;
  if (in_array($ext, $allowed_array) && ($size < 2000000)) {

    if (file_exists('./upload/' . $newfilename)) {
      echo "<script> alert('file already exists') </script>";
    } else {
      move_uploaded_file($tmpname, './upload/' . $newfilename);
      $uploadok = 1;
      //echo "<script> alert('file uploaded successfully.....!!')</script>";
    }
  } else {
    echo "<script> alert('file extension should be" . implode(',', $allowed_array) . "')</script>";
  }

  $query = "insert into registration(name,password,age,contact_no,photo,type) values('$name','$pass','$age','$cno','$newfilename','service_provider')";
  mysqli_query($cn, $query) or die(mysqli_error($cn));
}

?>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php
        session_start();
        echo "<b>Hello ", $_SESSION["username"],"...!</b>";
        ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="product.php">Product Master</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="SerProReg.php">Service Provider</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="viewcomplain.php">Complain Allocation</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
        <button class="btn btn-info" type="button" value=""><a href="logout.php">Logout</a></button> 
        </form>
      </div>
    </div>
  </nav>

  <form method="post" enctype="multipart/form-data">
    <table align="center" border="2">
      <tr>
        <td colspan="2" align="center" style="padding:20px ;">
          <h2 align="center">SERVICE PROVIDER REGISTRATION FORM</h2>
        </td>
      </tr>

      <tr>
        <td>
          <label class="form-label">ID:</label>
        </td>
        <td>
          <input type="text" name="txtid" id="txtid" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">NAME:</label>
        </td>
        <td>
          <input type="text" name="txtname" id="txtname" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">PASSWORD:</label>
        </td>
        <td>
          <input type="password" name="txtpass" id="txtpass" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">AGE:</label>
        </td>
        <td>
          <input type="text" name="txtage" id="txtage" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">CONTACT NUMBER:</label>
        </td>
        <td>
          <input type="tel" name="txtcno" id="txtcno" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">PHOTO:</label>
        </td>
        <td>
          <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="insert" id="insert" class="btn btn-success">
        </td>
      </tr>
    </table>

    
  </form>
</body>

</html>