<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <link href="images/ATRBPN.png" rel="icon">
    <title>Login Sinta</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
        background-color: red;
      }
      
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">
</head>
<body class="text-center">
    <form action="login.php" method="post"class="form-signin">
    <img class="mb-4" src="images/SINTA.jpg" alt="" width="300" height="80">
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="user" class="form-control" placeholder="username" name="username" required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</body>
</html>