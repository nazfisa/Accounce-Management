<?php include_once('header.php');?>

<?php 
//include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
$conn = mysqli_connect("localhost", "root", "", "testapp");  
$sql = "SELECT id_no FROM student_info ORDER BY id_no DESC limit 1";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result);
$new_id=$row['id_no']+1;
 //print_r($new_id);
if(isset($_POST['submit'])){
 //$id_no  = mysqli_real_escape_string($db->link, $_POST['id_no']);
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
 
 if( $class_roll_no == '' || $class == '' ||$section == ''||$full_name == ''||$current_address == ''||$parmanent_address == ''||$mobile_no == ''||$father_name == ''||$mother_name == ''||$gender == '' ){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO student_info(id_no, class_roll_no, class,section,full_name,current_address,parmanent_address,mobile_no,father_name,mother_name,gender) 
   Values('$new_id','$class_roll_no', '$class', '$section', '$full_name', '$current_address', '$parmanent_address', 
   '$mobile_no', '$father_name', '$mother_name', '$gender')";
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

                        <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Student Entry</h4>
                            <form action="studentpaymentreport.php" method="post">
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Class Roll No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="class_roll_no" placeholder="Please enter Class Roll No" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Class Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="class" placeholder="Please enter Class Name" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Section Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="section" placeholder="Please enter Section Name" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="full_name" placeholder="Please enter Full Name" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Current Adderss</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="current_address" placeholder="Please enter Current Adderss" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Parmanent Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="parmanent_address" placeholder="Please enter Parmanent Address" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mobile_no" placeholder="Please enter Mobile no" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Father's Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="father_name" placeholder="Please enter Father's Name" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Mother's Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mother_name" placeholder="Please enter Mother's Name" required="">
                                    </div>
                                </div>

                                    <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Gender</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked="">
                                                <label class="form-check-label" for="gridRadios1">
                                                   Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Female
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


</form>

<!-- <form action="create.php" method="post">
<table>
 
 <tr>
  <td>Class Roll No</td>
  <td><input type="text" name="class_roll_no" placeholder="Please enter Class Roll No"/></td>
 </tr>
 <tr>
  <td>Class Name</td>
  <td><input type="text" name="class" placeholder="Please enter Class Name"/></td>
 </tr>
 <tr>
  <td>Section Name</td>
  <td><input type="text" name="section" placeholder="Please enter Section Name"/></td>
 </tr>
 <tr>
  <td>Full Name</td>
  <td><input type="text" name="full_name" placeholder="Please enter Full Name"/></td>
 </tr>
 <tr>
  <td>Current Adderss</td>
  <td><input type="text" name="current_address" placeholder="Please enter Current Adderss"/></td>
 </tr>

 <tr>
  <td>Parmanent Address</td>
  <td><input type="text" name="parmanent_address" placeholder="Please enter Parmanent Address"/></td>
 </tr>
 <tr>
  <td>Mobile</td>
  <td><input type="text" name="mobile_no" placeholder="Please enter Mobile no"/></td>
 </tr>
 <tr>
  <td>Father's Name</td>
  <td><input type="text" name="father_name" placeholder="Please enter Father's Name"/></td>
 </tr>
 <tr>
  <td>Mother's Name</td>
  <td><input type="text" name="mother_name" placeholder="Please enter Mother's Name"/></td>
 </tr>
 <tr>
  <td>Gender</td>
  <td><input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
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
</form> -->

<?php include_once('footer1.php');?>