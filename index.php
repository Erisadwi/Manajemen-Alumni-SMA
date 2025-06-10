<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi</title>
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

    .register-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      color: #444;
      font-weight: 500;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #8B4513;
      box-shadow: 0 0 5px rgba(255, 214, 176, 0.5);
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

    .login-link {
      margin-top: 20px;
      font-size: 14px;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Registrasi Akun</h2>
    <form action="proses_register.php" method="POST">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <select name="role" required>
          <option value="admin">Admin</option>
          <option value="alumni">Alumni</option>
        </select>
      </div>
      <button type="submit">Daftar</button>
    </form>
    <div class="login-link">
      Sudah punya akun? <a href="form_login.php">Login di sini</a>
    </div>
  </div>
</body>
</html>
