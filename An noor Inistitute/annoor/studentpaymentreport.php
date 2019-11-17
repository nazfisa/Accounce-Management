<?php include_once('header.php');?>

<?php 
//include '../inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id_no = $_GET['id_no'];

 print($id_no1); 
 $db = new Database();
if(isset($_POST['submit'])){
 
  print($id_no1);
  //$id_no  = mysqli_real_escape_string($db->link, $_POST['id']);

  $query = "SELECT * FROM student_info WHERE id_no=$id_no ";
  $read = $db->select($query);

  $fromDate  = $_POST['myDateFrom'];
   $ToDate  = $_POST['myDateTo'];

  $query1 = "SELECT * FROM studentpayment WHERE register_time between '$fromDate' AND '$ToDate' AND id_no=$id_no ";
  $read1 = $db->select($query1);
 }

?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>


                        <!-- Forms-1 -->
                        <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Student Payment Info</h4>
                            <form action="studentpaymentreport.php?id_no=<?php echo $id_no;?>" method="post">
                                <!-- <div class="form-group row">
                                   <label class="col-form-label col-sm-2 pt-0">Id No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id" value="<?php echo $id_no; ?>" required="">
                                    </div>  
                                </div> -->
 
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
                                
                                
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--// Forms-1 -->








<!-- <form action="studentpaymentreport.php" method="post">
<table>
<tr>
  <td>Id No</td>
  <td><input type="text" name="id" placeholder="Please enter id" > </td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>
</table>
</form> -->


<?php if(!empty($read1)){?>



<div class="main-title-w3layouts mb-2 text-center">

                <!-- Error Page Info -->
                <div class="main-title-w3layouts mb-2 text-center">
                    
                        <?php 
                          $i=1;
                          while($row = $read->fetch_assoc()){
                          ?>
                          <tr>
                           <h3 class="text-right"><td>Identity No: <?php echo $row['id_no']; ?></td></h3>
                           <h3 class="text-right"><td>Class Roll No: <?php echo $row['class_roll_no']; ?></td></h3>
                           </tr>
                           <tr>
                           <h3 class="text-right"><td>Class Name: <?php echo $row['class']; ?></td></h3>
                           <h3 class="text-right"><td>Section Name: <?php echo $row['section']; ?></td></h3>
                           </tr>
                           <tr>
                           <h3 class="text-right"><td>Name: <?php echo $row['full_name']; ?></td></h3>
                           <h3 class="text-right"><td>Gender: <?php echo $row['gender']; ?></td></h3>
                           </tr>
                           <?php  $i++ ?>
                          <?php } ?>
                   
                </div>
                <!--// Error Page Info -->

            </div>




 <div class="blank-page-content">
                <div class="row">
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3 report">
                        <h4 class="tittle-w3-agileits mb-4">Rerport</h4>
                        <div class="widget widget-report-w3-table">
                            

                            <div class="widget-body p-15">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <?php
                                      $Tresult=0; 
                                      $j=1;
                                      while($row1 = $read1->fetch_assoc()){
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><?php echo $row1['register_time'];?> </td>
                                            <td><?php echo $row1['Acc_name'];?></td>
                                            <td><?php echo $row1['amount']; ?></td>
                                           <?php $Tresult+=$row1['amount']; ?> 
                                        </tr>
                                        
                                    </tbody>
                                    <?php  $j++ ?>

                                    <?php }?>
                                </table>
                            </div>
                            <div class="widget-header row justify-content-between mb-3">
                                <div class="col">
                                    <h3>Total Amount</h3>
                                </div>
                                <div class="col">
                                    <h3 class="text-right"><?php echo $Tresult; ?> TK</h3>
                                </div>
                            </div>



                        </div>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>
            
            <!--// Countdown -->


<?php ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>


<?php include_once('footer1.php');?>




<!-- // <?php //if(!empty($read1)){?>

// <table class="tblone">
// <?php 
// $i=1;
// while($row = $read->fetch_assoc()){
// ?>
// <tr>
//  <td>Identity No=<?php //echo $row['id_no']; ?></td>
//  <td>Class Roll No=<?php //echo $row['class_roll_no']; ?></td>
//  </tr>
//  <tr>
//  <td>Class Name=<?php //echo $row['class']; ?></td>
//  <td>Section Name=<?php //echo $row['section']; ?></td>
//  </tr>
//  <tr>
//  <td>Name=<?php //echo $row['full_name']; ?></td>
//  <td>Gender=<?php //echo $row['gender']; ?></td>
//  </tr>
//  <?php  //$i++ ?>
// <?php //} ?>
// <tr>
// <td>-----------------------------------------------------------------------</td>
// </tr>
// <?php
// $Tresult=0; 
// $j=1;
// while($row1 = $read1->fetch_assoc()){
// ?>
// <tr>
//  <td><?php //echo $row1['Acc_name']; echo "||"; echo $row1['register_time'];?>=<?php //echo $row1['amount']; ?>
// <?php //$Tresult+=$row1['amount']; ?>
//  </td>
// </tr>

// <?php  //$j++ ?>

// <?php //}?>
// <tr>
// <td>-----------------------------------------------------------------------</td>
// </tr>

// <tr>
// <td>
// Total Amount=<?php //echo $Tresult; ?>
// </td>
// </tr>


// <td><a href="../gen_pdf.php?
//                             fromClass=<?php //echo urlencode($fromClass);?>&
//                             ToClass=<?php //echo urlencode($ToClass);?>&
//                             fromSection=<?php //echo urlencode($fromSection);?>&
//                             ToSection=<?php //echo urlencode($ToSection);?>


//                             ">PDF</a></td>



// <?php ?>
// <?php //} else { ?>
// <p>Data is not available !!</p>
// <?php //} ?>

// </table> -->