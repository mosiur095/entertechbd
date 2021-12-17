<?php
session_start();
unset($_SESSION['admin_email']);
echo '<script>window.location.replace("login.php")</script>';
?>