<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new SQLite3('/var/www/html/data/zestrafit.db');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    if ($stmt->execute()) {
        $message = "Account created successfully!";
    } else {
        $message = "Email already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register - ZestraFit</title>
</head>
<body>
<h2>Create Account</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
</form>

<p><?php echo $message; ?></p>
<a href="login.php">Login</a>
</body>
</html>
