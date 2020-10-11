<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['healthServices'] = array();

  $healthService = $_POST['healthService'];

  $i = 0;

  foreach($healthService as $service=>$value) {

    $_SESSION['healthServices'][] = $value;

  }


}

//Other Services
if(isset($_POST['otherServicesHealth'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesHealth'] == ''){

      unset($_SESSION['otherServicesHealth']);

    }

    else{

      $otherServicesHealth = $_POST['otherServicesHealth'];
      $_SESSION['otherServicesHealth'] = $otherServicesHealth;

    }

} else {

    unset($_SESSION['otherServicesHealth']);

}


//Extra Hours required (more than 3)
if(isset($_POST['healthHoursMore'])){

    $healthHoursMore = $_POST['healthHoursMore'];
    $_SESSION['healthHoursMore'] = $healthHoursMore;

} else {

    unset($_SESSION['healthHoursMore']);

}


//Hours required
if(isset($_POST['healthHours'])){

    //if value for extra hours is not needed then destroy its value
    if($_POST['healthHours'] != "more than 3 hours per week"){

      unset($_SESSION['healthHoursMore']);
      $healthHours = $_POST['healthHours'];
      $_SESSION['healthHours'] = $healthHours;

    }

    else{

      $healthHours = $_POST['healthHours'];
      $_SESSION['healthHours'] = $healthHours;

    }

} else {

    unset($_SESSION['healthHours']);

}

header("Location: https://quote.achgroup.org.au/my-health?updated=true#alert");
?>
