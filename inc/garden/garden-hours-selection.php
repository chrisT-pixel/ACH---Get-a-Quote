<?php

if(isset($_SESSION['gardenHours'])){

  if($_SESSION['gardenHours'] == "1 hour"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['gardenHours'] == "2 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['gardenHours'] == "3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['gardenHours'] == "more than 3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}

if(isset($_SESSION['gardenFrequency'])){

  if($_SESSION['gardenFrequency'] == "Weekly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHoursWeek').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['gardenFrequency'] == "Fortnightly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHoursFort').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['gardenFrequency'] == "Monthly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.gardenHoursMonth').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}?>
