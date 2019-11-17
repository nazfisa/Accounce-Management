<?php include_once('header.php');?>
<?php 
//include 'inc/header.php'; 
include ("student/config.php");
include "student/Database.php";
?>
<?php 
 $Acc_No = $_GET['Acc_No'];
 $db = new Database();
 $query = "SELECT * FROM tbl_chart_of_account WHERE Acc_No='$Acc_No' ";
 $getData = $db->select($query)->fetch_assoc();
if(isset($_POST['submit'])){
$Acc_No  = $getData['Acc_No'];
 $Acc_name = mysqli_real_escape_string($db->link, $_POST['Acc_name']);
 $Description = mysqli_real_escape_string($db->link, $_POST['Description']);
 $Acc_type = mysqli_real_escape_string($db->link, $_POST['Acc_type']);
 $Acc_sb_type = mysqli_real_escape_string($db->link, $_POST['Acc_sb_type']);
 if($Acc_No == '' || $Acc_name == '' || $Description == '' ||$Acc_type == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE tbl_chart_of_account
  SET
  Acc_No= '$Acc_No',
  Acc_name  = '$Acc_name',
  Description = '$Description',
  Acc_type = '$Acc_type',
  Acc_sb_type='$Acc_sb_type'
  WHERE Acc_No = '$Acc_No' ";

  $update = $db->update($query);
 }
}
?>
<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="chart_of_account_edit.php?Acc_No=<?php echo $Acc_No;?>" method="post">
<table>
 <tr>
  <td>Account Name</td>
  <td><input type="text" name="Acc_name" value="<?php echo $getData['Acc_name'] ?>"/></td>
 </tr><br>

 <tr>
  <td>Dscription</td>
  <td><input type="text" name="Description" value="<?php echo $getData['Description'] ?>"/></td>
 </tr><br>
 <tr>
  <td>Account Type</td>
  <td>
  <input type="radio" name="Acc_type" <?php if($getData['Acc_type'] == "income") { echo "checked"; }?>  value="income">Income
  <input type="radio" name="Acc_type" <?php if($getData['Acc_type'] == "expense") { echo "checked"; }?>  value="expense">Expense
  </td>
 </tr><br>

<!-- 
  <td>Account Sub Type</td>
  <td>
  <input type="radio" name="Acc_sb_type" <?php // if($getData['Acc_sb_type'] == "None") { echo "checked"; }?>  value="None">None
  <input type="radio" name="Acc_sb_type" <?php //if($getData['Acc_sb_type'] == "Student") { echo "checked"; }?>  value="Student">Student
   <input type="radio" name="Acc_sb_type" value="Supplier">Supplier 
  <input type="radio" name="Acc_sb_type" value="Customer">Customer 
  <input type="radio" name="Acc_sb_type" value="Employee">Employee 
  <input type="radio" name="Acc_sb_type" value="Sub">Sub  
  </td>
 </tr><br>  -->
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  
  </td>
 </tr>
</table>

</form>

<!-- <a href="indexStudent.php">Go Back</a> -->

<?php include_once('footer1.php');?>