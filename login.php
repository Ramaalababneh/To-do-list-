<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<div class="container">
  <div class="card">
    <h2>Login Form</h2>
    <form method='POST' action='./Process/loginPro.php'>
      <label for="username">Email</label>
      <input type="text" id="username" name='username' placeholder="Enter your Email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name='password' placeholder="Enter your password" required>

      <button type="submit" name='login'>Login</button>
    </form>
    <div class="switch">Don't have an account? <a href="#" onclick="switchCard()">Register here</a></div>
  </div>

  <div class="card" style="display: none;">
    <h2>Register Form</h2>
    <form method='POST' action='./Process/regPro.php'>
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name='fullname' placeholder="Enter your full name" required>

      <label for="email">Email</label>
      <input type="email" id="email"name='email' placeholder="Enter your email" required>

      <label for="new-password">Password</label>
      <input type="password" id="new-password" name='password' placeholder="Enter your password" required>

      <button type="submit" name="register">Register</button>
    </form>
    <div class="switch">Already have an account? <a href="#" onclick="switchCard()">Login here</a></div>
  </div>
</div>
<script src="login.js"></script>





