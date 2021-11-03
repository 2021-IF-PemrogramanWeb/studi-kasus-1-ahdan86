<?php
session_start();
$_SESSION=[];
session_unset();
session_destroy();

setcookie('apahayo', '', time() - 3600);
setcookie('inihayo', '', time() - 3600);

header("Location: login.php");
?>