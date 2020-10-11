<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['gardenServices'] = array();

  $gardenService = $_POST['gardenService'];

  $i = 0;

  foreach($gardenService as $service=>$value) {

    $_SESSION['gardenServices'][] = $value;

  }

}

//Other Services
if(isset($_POST['otherServicesGarden'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesGarden'] == ''){

      unset($_SESSION['otherServicesGarden']);

    }

    else{

      $otherServicesGarden = $_POST['otherServicesGarden'];
      $_SESSION['otherServicesGarden'] = $otherServicesGarden;

    }

} else {

    unset($_SESSION['otherServicesGarden']);

}


//Extra Hours required (more than 3)
if(isset($_POST['gardenHoursMore'])){

    $gardenHoursMore = $_POST['gardenHoursMore'];

    //provide default val of 4 if session value is empty string
    if($gardenHoursMore == ""){

     $_SESSION['gardenHoursMore'] = "4";

   }

   else{

     $_SESSION['gardenHoursMore'] = $gardenHoursMore;

   }

} else {

    unset($_SESSION['gardenHoursMore']);

}


//Hours required
if(isset($_POST['gardenHours'])){

    //if value for extra hours is not needed then destroy its value
    if($_POST['gardenHours'] != "more than 3 hours"){

      unset($_SESSION['gardenHoursMore']);
      $gardenHours = $_POST['gardenHours'];
      $_SESSION['gardenHours'] = $gardenHours;

    }

    else{

      $gardenHours = $_POST['gardenHours'];
      $_SESSION['gardenHours'] = $gardenHours;

    }

} else {

    unset($_SESSION['gardenHours']);

}

//Frequency Required
if(isset($_POST['gardenFrequency'])){

    $gardenFrequency = $_POST['gardenFrequency'];

    //provide default freq of weekly if value is empty string
    if($gardenFrequency == ""){

      $_SESSION['gardenFrequency'] = "Weekly";

    }

    else{

      $_SESSION['gardenFrequency'] = $gardenFrequency;

    }

} else {

    unset($_SESSION['gardenFrequency']);

}

header("Location: https://quote.achgroup.org.au/in-the-garden?updated=true&target=alert");
?>
