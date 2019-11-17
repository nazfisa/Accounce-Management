<?php include_once('header.php');?>

<?php
//include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>
<?php 

 $id_no = $_GET['id_no'];
 $db = new Database();
 $query = "SELECT * FROM student_info WHERE id_no=$id_no";
 $row = $db->select($query)->fetch_assoc();
 //print($getData);
 ?>
 <div class="outer-w3-agile col-xl mt-3">
 	<h4 class="tittle-w3-agileits mb-4">Student Information</h4>
 	<div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">ID No</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['id_no']; ?></p>
   </div>
   </div>
 <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Class Rool No</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['class_roll_no']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Class</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['class']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Section</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['section']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Name</label>
    <div class="col-sm-10">
   <p class="form-control"><?php echo $row['full_name']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Current Address</label>
    <div class="col-sm-10">
   <p class="form-control"><?php echo $row['current_address']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Parmanent Address</label>
    <div class="col-sm-10">
   <p class="form-control"><?php echo $row['parmanent_address']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Mobile No</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['mobile_no']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Father's Name</label>
    <div class="col-sm-6">
   <p class="form-control"><?php echo $row['father_name']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Mother's Name</label>
    <div class="col-sm-6">
   <p class="form-control"><?php echo $row['mother_name']; ?></p>
   </div>
   </div>

   <div class="form-group row">
    <label class="col-form-label col-sm-2 pt-0">Gender</label>
    <div class="col-sm-3">
   <p class="form-control"><?php echo $row['gender']; ?></p>
   </div>
   </div>
<button type = "button" class = "btn btn-success"><a class="btn btn-primary" href="update.php?id_no=<?php echo urlencode($row['id_no']); ?>">Edit</a></button>
 
<?php include_once('footer1.php');?>