<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>


<?php include_once('header.php')?>

<div class="outer-w3-agile mt-3">
                <h4 class="tittle-w3-agileits mb-4">An-noor Institute Chattoram</h4>
                <p class="tittle-w3-agileits mb-4">Welcome to home page</p>
            </div>


<?php include_once('footer1.php')?>