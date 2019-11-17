<?php include_once('header.php');?>
<?php 
//include ('student/inc/header.php'); 
include ("student/config.php");
include "student/Database.php";
include_once('dbcon.php');
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $Acc_No  = mysqli_real_escape_string($db->link, $_POST['Acc_No']);
 $Acc_name = mysqli_real_escape_string($db->link, $_POST['Acc_name']);
 $Description = mysqli_real_escape_string($db->link, $_POST['Description']);
 $Acc_type = mysqli_real_escape_string($db->link, $_POST['Acc_type']);
 $Acc_sb_type = mysqli_real_escape_string($db->link, $_POST['Acc_sb_type']);
 if($Acc_No == '' || $Acc_name == '' || $Description == '' ||$Acc_type == '' || $Acc_sb_type == ''  ){
  $error = "Field must not be Empty !!";
 } else {
 
   $sql="select * from tbl_chart_of_account where (Acc_No='$Acc_No' or Acc_name='$Acc_name');";
        $res=mysqli_query($conn,$sql);


        if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);

        if ($Acc_No==$row['Acc_No'])
        {

            $error = "Account number already exists";
        }
        elseif($Acc_name==$row['Acc_name'])
        {
           $error= "Account name already exists";
        }
        }
else{

  $query = "INSERT INTO  tbl_chart_of_account(Acc_No, Acc_name, Description,Acc_type,Acc_sb_type) 
   Values('$Acc_No','$Acc_name', '$Description', '$Acc_type', '$Acc_sb_type')";
  $create = $db->insert($query);}
 }
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>



                         <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Chart Of Account</h4>
                            <form action="Chart_of_account.php" method="post">
                               
                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Account No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Acc_No" placeholder="Please enter Account No" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Account Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Acc_name" placeholder="Please enter Account Name" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-form-label col-sm-2 pt-0">Dscription</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Description" placeholder="Please enter Dscription" required="">
                                    </div>
                                </div>
                                 <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Account Type</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_type" id="gridRadios1" value="income">
                                                <label class="form-check-label" for="gridRadios1">
                                                   Income
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_type" id="gridRadios2" value="expense">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Expense
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </fieldset>
                               
                               <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Account Sub Type</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_sb_type" id="gridRadios1" value="None">
                                                <label class="form-check-label" for="gridRadios1">
                                                   None
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Acc_sb_type" id="gridRadios2" value="Student">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Student
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







<!-- <form action="Chart_of_account.php" method="post">
<table>
 <tr>
  <td>Account No</td>
  <td><input type="text" name="Acc_No" placeholder="Please enter Account No"/></td>
 </tr><br>
 <tr>
  <td>Account Name</td>
  <td><input type="text" name="Acc_name" placeholder="Please enter Account Name"/></td>
 </tr><br>

 <tr>
  <td>Dscription</td>
  <td><input type="text" name="Description" placeholder="Please enter Dscription"/></td>
 </tr><br>
 <tr>
  <td>Account Type</td>
  <td>
  <input type="radio" name="Acc_type" value="income">Income
  <input type="radio" name="Acc_type" value="expense">Expense
  </td>
 </tr><br>

 <tr>
  <td>Account Sub Type</td>
  <td>
  <input type="radio" name="Acc_sb_type" value="None">None
  <input type="radio" name="Acc_sb_type" value="Student">Student
  <!-- <input type="radio" name="Acc_sb_type" value="Supplier">Supplier 
  <input type="radio" name="Acc_sb_type" value="Customer">Customer 
  <input type="radio" name="Acc_sb_type" value="Employee">Employee 
  <input type="radio" name="Acc_sb_type" value="Sub">Sub  -->
  <!-- </td>
 </tr><br>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  </td>
 </tr>
</table>

</form> -->
<!-- <a href="home.php">Go Back</a> -->

<?php include_once('footer1.php');?>