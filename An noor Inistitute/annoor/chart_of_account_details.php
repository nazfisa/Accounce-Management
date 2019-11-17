<?php include_once('header.php');?>
<?php 
//include "../header.html"; 
include ("student/config.php");
include "student/Database.php";
// include_once('../header.html');
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM tbl_chart_of_account";
 $read = $db->select($query);
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
                                            <th>Account No</th>
                                            <th>Account name</th>
                                            <th>Description</th>
                                            <th>Account Type</th>
                                            <th>Account Sub Type</th>
                                            
                                        </tr>
                                    </thead>
                                   <?php 
                                   if($read){
                                   
                                    while($row = $read->fetch_assoc()){
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><?php echo $row['Acc_No'];;?> </td>
                                            <td><?php echo $row['Acc_name'];?></td>
                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Acc_type']; ?></td>
                                            <td><?php echo $row['Acc_sb_type']; ?></td>
                                      
                                           <td><a class="btn btn-primary" href="chart_of_account_edit.php?Acc_No=<?php echo urlencode($row['Acc_No']); ?>">Edit</a></td>
                                          
                                        </tr>
                                        
                                    </tbody>
                                   <?php } ?>
									<?php } else { ?>
									<p>Data is not available !!</p>
									<?php } ?>
                                </table>
                            </div>
              


                        </div>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>






<!-- 
<table class="tblone">
<tr>
 <th width="5%">Serial</th>
 <th width="10%">Account NO</th>
 <th width="15%">Account name</th>
 <th width="30%">Description</th>
 <th width="10%">Account Type</th>
 <th width="10%">Account Type</th>
</tr>
<?php //if($read){?>
<?php 
//$i=1;
//while($row = $read->fetch_assoc()){
?>
<tr>
 <td width="5%"><?php //echo $i++ ?></td>
 <td width="10%"><?php //echo $row['Acc_No']; ?></td>
 <td width="15%"><?php //echo $row['Acc_name']; ?></td>
 <td width="30%"><?php //echo $row['Description']; ?></td>
 <td width="10%"><?php //echo $row['Acc_type']; ?></td>
 <td width="10%"><?php //echo $row['Acc_sb_type']; ?></td>

 <td><a href="chart_of_account_edit.php?Acc_No=<?php //echo urlencode($row['Acc_No']); ?>">
  Edit</a></td>
</tr>


<?php// } ?>
<?php// } //else { ?>
<p>Data is not available !!</p>
<?php //} ?>
</table> -->

<?php include_once('footer1.php');?>
  