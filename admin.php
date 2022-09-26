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
  <title>Admin Home Page</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><b>ADMIN PANEL</b></a>
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
  <img src="./upload/EIR.jpg" alt="" style="margin-left:30% ; margin-top:5%;">
</body>

</html>