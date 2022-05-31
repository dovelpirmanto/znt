<html lang="en">
<head>
	

    
    <title>Login Sinta</title>

</head>
<body bgcolor="blue">
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