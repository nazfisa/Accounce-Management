<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM student_table";
 $read = $db->select($query);
?>

<table class="tblone">
<tr>
 <th width="10%">Serial</th>
 <th width="10%">Roll</th>
 <th width="25%">Name</th>
 <th width="35%">Address</th>
 <th width="20%">Mobile</th>
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['roll']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['address']; ?></td>
 <td><?php echo $row['Mobile']; ?></td>
 <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">
  Edit</a></td>
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<a href="create.php">Create</a>
<a href="gen_pdf.php">Genenrate PDF</a>
