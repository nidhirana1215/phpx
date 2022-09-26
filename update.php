<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            margin-top: 10%;
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
    </style>
</head>
<?php
$cn=mysqli_connect("localhost","root","","electronics");
if(isset($_REQUEST['id']))
{
    $pid=$_REQUEST['id'];
    $query="select * from product where pro_id = $pid";
    $result=mysqli_query($cn,$query);
    $row=mysqli_fetch_array($result);
    $i=$row["pro_id"];
    $n=$row["name"];
    $d=$row["description"];
}
if(isset($_POST['update']))
{
    $pnm=$_POST['txtpnm'];
    $desc=$_POST['desc'];
    $uquery="update product set name='$pnm', description='$desc' where pro_id=$pid";
    $result=mysqli_query($cn,$uquery);
    header('location:product.php');
}
?>
<body>
    <form method="post">
        <table border="2" align="center" class="table1">
            <tr>
                <td colspan="2" align="center" style="font-size:large ;"><h1>PRODUCT UPDATE FORM</h1></td>
            </tr>
            <tr>
                <td>PRODUCT ID</td>
                <td>
                    <input type="text" name="txtid" id="txtid" class="form-control" value="<?php echo $row['pro_id']?>">
                </td>
            </tr>
            <tr>
                <td>PRODUCT NAME</td>
                <td>
                    <input type="text" name="txtpnm" id="txtpnm" class="form-control" value="<?php echo $row['name']?>">
                </td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td>
                    <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $row['description']?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="UPDATE" name="update" class="btn btn-success">
                </td>
            </tr>
        </table>
    </form> 
</body>
</html>