<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <style>
        .table1 {
            width: 40%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px #ccc;
            border-radius: 6px;
            background-color: #f1f1f1;
            resize: none;
            margin-top: 5%;
            font-size: large;
            /* border-radius: 30px; */
        }

        input[type=button],
        input[type=submit],
        input[type=reset] {
            
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
  
<?php
$cn=mysqli_connect("localhost","root","","electronics");
if(isset($_POST['insert']))
{
    $pname=$_POST['txtpnm'];
    $desc=$_POST['txtdesc'];
    $query="insert into product(name,description) values('$pname','$desc')";
    mysqli_query($cn,$query);
}

?>
<form method="post">
        <table border="2" align="center" class="table1">
            <tr>
                <td colspan="2" align="center" style="padding:20px ;"><h3>PRODUCT REGISTRATION FORM</h3></td>
            </tr>
            <tr>
                <td><label class="form-label">PRODUCT ID</label></td>
                <td>
                    <input type="text" name="txtid" id="txtid" class="form-control">
                </td>
            </tr>
            <tr>
            <td><label class="form-label">PRODUCT NAME</label></td>
                <td>
                    <input type="text" name="txtpnm" id="txtpnm" class="form-control">
                </td>
            </tr>
            <tr>
            <td><label class="form-label">DESCRIPTION</label></td>
                <td>
                <textarea name="txtdesc" class="form-control" rows="4"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="INSERT" name="insert" class="btn btn-success">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    
    <table border="2" align="center" class=" container table table-dark table-striped">
        <tr>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT DESCRIPTION</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php
        $squery="select * from product";
        $result=mysqli_query($cn,$squery);
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <td><?php echo $row["pro_id"]?></td>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["description"]?></td>
                <td>
                    <a href="update.php?id=<?php echo $row[0]; ?>"><input type="submit" value="EDIT" class="btn btn-secondary" name="update"></a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row[0]; ?>"><input type="submit" value="DELETE" class="btn btn-danger"></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>