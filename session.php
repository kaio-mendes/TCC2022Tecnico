<?php
if (!isset ($_SESSION)){
    session_start();
}
if(!isset($_SESSION['ID'])){
    header ("location:login.php");
}