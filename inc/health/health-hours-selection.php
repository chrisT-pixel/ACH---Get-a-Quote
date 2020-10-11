<?php

if(isset($_SESSION['healthHours'])){

  if($_SESSION['healthHours'] == "1 hour per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.healthHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['healthHours'] == "2 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.healthHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['healthHours'] == "3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.healthHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['healthHours'] == "more than 3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.healthHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }



}?>
