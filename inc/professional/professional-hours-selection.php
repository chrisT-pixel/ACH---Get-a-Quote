<?php

if(isset($_SESSION['professionalHours'])){

  if($_SESSION['professionalHours'] == "1 hour per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.professionalHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['professionalHours'] == "2 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.professionalHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['professionalHours'] == "3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.professionalHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['professionalHours'] == "more than 3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.professionalHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }



}?>
