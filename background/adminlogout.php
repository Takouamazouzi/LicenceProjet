<?php
session_start();
unset($_SESSION['admin']);


header("Location: ../View/adminLogin.html");
exit();