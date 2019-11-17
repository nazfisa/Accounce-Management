




<?php 
//include '../inc/header.php'; 
include "../config.php";
include "../Database.php";
?>

<?php 
 $db = new Database();
 if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "testapp"); 
	 $fromDate  = $_POST['myDateFrom'];
	 $ToDate  = $_POST['myDateTo'];
 	 $query = "SELECT * FROM studentpayment  WHERE register_time between '$fromDate' AND '$ToDate' ";
   $result = mysqli_query($conn, $query);
 }
?>

<form action="allpaymentreport.php" method="post">
<table>

<tr>
  <td>From Date</td>
  <td><input type="date" name="myDateFrom" value="2018-11-09"> </td>
 </tr>
 
<tr>
  <td>To Date</td>
  <td><input type="date" name="myDateTo" value="<?php echo date("Y-m-d");?>">  </td>
 </tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>
</table>
</form>

<?php 
if(isset($result)){
$Acc_Array_account=array();
$Acc_Array_name=array();
$Acc_Array_amount=array();
$x = 0;
while ($row= mysqli_fetch_array($result)) {
$totalAmount=0;
$Acc_No=$row['Acc_No'];
if (!in_array($Acc_No, $Acc_Array_account)) {
  $Acc_Array_account[$x]=$row['Acc_No'];
  $Acc_Array_name[$x]=$row['Acc_name'];
$sql = "SELECT * FROM studentpayment WHERE Acc_No='$Acc_No'";
$result1 = mysqli_query($conn, $sql);
while ($row1= mysqli_fetch_array($result1)) {
$totalAmount= $totalAmount+ $row1['amount']; 
}
$Acc_Array_amount[$x]=$totalAmount;
$x++;
}
}
$totalAmount=0;
}
?>
<?php

for ($i=0; $i < $x; $i++) { 
  echo $Acc_Array_account[$i];
  echo " ";
  echo $Acc_Array_name[$i];
  echo " ";
  echo $Acc_Array_amount[$i];
  echo "<br>";
}

?>

