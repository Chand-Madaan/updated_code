<?php
session_start();
session_unset();
session_destroy();
header('location:adminlogin.php?err='.urlencode('You Have Logged Out Succesfully'));
exit();
?>