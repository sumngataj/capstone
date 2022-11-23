<?php
session_start();

if(!$_SESSION['login_name'])
{
    header('Location: login.php');
}

?>