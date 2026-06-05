<?php
$message_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new SQLite3('/var/www/html/data/zestrafit.db');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $db->prepare("INSERT INTO support_messages (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':message', $message);

    if ($stmt->execute()) {
        $message_status = "Support message sent successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>ZestraFit Support</title>
<style>
body{background:#0f172a;color:white;font-family:Arial;padding:30px;}
.card{background:#1e293b;padding:25px;border-radius:12px;max-width:600px;margin:auto;}
input,textarea{width:100%;padding:10px;margin:10px 0;}
button{background:#22c55e;color:white;border:none;padding:12px 20px;cursor:pointer;}
a{color:#38bdf8;}
</style>
</head>
<body>

<div class="card">
<h1>ZestraFit Support</h1>
<p>Send a message to the project support system.</p>

<form method="POST">
<input type="text" name="name" placeholder="Your Name" required>
<input type="email" name="email" placeholder="Your Email" required>
<textarea name="message" placeholder="Your message..." required></textarea>
<button type="submit">Send Message</button>
</form>

<p><?php echo $message_status; ?></p>
<a href="/">Back to Home</a>
</div>

</body>
</html>
