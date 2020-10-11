<?php session_start();

if(isset($_POST['submit'])){

  $_SESSION['outServices'] = array();

  $outService = $_POST['outService'];
  $outServicePrice = $_POST['outServicePrice'];


  $j = 0;

  foreach($outService as $service=>$value) {

    $i = 0;

    foreach($outServicePrice as $service=>$price){

      $thePrice[$i] =  $price;
      $i++;

    }

  $_SESSION['outServices'][] = array($value, $thePrice[$j]);

  $j++;


  }


}

//Other Services
if(isset($_POST['otherServicesOut'])){

    //if user has empty string as session val then unset
    if($_POST['otherServicesOut'] == ''){

      unset($_SESSION['otherServicesOut']);

    }

    else{

      $otherServicesOut = $_POST['otherServicesOut'];
      $_SESSION['otherServicesOut'] = $otherServicesOut;

    }

} else {

    unset($_SESSION['otherServicesOut']);

}


header("Location: https://quote.achgroup.org.au/out-and-about?updated=true&target=alert");
?>
