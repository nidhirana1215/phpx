<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <title>EIR LOGIN</title>
    <style>
        table {
            width: 50%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px #ccc;
            border-radius: 2px;
            background-color: #f1f1f1;
            resize: none;
            margin-top: 10%;
            border-radius: 10px;
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
        td,label{
            font-weight: bold;
            font-size: large;
        }   
    </style>
</head>
<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "electronics");
if (isset($_POST['Login'])) {
    $username = $_POST['txtuname'];
    $password = $_POST['txtpass'];
    $type = $_POST['type'];
    $flag = 0;
    if ($type == "admin") {
        $query = "select * from registration where name='$username' and password='$password' and type='$type'";
        $result = mysqli_query($cn, $query);
        if ($row = mysqli_fetch_array($result)) {
            $flag = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            echo "<script>
            window.location.href='admin.php';</script>";
        }
    } else if ($type == "customer") {
        $query = "select * from registration where name='$username' and password='$password' and type='$type'";
        $result = mysqli_query($cn, $query);
        if ($row = mysqli_fetch_array($result)) {
            $flag = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            echo "<script>
            window.location.href='customer.php';</script>";
        }
    } else if ($type == "service_provider") {
        $query = "select * from registration where name='$username' and password='$password' and type='$type'";
        $result = mysqli_query($cn, $query);
        if ($row = mysqli_fetch_array($result)) {
            $flag = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            echo "<script>
            window.location.href='service_provider.php';</script>";
        }
    }
}
?>

<body>
    <form method="POST">
        <table bgcolor="lightblue" align="center">

            <tr>
                <td colspan="2">
                    <h1 align="center" style="margin:5% ;"> LOGIN FORM</h1>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">USER NAME:</label></td>
                <td><input type="text" name="txtuname" id="txtuname" class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">PASSWORD:</label></td>
                <td><input type="password" name="txtpass" id="txtpass" class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">SELECT TYPE:</label></td>
                <td>
                    <select name="type" class="form-select">
                        <option value="admin">admin</option>
                        <option value="customer">Customer</option>
                        <option value="service_provider">Service_provider</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="Login" value="Login" class="btn btn-success"></td>
            </tr>

            <tr>

                <td colspan="2" align="center">If you have not an Account?<a href="registration.php">Click Here</a></td>
            </tr>
        </table>
    </form>
</body>

</html>