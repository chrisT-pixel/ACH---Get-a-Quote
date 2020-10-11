<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['aboutServices'] = array();

  $aboutService = $_POST['aboutService'];

  $i = 0;

  foreach($aboutService as $service=>$value) {

    $_SESSION['aboutServices'][] = $value;

  }


}

//Other Services
if(isset($_POST['otherServicesAbout'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesAbout'] == ''){

      unset($_SESSION['otherServicesAbout']);

    }

    else{

      $otherServicesAbout = $_POST['otherServicesAbout'];
      $_SESSION['otherServicesAbout'] = $otherServicesAbout;

    }

} else {

    unset($_SESSION['otherServicesAbout']);

}


//Extra Hours required (more than 3)
if(isset($_POST['aboutHoursMore'])){

    $aboutHoursMore = $_POST['aboutHoursMore'];

    //provide default val of 4 if session value is empty string
    if($aboutHoursMore == ""){

      $_SESSION['aboutHoursMore'] = "4";

    }

    else{

      $_SESSION['aboutHoursMore'] = $aboutHoursMore;

    }

} else {

    unset($_SESSION['aboutHoursMore']);

}


//Hours required
if(isset($_POST['aboutHours'])){

    //if value for extra hours is not needed then destroy its value
    if($_POST['aboutHours'] != "more than 3 hours"){

      unset($_SESSION['aboutHoursMore']);
      $aboutHours = $_POST['aboutHours'];
      $_SESSION['aboutHours'] = $aboutHours;

    }

    else{

      $aboutHours = $_POST['aboutHours'];
      $_SESSION['aboutHours'] = $aboutHours;

    }

} else {

    unset($_SESSION['aboutHours']);

}

//Frequency Required
if(isset($_POST['aboutFrequency'])){

    $aboutFrequency = $_POST['aboutFrequency'];

    //provide default freq of weekly if value is empty string
    if($aboutFrequency == ""){

      $_SESSION['aboutFrequency'] = "Weekly";

    }

    else{

      $_SESSION['aboutFrequency'] = $aboutFrequency;

    }

} else {

    unset($_SESSION['aboutFrequency']);

}

header("Location: https://quote.achgroup.org.au/about-me?updated=true&target=alert");
?>
