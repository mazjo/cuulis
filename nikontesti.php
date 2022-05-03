<?php

session_start();
start:
if (isset($_SESSION['started'])) {
    //$session_started_date = date('d.m.Y H:i:s', $_SESSION['started']);


    $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
    $date->setTimestamp($_SESSION['started']);
    $session_started = $date->format('d.m.Y H:i:s');
    echo "Session started: $session_started<br/>";

    $now = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
    $diff = $now->diff($date);
    echo "Session started: " . $diff->h . "h " . $diff->i . "m " . $diff->s . "s  ago<br/>";
    echo "<br/>session.gc_maxlifetime = " . ini_get('session.gc_maxlifetime');
    echo "<br/>session.save_handler = " . ini_get('session.save_handler');
    echo "<br/>session.save_path = " . ini_get('session.save_path');
	echo "<pre>";
	print_r($_SESSION);
} else {
    $_SESSION['started'] = time();
    goto start;
}
?>
