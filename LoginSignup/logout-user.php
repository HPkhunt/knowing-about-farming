<?php
session_start();
session_unset();
session_destroy();
header('location: /knowingaboutfarming\Pages\LoginSignup\login-user.php');
?>