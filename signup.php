<?php
$usersFile = 'users.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Load existing users
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    if (isset($users[$username])) {
        echo "Username already exists.";
    } else {
        $users[$username] = ['password' => $password];
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
        echo "Account created! <a href='login.php'>Login here</a>";
    }
    exit;
}
?>

<form method="POST" action="signup.php">
  <h2>Sign Up</h2>
  <input name="username" required placeholder="Username"><br>
  <input name="password" type="password" required placeholder="Password"><br>
  <button type="submit">Create Account</button>
</form>
