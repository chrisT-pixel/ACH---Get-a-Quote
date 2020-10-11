<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['houseServices'] = array();

  $houseService = $_POST['houseService'];

  $i = 0;

  foreach($houseService as $service=>$value) {

    $_SESSION['houseServices'][] = $value;

  }


}

//Other Services
if(isset($_POST['otherServicesHouse'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesHouse'] == ''){

      unset($_SESSION['otherServicesHouse']);

    }

    else{

      $otherServicesHouse = $_POST['otherServicesHouse'];
      $_SESSION['otherServicesHouse'] = $otherServicesHouse;

    }

} else {

    unset($_SESSION['otherServicesHouse']);

}


//Extra Hours required (more than 3)
if(isset($_POST['houseHoursMore'])){

    $houseHoursMore = $_POST['houseHoursMore'];

    //provide default val of 4 if session value is empty string
    if($houseHoursMore == ""){

      $_SESSION['houseHoursMore'] = "4";

    }

    else{

      $_SESSION['houseHoursMore'] = $houseHoursMore;

    }

} else {

    unset($_SESSION['houseHoursMore']);

}


//Hours required
if(isset($_POST['houseHours'])){

    //if value for extra hours is not needed then destroy its value
    if($_POST['houseHours'] != "more than 3 hours"){

      unset($_SESSION['houseHoursMore']);
      $houseHours = $_POST['houseHours'];
      $_SESSION['houseHours'] = $houseHours;

    }

    else{

      $houseHours = $_POST['houseHours'];
      $_SESSION['houseHours'] = $houseHours;

    }

} else {

    unset($_SESSION['houseHours']);

}

//Frequency Required
if(isset($_POST['houseFrequency'])){

    $houseFrequency = $_POST['houseFrequency'];

    //provide default freq of weekly if value is empty string
    if($houseFrequency == ""){

      $_SESSION['houseFrequency'] = "Weekly";

    }

    else{

      $_SESSION['houseFrequency'] = $houseFrequency;

    }

} else {

    unset($_SESSION['houseFrequency']);

}

header("Location: https://quote.achgroup.org.au/help-around-the-house?updated=true&target=alert");
?>
