<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['professionalServices'] = array();

  $professionalService = $_POST['professionalService'];
  $professionalServicePrice = $_POST['professionalServicePrice'];

  $j = 0;

  foreach($professionalService as $service=>$value) {

    $i = 0;

    foreach($professionalServicePrice as $service=>$price){

      $thePrice[$i] =  $price;
      $i++;

    }

  $_SESSION['professionalServices'][] = array($value, $thePrice[$j]);

  $j++;


  }


}

//Other Services
if(isset($_POST['otherServicesProfessional'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesProfessional'] == ''){

      unset($_SESSION['otherServicesProfessional']);

    }

    else{

      $otherServicesProfessional = $_POST['otherServicesProfessional'];
      $_SESSION['otherServicesProfessional'] = $otherServicesProfessional;

    }

} else {

    unset($_SESSION['otherServicesProfessional']);

}


header("Location: https://quote.achgroup.org.au/professional-advice?updated=true&target=alert");
?>
