<?php

if(isset($_SESSION['outHours'])){

  if($_SESSION['outHours'] == "1 hour per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.outHours1').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['outHours'] == "2 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.outHours2').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['outHours'] == "3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.outHours3').addClass('selected');";
    echo "});";
    echo "</script>";

  }

  if($_SESSION['outHours'] == "more than 3 hours per week"){

    echo "<script>";
    echo "$(document).ready(function(){";
    echo "$('.outHours4').addClass('selected');";
    echo "});";
    echo "</script>";

  }



}?>
