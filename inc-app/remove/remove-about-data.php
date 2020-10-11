<?php session_start();

unset($_SESSION['aboutServices']);
unset($_SESSION['otherServicesAbout']);
unset($_SESSION['aboutHours']);
unset($_SESSION['aboutHoursMore']);
unset($_SESSION['aboutFrequency']);

header("Location: https://quote.achgroup.org.au/about-me?removed=true#alert");

?>
