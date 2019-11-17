<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $roll  = mysqli_real_escape_string($db->link, $_POST['roll']);
 $name = mysqli_real_escape_string($db->link, $_POST['name']);
 $address = mysqli_real_escape_string($db->link, $_POST['address']);
 $Mobile = mysqli_real_escape_string($db->link, $_POST['Mobile']);
 if($roll == '' || $name == '' || $address == '' ||$Mobile == '' ){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO student_table(roll, name, address,Mobile) 
   Values('$roll','$name', '$address', '$Mobile')";
  $create = $db->insert($query);
 }
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
 <tr>
  <td>Roll</td>
  <td><input type="text" name="roll" placeholder="Please enter 
   name"/></td>
 </tr>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name" placeholder="Please enter 
   email"/></td>
 </tr>

 <tr>
  <td>Address</td>
  <td><input type="text" name="address" placeholder="Please enter 
  Address"/></td>
 </tr>
 <tr>
  <td>Mobile</td>
  <td><input type="text" name="Mobile" placeholder="Please enter 
  Mobile no"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="indexStudent.php">Go Back</a>
