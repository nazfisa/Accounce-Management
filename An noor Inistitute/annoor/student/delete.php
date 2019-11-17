<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM tbl_user WHERE id=$id";
 $deleteData = $db->delete($query);
}
?>