

<?php 
//include '../inc/header.php'; 
include "../config.php";
include "../Database.php";
?>

<?php 
 $db = new Database();
 if (isset($_POST['submit'])) {

 $Acc_type  = mysqli_real_escape_string($db->link, $_POST['Acc_type']);

  $conn = mysqli_connect("localhost", "root", "", "testapp"); 
   $fromDate  = $_POST['myDateFrom'];
   $ToDate  = $_POST['myDateTo'];
   $query = "SELECT * FROM tblaccounce WHERE register_time between '$fromDate' AND '$ToDate' ";
   $result = mysqli_query($conn, $query);
 }
?>

<form action="accounceIncomDetails.php" method="post">
<table>

<tr>
  <td>From Date</td>
  <td><input type="date" name="myDateFrom" value="2018-11-09"> </td>
 </tr>
 <tr>
  <td>To Date</td>
  <td><input type="date" name="myDateTo" value="<?php echo date("Y-m-d");?>">  </td>
</tr>
  <tr>
  <td>Account Type </td>
  <td>
  <input type="radio" name="Acc_type" value='income'>Income
  <input type="radio" name="Acc_type" value='expense'>Expence
  </td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>

</table>
</form>
<?php

  $conn = mysqli_connect("localhost", "root", "", "testapp"); 
  $querySt = "SELECT * FROM studentpayment";
  $resultSt = mysqli_query($conn, $querySt);
  ?>


<?php if ($Acc_type=="income") {

if(isset($resultSt)){
$Acc_Array_accountSt=array();
$Acc_Array_nameSt=array();
$Acc_Array_amountSt=array();
$xSt= 0;
while ($rowSt= mysqli_fetch_array($resultSt)) {
$totalAmountSt=0;
$Acc_No1St=$rowSt['Acc_No'];
if (!in_array($Acc_No1St, $Acc_Array_accountSt)) {
  $Acc_Array_accountSt[$xSt]=$rowSt['Acc_No'];
  $Acc_Array_nameSt[$xSt]=$rowSt['Acc_name'];
$sqlSt = "SELECT * FROM studentpayment";
$result1St = mysqli_query($conn, $sqlSt);
while ($row1St= mysqli_fetch_array($result1St)) {
$totalAmountSt= $totalAmountSt+ $row1St['amount']; 
}
$Acc_Array_amountSt[$xSt]=$totalAmountSt;
$xSt++;
}
}
$totalAmountSt=0;
}}
?>


<?php 
if(isset($result)){
$Acc_Array_account=array();
$Acc_Array_name=array();
$Acc_Array_amount=array();
$x = 0;
while ($row= mysqli_fetch_array($result)) {
$totalAmount=0;
$Acc_No=$row['Acc_No'];
//$Acc_type=$row['Acc_type'];
if (!in_array($Acc_No, $Acc_Array_account) and $row['Acc_type']==$Acc_type ) {
  $Acc_Array_account[$x]=$row['Acc_No'];
  $Acc_Array_name[$x]=$row['Acc_name'];
$sql = "SELECT * FROM tblaccounce WHERE Acc_No='$Acc_No'";
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
if ($Acc_type=="" || $fromDate=="" || $ToDate=="") {
  echo "field must not be empty";
}
else{
for ($i=0; $i < $x; $i++) { 
  echo $Acc_Array_name[$i];
  echo " ";
  echo $Acc_Array_amount[$i];
  echo "<br>";
}
for ($i=0; $i < $xSt; $i++) { 
  echo $Acc_Array_nameSt[$i];
  echo " ";
  echo $Acc_Array_amountSt[$i];
  echo "<br>";
}
}
?>


