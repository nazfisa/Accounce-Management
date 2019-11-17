<?php include_once('header.php');?>

<?php 
//include '../inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 // $class  = mysqli_real_escape_string($db->link, $_POST['class']);
 // $section  = mysqli_real_escape_string($db->link, $_POST['section']);
 //  //$query = "SELECT * FROM student_info WHERE class=$class and section='$section' ";
  $fromClass  = mysqli_real_escape_string($db->link, $_POST['fromClass']);
  $ToClass  = mysqli_real_escape_string($db->link, $_POST['ToClass']);
  $fromSection  = mysqli_real_escape_string($db->link, $_POST['fromSection']);
  $ToSection  = mysqli_real_escape_string($db->link, $_POST['ToSection']);



  $query = "SELECT * FROM student_info WHERE class between $fromClass and $ToClass and section between '$fromSection' and '$ToSection' ";
  $read = $db->select($query);
 }

?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>



                        <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Class Info</h4>
                            <form action="class.php" method="post">
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">From Class</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fromClass" placeholder="Please enter From Class" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">To Class</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ToClass" placeholder="Please enter To Class" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">From Section</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fromSection" placeholder="Please enter From Section" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">To Section</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ToSection" placeholder="Please enter To Section" required="">
                                    </div>
                                </div>
                           
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>












<!-- <form action="class.php" method="post">
<table>

<tr>
  <td>From Class</td>
  <td><input type="text" name="fromClass" placeholder="Please enter From Class" > </td>
 </tr>
 
<tr>
  <td>To Class</td>
  <td><input type="text" name="ToClass" placeholder="Please enter To Class" > </td>
 </tr>

<tr>
  <td>From Section</td>
  <td><input type="text" name="fromSection" placeholder="Please enter From Section" > </td>
 </tr>
 
<tr>
  <td>To Section</td>
  <td><input type="text" name="ToSection" placeholder="Please enter To Section" > </td>
 </tr>



 <tr>
  <td>Class</td>
  <td>
  <input type="radio" name="class" value='1'>1
  <input type="radio" name="class" value='2'>2
  <input type="radio" name="class" value='1'>3
  <input type="radio" name="class" value='1'>4
  <input type="radio" name="class" value='1'>5
  </td>
 </tr>
 <tr>
  <td>Section</td>
  <td>
  <input type="radio" name="section" value='A'>A
  <input type="radio" name="section" value='B'>B
  <input type="radio" name="section" value='C'>C
  <input type="radio" name="section" value='D'>D

  </td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>
</table>
</form>
 -->

<?php if(isset($read)){?>

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
                                            <th>Identity No</th>
                                            <th>Class Roll No</th>
                                            <th>Class Name</th>
                                            <th>Section Name</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                   <?php 
                                    $i=1;
                                    while($row = $read->fetch_assoc()){
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><a class="btn btn-info" href="studentdetails.php?id_no=<?php echo urlencode($row['id_no']); ?>"><?php echo $row['id_no'];?></a> </td>
                                            <td><?php echo $row['class_roll_no'];?></td>
                                            <td><?php echo $row['class']; ?></td>
                                            <td><?php echo $row['section']; ?></td>
                                            <td><?php echo $row['full_name']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                           <td><a class="btn btn-primary" href="studentPaymentInfo.php?id_no=<?php echo urlencode($row['id_no']); ?>">Payment</a></td>
                                          <td><a class="btn btn-primary" href="studentPaymentreport.php?id_no=<?php echo urlencode($row['id_no']); ?>">Payment Info</a></td>
                                         </tr>
                                        
                                    </tbody>
                                    <?php  $j++ ?>

                                    <?php }?>
                                </table>
                            </div>
              


                        </div>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>

<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>




<!-- 
<?php //if(isset($read)){?>

<table class="tblone">
<tr>
 <th width="10%">Serial</th>
 <th width="10%">Identity No</th>
 <th width="10%">Class Roll No</th>
 <th width="10%">Class Name</th>
 <th width="10%">Section Name</th>
 <th width="30%">Full Name</th>
 <!-- <th width="15%">Current Adderss</th>
 <th width="15%">Parmanent Address</th>
 <th width="10%">Mobile</th>
 <th width="10%">Father's Name</th>
 <th width="10%">Mother's Name</th> -->
 <!-- <th width="5%">Gender</th>
</tr> -->
<?php 
//$i=1;
// while($row = $read->fetch_assoc()){
?>
<!-- <tr>
 <td><?php //echo $i++ ?></td>
 <td><?php //echo $row['id_no']; ?></td>
 <td><?php //echo $row['class_roll_no']; ?></td>
 <td><?php //echo $row['class']; ?></td>
 <td><?php //echo $row['section']; ?></td>
 <td><?php //echo $row['full_name']; ?></td> -->
 <!-- <td><?php //echo $row['current_address']; ?></td>
 <td><?php //echo $row['parmanent_address']; ?></td>
 <td><?php //echo $row['mobile_no']; ?></td>
 <td><?php //echo $row['father_name']; ?></td>
 <td><?php //echo $row['mother_name']; ?></td> -->
<!--  <td><?php //echo $row['gender']; ?></td> -->
 

<!-- <td><a href="studentPaymentInfo.php?id_no=<?php //echo urlencode($row['id_no']); ?>">Payment</a></td>
<td><a href="update.php?id_no=<?php //echo urlencode($row['id_no']); ?>">Edit</a></td>

</tr>


<?php //} ?>

<td><a href="../gen_pdf.php?fromClass=<?php //echo urlencode($fromClass);?>&
                            ToClass=<?php //echo urlencode($ToClass);?>&
                            fromSection=<?php //echo urlencode($fromSection);?>&
                            ToSection=<?php //echo urlencode($ToSection);?>
                            ">PDF</a></td>
 -->


<?php ?>
<?php //} else { ?>
<!-- <p>Data is not available !!</p>
<?php //} ?>
 -->
<!-- </table>
 --> 

<?php include_once('footer1.php');?>
