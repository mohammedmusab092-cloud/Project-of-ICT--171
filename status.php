<?php
$server_time = date("Y-m-d H:i:s");
$php_version = phpversion();
$disk_free = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
$disk_total = round(disk_total_space("/") / 1024 / 1024 / 1024, 2);
$uptime = shell_exec("uptime -p");
$hostname = gethostname();
?>

<!DOCTYPE html>
<html>
<head>
<title>ZestraFit Server Status</title>
<style>
body{background:#0f172a;color:white;font-family:Arial;padding:30px;}
.card{background:#1e293b;padding:25px;border-radius:12px;max-width:700px;margin:20px auto;}
h1{color:#38bdf8;}
p{font-size:18px;}
a{color:#22c55e;}
</style>
</head>
<body>

<div class="card">
<h1>Server Status Dashboard</h1>
<p><strong>Project:</strong> ZestraFit</p>
<p><strong>Server:</strong> Azure Linux VM</p>
<p><strong>Web Server:</strong> Nginx</p>
<p><strong>Hostname:</strong> <?php echo $hostname; ?></p>
<p><strong>PHP Version:</strong> <?php echo $php_version; ?></p>
<p><strong>Server Time:</strong> <?php echo $server_time; ?></p>
<p><strong>Uptime:</strong> <?php echo $uptime; ?></p>
<p><strong>Disk Space:</strong> <?php echo $disk_free; ?> GB free / <?php echo $disk_total; ?> GB total</p>
<p><strong>Status:</strong> Online</p>

<a href="/">Back to Home</a>
</div>

</body>
</html>
