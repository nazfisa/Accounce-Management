<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>

<html>
<head>
<title>School Management</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <a href="logout.php">Logout</a>
        <div style="width: 500px; margin: 50px auto;">
           <h3>Welcome <?php echo $_SESSION['username']; ?></h3
        </div>
    </div>
</div>
<div class="container">
	<u>
		<li>
			<a href="studentInformation/studentManagement.php">Student Information</a>
		</li>
		<li>
				<a href="Chart_of_account.php">Account Information</a>

		</li>
	</u>
</div>
</body>
</html>