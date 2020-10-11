<?php

if(isset($_SESSION['houseHours'])){

  if($_SESSION['houseHours'] == "1 hour"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['houseHours'] == "2 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['houseHours'] == "3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['houseHours'] == "more than 3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}

if(isset($_SESSION['houseFrequency'])){

  if($_SESSION['houseFrequency'] == "Weekly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHoursWeek').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['houseFrequency'] == "Fortnightly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHoursFort').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['houseFrequency'] == "Monthly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.houseHoursMonth').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}

?>
