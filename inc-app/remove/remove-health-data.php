<?php session_start();

unset($_SESSION['healthServices']);
unset($_SESSION['otherServicesHealth']);
unset($_SESSION['healthHours']);
unset($_SESSION['healthHoursMore']);


header("Location: https://quote.achgroup.org.au/my-health?removed=true#alert");

?>
