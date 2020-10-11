<?php session_start();

unset($_SESSION['gardenServices']);
unset($_SESSION['otherServicesGarden']);
unset($_SESSION['gardenHours']);
unset($_SESSION['gardenHoursMore']);
unset($_SESSION['gardenFrequency']);

header("Location: https://quote.achgroup.org.au/in-the-garden?removed=true#alert");

?>
