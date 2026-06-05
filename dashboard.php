<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db = new SQLite3('/var/www/html/data/zestrafit.db');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $log_type = $_POST['log_type'];
    $log_text = $_POST['log_text'];

    $stmt = $db->prepare("INSERT INTO logs (user_id, log_type, log_text) VALUES (:user_id, :log_type, :log_text)");
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->bindValue(':log_type', $log_type);
    $stmt->bindValue(':log_text', $log_text);

    if ($stmt->execute()) {
        $message = "Log added successfully!";
    }
}

$stmt = $db->prepare("SELECT * FROM logs WHERE user_id = :user_id ORDER BY id DESC");
$stmt->bindValue(':user_id', $_SESSION['user_id']);

$result = $stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
<title>ZestraFit Dashboard</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#0f172a;
    color:white;
    margin:0;
    padding:20px;
}

.container{
    max-width:900px;
    margin:auto;
}

.card{
    background:#1e293b;
    padding:20px;
    border-radius:12px;
    margin-bottom:20px;
}

input,textarea,select{
    width:100%;
    padding:10px;
    margin-top:10px;
    margin-bottom:10px;
}

button{
    background:#22c55e;
    color:white;
    border:none;
    padding:10px 20px;
    cursor:pointer;
}

.log{
    border-bottom:1px solid #334155;
    padding:10px 0;
}

a{
    color:#38bdf8;
}
</style>

</head>

<body>

<div class="container">

<div class="card">
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> 👋</h1>
<p>ZestraFit Fitness Dashboard</p>
<a href="logout.php">Logout</a>
</div>

<div class="card">

<h2>Add Fitness Log</h2>

<form method="POST">

<select name="log_type" required>
<option value="Workout">Workout</option>
<option value="Water Intake">Water Intake</option>
<option value="BMI">BMI</option>
<option value="Steps">Steps</option>
</select>

<textarea name="log_text" required placeholder="Example: Chest workout completed, 2L water, BMI 22.5, 8000 steps"></textarea>

<button type="submit">Save Log</button>

</form>

<p><?php echo $message; ?></p>

</div>

<div class="card">

<h2>Your Fitness Logs</h2>

<?php
while($row = $result->fetchArray(SQLITE3_ASSOC)){
    echo "<div class='log'>";
    echo "<strong>" . htmlspecialchars($row['log_type']) . "</strong><br>";
    echo htmlspecialchars($row['log_text']);
    echo "</div>";
}
?>

</div>

</div>

</body>
</html>
