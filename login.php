<?php
$usersFile = 'users.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        echo "Welcome, $username!";
    } else {
        echo "Invalid login. <a href='signup.php'>Sign up?</a>";
    }
    exit;
}
?>

<form method="POST" action="login.php">
  <h2>Login</h2>
  <input name="username" required placeholder="Username"><br>
  <input name="password" type="password" required placeholder="Password"><br>
  <button type="submit">Login</button>
</form>
