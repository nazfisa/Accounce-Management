<?php include_once('header.php');?>
<?php
include "config.php";
include "Database.php";
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



<div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Accounce</h4>
                            <form action="accounceEntry.php" method="post">
                               
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Account No</label>
                                    <div class="col-sm-10">
                                      
                                    <select class="form-control" name="Acc_No" id="exampleFormControlSelect1">
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
 
                                      }
                                      }}
                                       ?> 
                                    </select>
                                  </div>
                                </div>
                              
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Amount</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="amount" placeholder="Please enter Amount" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Register Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="register_time" value="<?php echo date("Y-m-d");?>" required="">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>


<?php include_once('footer1.php');?>
