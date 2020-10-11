<?php session_start();

unset($_SESSION['houseServices']);
unset($_SESSION['otherServicesHouse']);
unset($_SESSION['houseHours']);
unset($_SESSION['houseHoursMore']);
unset($_SESSION['houseFrequency']);

header("Location: https://quote.achgroup.org.au/help-around-the-house?removed=true#alert");

?>
