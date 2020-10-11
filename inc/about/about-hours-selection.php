<?php

if(isset($_SESSION['aboutHours'])){

  if($_SESSION['aboutHours'] == "1 hour"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['aboutHours'] == "2 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['aboutHours'] == "3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['aboutHours'] == "more than 3 hours"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}

if(isset($_SESSION['aboutFrequency'])){

  if($_SESSION['aboutFrequency'] == "Weekly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHoursWeek').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['aboutFrequency'] == "Fortnightly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHoursFort').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['aboutFrequency'] == "Monthly"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.aboutHoursMonth').addClass('selected');";
    echo "});";
    echo "</script>";

  }

}


?>
