<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(to right, #8B4513,rgb(235, 220, 186));
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 40px 12px 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
    }

    .form-group input:focus {
      border-color: #8B4513;
      box-shadow: 0 0 5px rgb(235, 220, 186);
    }

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background-color: #8B4513;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #8B4513;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="proses_login.php" method="post">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" id="password" required />
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
    }
  </script>
</body>
</html>
