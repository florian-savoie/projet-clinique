<?php
session_start();
session_destroy();
header("Location: aceuil.php");
exit();
?>