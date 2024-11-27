<?php
include("../config.php");
addOperationInfo($_SESSION['username'],"Logout");
session_destroy();
echo "<script>window.location.href='../login.php';</script>";
    exit;

?>




