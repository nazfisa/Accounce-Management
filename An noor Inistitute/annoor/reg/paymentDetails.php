




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
 $id_no = $_GET['id_no'];
 $db = new Database();
 $query = "SELECT * FROM studentpayment where id_no=$id_no";
 $read = $db->select($query);
?>

<table class="tblone">
<tr>	
			   <th width="10%">Serial no</th>
			   <th width="10%">id_no</th>
               <th width="10%">Acc_No</th>
               <th width="30%">Acc_name</th>
               <th width="20%">amount</th>
 
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['id_no']; ?></td>
 <td><?php echo $row['Acc_No']; ?></td>
 <td><?php echo $row['Acc_name']; ?></td>
 <td><?php echo $row['amount']; ?></td>
</tr>

<?php } ?>

<td><a href="gen_pdf.php?id_no=<?php echo urlencode($read['id_no']); ?>">Report</a></td>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>

</table>
<a href="index.php">Go Back</a><!-- 
<a href="gen_pdf.php">Genenrate PDF</a> -->



            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2018 Modernize . All Rights Reserved | Design by
                    <a href="http://w3layouts.com/"> W3layouts </a>
                </p>
            </div>
            <!--// Copyright -->
        </div>
    </div>


