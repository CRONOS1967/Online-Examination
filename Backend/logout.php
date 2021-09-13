<?php
session_start();
include 'Backend.php';
 $cobj = new Backend;
 $cobj->logout();
 header('location:../public/login.php');