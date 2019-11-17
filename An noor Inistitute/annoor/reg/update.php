<?php
//include 'inc/header.php'; 
include "../config.php";
include "../Database.php";
?>

<?php 
 $id_no = $_GET['id_no'];
 $db = new Database();
 $query = "SELECT * FROM student_info WHERE id_no=$id_no";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
 $id_no  = mysqli_real_escape_string($db->link, $_POST['id_no']);
 $class_roll_no = mysqli_real_escape_string($db->link, $_POST['class_roll_no']);
 $class = mysqli_real_escape_string($db->link, $_POST['class']);
 $section = mysqli_real_escape_string($db->link, $_POST['section']);
 $full_name  = mysqli_real_escape_string($db->link, $_POST['full_name']);
 $current_address = mysqli_real_escape_string($db->link, $_POST['current_address']);
 $parmanent_address = mysqli_real_escape_string($db->link, $_POST['parmanent_address']);
 $mobile_no = mysqli_real_escape_string($db->link, $_POST['mobile_no']);
 $father_name  = mysqli_real_escape_string($db->link, $_POST['father_name']);
 $mother_name = mysqli_real_escape_string($db->link, $_POST['mother_name']);
 $gender = mysqli_real_escape_string($db->link, $_POST['gender']);
 
 if($id_no == '' || $class_roll_no == '' || $class == '' ||$section == ''||$full_name == ''||$current_address == ''||
  $parmanent_address == ''||$mobile_no == ''||$father_name == ''||$mother_name == ''||$gender == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE student_info
  SET
  id_no = '$id_no',
  class_roll_no  = '$class_roll_no',
  class = '$class',
  section = '$section',
  full_name= '$full_name',
  current_address  = '$current_address',
  parmanent_address = '$parmanent_address',
  mobile_no = '$mobile_no',
  father_name= '$father_name',
  mother_name  = '$mother_name',
  gender = '$gender'
  WHERE id_no = $id_no";

  $update = $db->update($query);
 }
}
?>
<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM student_info WHERE id_no=$id_no";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id_no=<?php echo $id_no;?>" method="post">
<table>
 <tr>
  <td>Identity No</td>
  <td><input type="text" name="id_no" value="<?php echo $getData['id_no'] ?>"/></td>
 </tr>
 <tr>
  <td>Class Roll No</td>
  <td><input type="text" name="class_roll_no" value="<?php echo $getData['class_roll_no'] ?>"/></td>
 </tr>
 <tr>
  <td>Class Name</td>
  <td><input type="text" name="class" value="<?php echo $getData['class'] ?>"/></td>
 </tr>
 <tr>
  <td>Section Name</td>
  <td><input type="text" name="section" value="<?php echo $getData['section'] ?>"/></td>
 </tr>
 <tr>
  <td>Full Name</td>
  <td><input type="text" name="full_name" value="<?php echo $getData['full_name'] ?>"/></td>
 </tr>
 <tr>
  <td>Current Adderss</td>
  <td><input type="text" name="current_address" value="<?php echo $getData['current_address'] ?>"/></td>
 </tr>

 <tr>
  <td>Parmanent Address</td>
  <td><input type="text" name="parmanent_address" value="<?php echo $getData['parmanent_address'] ?>"/></td>
 </tr>
 <tr>
  <td>Mobile</td>
  <td><input type="text" name="mobile_no" value="<?php echo $getData['mobile_no'] ?>"/></td>
 </tr>
 <tr>
  <td>Father's Name</td>
  <td><input type="text" name="father_name" value="<?php echo $getData['father_name'] ?>"/></td>
 </tr>
 <tr>
  <td>Mother's Name</td>
  <td><input type="text" name="mother_name" value="<?php echo $getData['mother_name'] ?>"/></td>
 </tr>
 <tr>
  <td>Gender</td>
  <td>
  <input type="radio" name="gender" value="<?php echo $getData['gender'] ?>">Male
  <input type="radio" name="gender" value="<?php echo $getData['gender']  ?>">Female
  </td>
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
<a href="class.php">Go Back</a>
