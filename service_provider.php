<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complain Allocation</title>
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
      margin: 30px 2px;
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
$cn = mysqli_connect("localhost", "root", "", "electronics");
if (isset($_POST['complain_allocation'])) {
  $comid = $_POST['cid'];
  // $serid = $_POST['sid'];
  $status = $_POST['txtstatus'];
  //$query="insert into complain_allocation(status) values('$status')";
  $query = "update complain set status='$status'where complain_id='$comid'";
  $result = mysqli_query($cn, $query);
}
?>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php
        session_start();
        echo "<b>Hello ", $_SESSION["username"], "...!</b>";
        
        ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex" role="search">
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->

          <button class="btn btn-secondary" type="submit" value="Logout"><a href="logout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <form>

    <table class="container table table-dark table-striped">
      <tr>
        <td colspan="6" align="center">
          <h2>COMPLAIN TABLE</h2>
        </td>
      </tr>
      <tr>
        <th>COMPLAIN ID</th>
        <th>PRODUCT NAME</th>
        <th>DESCRIPTION</th>
        <th>CUSTOMER ID</th>
        <th>STATUS</th>
      </tr>
      <?php

      $query = "select * from complain";
      $result = mysqli_query($cn, $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><?php echo $row[3]; ?></td>
          <td><?php echo $row[4]; ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </form>


  <form method="post">
    <table align="center">
      <tr>
        <td align="center" colspan="2">
          <h2 style="margin-top:5%;">UPDATE STATUS</h2>
        </td>
      </tr>
      <tr>
        <td><label class="form-label">COMPLAIN ID</label></td>
        <td><select name="cid" class="form-select">
            <?php
            $query = "select * from complain";
            $result = mysqli_query($cn, $query);
            while ($row = mysqli_fetch_array($result)) {
              echo "<option>", $row['complain_id'], "</option>";
            }
            ?>
          </select></td>
      </tr>
      <tr>
        <td><label class="form-label">STATUS</label></td>
        <td>
          <select name="txtstatus" class="form-select">
            <option value="new" disabled>NEW</option>
            <option value="pending">PENDING</option>
            <option value="Complete">COMPLETE</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Allocate Complain" name="complain_allocation" class="btn btn-success"></td>
      </tr>
    </table>
  </form>
</body>

</html>