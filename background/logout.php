<?php
session_start();
unset($_SESSION['user']);
header("Location: ../View/pfe.php");
exit();
