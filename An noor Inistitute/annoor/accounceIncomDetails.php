<?php include_once('header.php');?>
<?php 
//include '../inc/header.php'; 
include "config.php";
include "Database.php";
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



                          <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Accounce Report</h4>
                            <form action="accounceIncomDetails.php" method="post">
                               
                                 <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">From Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="myDateFrom" value="2018-11-09" required="">
                                    </div>
                                </div> 
                               

                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">To Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="myDateTo" value="<?php echo date("Y-m-d");?>" required="">
                                    </div>
                                </div>
                               

                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Account Type</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_type" id="gridRadios1" value="income">
                                                <label class="form-check-label" for="gridRadios1">
                                                   Income
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_type" id="gridRadios2" value="expense">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Expense
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </fieldset>


                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>















<!-- <form action="accounceIncomDetails.php" method="post">
<table>

<tr>
  <td>From Date</td>
  <td><input type="date" name="myDateFrom" value="2018-11-09"> </td>
 </tr>
 <tr>
  <td>To Date</td>
  <td><input type="date" name="myDateTo" value="<?php //echo date("Y-m-d");?>">  </td>
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
</form> -->
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
?>

<div class="blank-page-content">
                <div class="row">
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                        <h4 class="tittle-w3-agileits mb-4">Rerport</h4>
                        <div class="widget widget-report-w3-table">
                            

                            <div class="widget-body p-15">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                   <?php 
                                   $taccount=0;
                                    for ($i=0; $i < $x; $i++) { 
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><?php echo $Acc_Array_name[$i];?> </td>
                                            <td><?php echo $Acc_Array_amount[$i];?></td>
                                          </tr>
                                        <?php $taccount+=$Acc_Array_amount[$i];?>
                                    </tbody>
                                    
                                    <?php }?>
                                    <?php 
                                    $taccountst=0;
                                    for ($i=0; $i < $xSt; $i++) { 
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><?php echo $Acc_Array_nameSt[$i];?> </td>
                                            <td><?php echo $Acc_Array_amountSt[$i];?></td>
                                          </tr>
                                        <?php $taccountst+=$Acc_Array_amountSt[$i];?>
                                    </tbody>
                                    
                                    <?php }?>
                                </table>
                            </div>
              
                            
                            <div class="widget-header row justify-content-between mb-3">
                                <div class="col">
                                    <h3>Total Amount</h3>
                                </div>
                                <?php if ($Acc_type=="income") {?>
                                <div class="col">
                                    <h3 class="text-right"><?php echo $taccount+$taccountst; ?> TK</h3>
                                          
                                </div>
                                <?php } else {?>

                                <div class="col">
                                    <h3 class="text-right"><?php echo $taccount?> TK</h3>
                                
                                </div>
                                <?php }?>

                            </div>

                        </div>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>

<?php
}
?>













<?php
// // if ($Acc_type=="" || $fromDate=="" || $ToDate=="") {
// //   echo "field must not be empty";
// }
// else{
// for ($i=0; $i < $x; $i++) { 
//   echo $Acc_Array_name[$i];
//   echo " ";
//   echo $Acc_Array_amount[$i];
//   echo "<br>";
// }
// for ($i=0; $i < $xSt; $i++) { 
//   echo $Acc_Array_nameSt[$i];
//   echo " ";
//   echo $Acc_Array_amountSt[$i];
//   echo "<br>";
// }
// }
?>


<?php include_once('footer1.php');?>