
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
//include '../inc/header.php'; 
include "../config.php";
include "../Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
  $id_no  = mysqli_real_escape_string($db->link, $_POST['id']);
  $query = "SELECT * FROM student_info WHERE id_no=$id_no ";
  $read = $db->select($query);

  $query1 = "SELECT * FROM studentpayment WHERE id_no=$id_no ";
  $read1 = $db->select($query1);
 }

?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="studentpaymentreport.php" method="post">
<table>
<tr>
  <td>Id No</td>
  <td><input type="text" name="id" placeholder="Please enter id" > </td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>
</table>
</form>

<?php if(!empty($read1)){?>

<table class="tblone">
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td>Identity No=<?php echo $row['id_no']; ?></td>
 <td>Class Roll No=<?php echo $row['class_roll_no']; ?></td>
 </tr>
 <tr>
 <td>Class Name=<?php echo $row['class']; ?></td>
 <td>Section Name=<?php echo $row['section']; ?></td>
 </tr>
 <tr>
 <td>Name=<?php echo $row['full_name']; ?></td>
 <td>Gender=<?php echo $row['gender']; ?></td>
 </tr>
 <?php  $i++ ?>
<?php } ?>
<tr>
<td>-----------------------------------------------------------------------</td>
</tr>
<?php
$Tresult=0; 
$j=1;
while($row1 = $read1->fetch_assoc()){
?>
<tr>
 <td><?php echo $row1['Acc_name']; echo "||"; echo $row1['register_time'];?>=<?php echo $row1['amount']; ?>
<?php $Tresult+=$row1['amount']; ?>
 </td>
</tr>

<?php  $j++ ?>

<?php }?>
<tr>
<td>-----------------------------------------------------------------------</td>
</tr>

<tr>
<td>
Total Amount=<?php echo $Tresult; ?>
</td>
</tr>


<td><a href="../gen_pdf.php?
                            fromClass=<?php echo urlencode($fromClass);?>&
                            ToClass=<?php echo urlencode($ToClass);?>&
                            fromSection=<?php echo urlencode($fromSection);?>&
                            ToSection=<?php echo urlencode($ToSection);?>


                            ">PDF</a></td>



<?php ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>

</table>


<a href="index1.php">Go Back</a>
