<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complain Registration</title>
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
      background-color: #04AA6D;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;

    }

    td,
    label {
      font-weight: bold;
      font-size: large;
    }
  </style>
</head>
<?php
session_start();
$cid=$_SESSION["username"];
$cn = mysqli_connect("localhost","root","","electronics");
if(isset($_POST['insert']))
{ 
    
    $name=$_POST['product'];
    $desc=$_POST['desc'];
    $query="insert into complain(pro_id,description,id,status) values('$name','$desc','$cid','new')";
    mysqli_query($cn,$query) or die(mysqli_error($cn));
}
?>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php
        echo "<h1>Hello ", $cid, "</h1>";
        ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex" role="search">

          <button class="btn btn-secondary" type="submit" value="Logout"><a href="logout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <form method="post" enctype="multipart/form-data">
    <table align="center" border="2">
      <tr>
        <td colspan="2" align="center" style="padding:20px ;">
          <h2 align="center">COMPLAIN REGISTRATION FORM</h2>
        </td>
      </tr>

      <tr>
        <td>
          <label class="form-label">PRODUCT NAME</label>
        </td>
        <td>
          <select name="product" class="form-select">
            <?php
                $query="select * from product";
                $result=mysqli_query($cn,$query);
                while($row=mysqli_fetch_array($result))
                {
                    echo "<option>",$row[1],"</option>";
                }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label class="form-label">DESCRIPTION:</label>
        </td>
        <td>
          <textarea name="desc" class="form-control" rows="4"></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="insert" id="insert" class="btn btn-success">
        </td>
      </tr>
    </table>
    <table class="container table table-dark table-striped">
        <tr>
            <td colspan="5" align="center"><h2>VIEW STATUS</h2></td>
        </tr>
      <tr>
        <th>COMPLAIN ID</th>
        <th>CUSTOMER NAME</th>
        <th>PRODUCT NAME</th>
        <th>COMPLAIN DESCRIPTION</th>
        <th>STATUS</th>
      </tr>
      <?php
      $query = "select * from complain";
      $result = mysqli_query($cn, $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[3]; ?></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><?php echo $row[4]; ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </form>
</body>

</html>