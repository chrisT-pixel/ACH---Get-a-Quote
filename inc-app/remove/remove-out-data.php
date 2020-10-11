<?php session_start();

unset($_SESSION['outServices']);
unset($_SESSION['otherServicesOut']);
unset($_SESSION['outHours']);
unset($_SESSION['outHoursMore']);

header("Location: https://quote.achgroup.org.au/out-and-about?removed=true#alert");

?>
