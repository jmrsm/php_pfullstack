<?php
ini_set('session.gc_maxlifetime', 7200); // 2 horas en segundos
session_set_cookie_params(7200);
session_start();
session_destroy();
header("Location: login.php");
?>
