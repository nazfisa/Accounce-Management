
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
 $query = "SELECT id_no FROM student_info WHERE id_no=$id_no";
 $getData = $db->select($query)->fetch_assoc();
 //print($getData);
 
 

if(isset($_POST['submit'])){
  
  
  $id_no  = mysqli_real_escape_string($db->link, $_POST['id_no']);
  $Acc_No = mysqli_real_escape_string($db->link, $_POST['Acc_No']);

  
$conn1 = mysqli_connect("localhost", "root", "", "testapp");  
$sql1 = "SELECT * FROM tbl_chart_of_account where Acc_No='$Acc_No'";
$result1 = mysqli_query($conn1,$sql1);
$row= mysqli_fetch_array($result1);
$Acc_name=$row['Acc_name'];

  $amount = mysqli_real_escape_string($db->link, $_POST['amount']);
  $register_time  = $_POST['register_time'];

  //echo substr($register_time, 5,2);
  $query = "INSERT INTO studentpayment(id_no, Acc_No,register_time,amount,Acc_name) Values('$id_no',
  '$Acc_No','$register_time','$amount','$Acc_name')";
  $create = $db->insert($query);

 }

?>


<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="studentPaymentInfo.php?id_no=<?php echo $id_no;?>" method="post">
<table>
 <tr>
  <td>Identity No</td>
  <td><input type="text" name="id_no" value="<?php echo $getData['id_no'] ?>"/></td>
 </tr>
 <tr>
  <td>Account No</td>
  <td>
 <select name="Acc_No">
 <?php 
  $conn = mysqli_connect("localhost", "root", "", "testapp");  
  $sql = "SELECT * FROM tbl_chart_of_account";
  $result = mysqli_query($conn, $sql);
while ($row= mysqli_fetch_array($result)) {
  if ($row['Acc_sb_type']=='Student') {
    
 ?> 
 <option value="<?php echo $row['Acc_No']; ?>"><?php echo $row['Acc_No'];echo " || "; echo $row['Acc_name'];?></option>

<?php 
 
}
}
 ?> 
 
</select> 
</td>
</tr>

<tr>
  <td>Amount</td>
  <td><input type="text" name="amount" placeholder="Please enter Amount"/></td>
 </tr>

<tr>
  <td>Register Date</td>
  <td><input type="date" name="register_time" placeholder="Please enter Register Date" value="2018-12-09" ></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  </td>
 </tr>

</table>
</form>






<td><a href="paymentDetails.php?id_no=<?php echo urlencode($getData['id_no']); ?>">Report</a></td>
<a href="class.php">Go Back</a>
