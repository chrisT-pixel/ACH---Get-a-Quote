<?php session_start();

unset($_SESSION['professionalServices']);
unset($_SESSION['otherServicesProfessional']);
unset($_SESSION['professionalHours']);
unset($_SESSION['professionalHoursMore']);

header("Location: https://quote.achgroup.org.au/professional-advice?removed=true#alert");

?>
