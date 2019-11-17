
<?php
include "../config.php";
include "../Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
  $Acc_No = mysqli_real_escape_string($db->link, $_POST['Acc_No']);
$conn1 = mysqli_connect("localhost", "root", "", "testapp");  
$sql1 = "SELECT * FROM tbl_chart_of_account where Acc_No='$Acc_No'";
$result1 = mysqli_query($conn1,$sql1);
$row= mysqli_fetch_array($result1);
$Acc_name=$row['Acc_name'];
$Acc_type=$row['Acc_type'];
  $amount = mysqli_real_escape_string($db->link, $_POST['amount']);
  $register_time  = $_POST['register_time'];

  //echo substr($register_time, 5,2);
  $query = "INSERT INTO tblaccounce (Acc_No,Acc_name,amount,register_time,Acc_type)
   Values
  ('$Acc_No','$Acc_name','$amount','$register_time','$Acc_type')";
  $create = $db->insert($query);

 }

?>

<?php

  $conn = mysqli_connect("localhost", "root", "", "testapp"); 
  $querySt = "SELECT * FROM studentpayment";
  $resultSt = mysqli_query($conn, $querySt);
  ?>


<?php 
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
$sqlSt = "SELECT * FROM studentpayment WHERE Acc_No='$Acc_No1'";
$result1St = mysqli_query($conn, $sqlSt);
while ($row1St= mysqli_fetch_array($result1St)) {
$totalAmountSt= $totalAmountSt+ $row1St['amount']; 
}
$Acc_Array_amountSt[$xSt]=$totalAmountSt;
$xSt++;
}
}
$totalAmountSt=0;
}
?>









<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="accounceEntry.php" method="post">
<table>
 <tr>
  <td>Account No</td>
  <td>
 <select name="Acc_No">
 <?php 
  $conn = mysqli_connect("localhost", "root", "", "testapp");  
  $sql = "SELECT * FROM tbl_chart_of_account";
  $result = mysqli_query($conn, $sql);
while ($row= mysqli_fetch_array($result)) {
$Account_no=$row['Acc_No'];
if (!in_array($Account_no, $Acc_Array_account)) {
  if ($row['Acc_sb_type']!='Student'){
 ?> 
 <option value="<?php echo $row['Acc_No']; ?>"><?php echo $row['Acc_No'];echo " || "; echo $row['Acc_name'];?></option>

<?php 
 
}}}

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


