<?php
    require_once "../config.php";
    session_start();
    session_unset();
    session_destroy();
    header("location: ../register.php");
?>