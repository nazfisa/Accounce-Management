<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:indexStudent.php');
}
?>

<html>
<head>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <a href="../../logout.php">Logout</a>
        <div style="width: 500px; margin: 50px auto;">
           <h3>Welcome <?php echo $_SESSION['username']; ?></h3
        </div>
    </div>
</div>
</body>





<?php 
//include 'inc/header.php'; 
include "../config.php";
include "../Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM student_info";
 $read = $db->select($query);
?>

<table class="tblone">
<tr>
 <th width="5%">Serial</th>
 <th width="5%">Identity No</th>
 <th width="5%">Class Roll No</th>
 <th width="5%">Class Name</th>
 <th width="5%">Section Name</th>
 <th width="10%">Full Name</th>
 <th width="15%">Current Adderss</th>
 <th width="15%">Parmanent Address</th>
 <th width="10%">Mobile</th>
 <th width="10%">Father's Name</th>
 <th width="10%">Mother's Name</th>
 <th width="5%">Gender</th>
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['id_no']; ?></td>
 <td><?php echo $row['class_roll_no']; ?></td>
 <td><?php echo $row['class']; ?></td>
 <td><?php echo $row['section']; ?></td>
 <td><?php echo $row['full_name']; ?></td>
 <td><?php echo $row['current_address']; ?></td>
 <td><?php echo $row['parmanent_address']; ?></td>
 <td><?php echo $row['mobile_no']; ?></td>
 <td><?php echo $row['father_name']; ?></td>
 <td><?php echo $row['mother_name']; ?></td>
 <td><?php echo $row['gender']; ?></td>

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<a href="index.php">Go Back</a>
<a href="../gen_pdf.php">Genenrate PDF</a>
