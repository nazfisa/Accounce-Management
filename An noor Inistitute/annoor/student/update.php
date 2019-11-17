<?php
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM student_table WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
$roll  = mysqli_real_escape_string($db->link, $_POST['roll']);
 $name = mysqli_real_escape_string($db->link, $_POST['name']);
 $address = mysqli_real_escape_string($db->link, $_POST['address']);
 $Mobile = mysqli_real_escape_string($db->link, $_POST['Mobile']);
 if($roll == '' || $name == '' || $address == '' ||$Mobile == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE student_table
  SET
  roll= '$roll',
  name  = '$name',
  address = '$address',
  Mobile = '$Mobile'
  WHERE id = $id";

  $update = $db->update($query);
 }
}
?>
<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM student_table WHERE id=$id";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td>Roll</td>
  <td><input type="text" name="roll" 
  value="<?php echo $getData['roll'] ?>"/></td>
 </tr>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name"
  value="<?php echo $getData['name'] ?>"/></td>
 </tr>

 <tr>
  <td>Address</td>
  <td><input type="text" name="address" 
  value="<?php echo $getData['address'] ?>"/></td>
 </tr>
 <tr>
  <td>Mobile</td>
  <td><input type="text" name="Mobile" 
  value="<?php echo $getData['Mobile'] ?>"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  <input type="submit" name="delete" Value="Delete" />
  </td>
 </tr>

</table>
</form>
<a href="indexStudent.php">Go Back</a>
