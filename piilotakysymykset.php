<?php
session_start(); 



ob_start();



include("yhteys.php");
// server should keep session data for AT LEAST 1 hour
// each client should remember their session id for EXACTLY 1 hour


 // ready to go!


$db->query("update kurssit set kysakt=0 where id = '" . $_SESSION["KurssiId"] . "'");

echo "<script>window.close();</script>";
?>