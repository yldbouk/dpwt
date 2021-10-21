<?php
session_start();
if (isset($_SESSION['userName'])) 
  header("Location: console.php");
else
  header("Location: /acc/login/");
