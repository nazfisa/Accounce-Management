
<html>
<head>

<?php include_once('header.php');?>

<?php
//include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 

 $id_no = $_GET['id_no'];
 $db = new Database();
 $query = "SELECT id_no FROM student_info WHERE id_no=$id_no";
 $getData = $db->select($query)->fetch_assoc();
 //print($getData);
 
 

if(isset($_POST['submit'])){
  
  
  //$id_no  = mysqli_real_escape_string($db->link, $_POST['id_no']);
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

  <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Student Payment</h4>
                            <form action="studentPaymentInfo.php?id_no=<?php echo $id_no;?>" method="post">
                               
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Account No</label>
                                    <div class="col-sm-10">
                                      
                                    <select class="form-control" name="Acc_No" id="exampleFormControlSelect1">
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





<!-- <form action="studentPaymentInfo.php?id_no=<?php //echo $id_no;?>" method="post">
<table>
 <tr>
  <td>Account No</td>
  <td>
 <select name="Acc_No">
 <?php 
  //$conn = mysqli_connect("localhost", "root", "", "testapp");  
  //$sql = "SELECT * FROM tbl_chart_of_account";
  //$result = mysqli_query($conn, $sql);
//while ($row= mysqli_fetch_array($result)) {
  //if ($row['Acc_sb_type']=='Student') {
    
 ?> 
 <option value="<?php //echo $row['Acc_No']; ?>"><?php //echo $row['Acc_No'];echo " || "; echo $row['Acc_name'];?></option>

<?php 
 
//}
//}
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
 -->





<td><a href="paymentDetails.php?id_no=<?php echo urlencode($getData['id_no']); ?>">Report</a></td>
<a href="class.php">Go Back</a>
<?php include_once('footer1.php');?>