<?php
session_start();
unset($_SESSION['user_email']);
echo '<script>window.location.replace("customer_login.php")</script>';
?>