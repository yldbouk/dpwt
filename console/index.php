<?php
session_start();
if (isset($_SESSION['userUid'])) {
  if (isset($_SESSION['name'])) {
    header("Location: console.php");
  } else {
    header("Location: selectprinter.php");
}} else {
  header("Location: /acc/login/");;
}
