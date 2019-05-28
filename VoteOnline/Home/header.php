<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="common.css">
  <!-- <link rel="stylesheet" href="Form.css"> -->
 </head>
 
<body>

  <nav class="navbar navbar-expand-sm  bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand navbar-collapse" href="#">Vote Online</a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Sign up as
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../Voter/vsignup.php">Voter</a>
        <a class="dropdown-item" href="../Candidate/csignup.php">Candidate</a>
        <a class="dropdown-item" href="../EC/signup.php">Election Commissioner</a>
      </div>
    </li>
   <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Sign in as
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../Voter/vsignin.php">Voter</a>
        <a class="dropdown-item" href="../Candidate/csignin.php">Candidate</a>
        <a class="dropdown-item" href="../EC/signin.php">Election Commissioner</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
  </ul>
</nav>
<br>