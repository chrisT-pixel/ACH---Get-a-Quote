<?php
//check is user has selected any HELP AROUND THE HOUSE services
if (isset($_SESSION['houseServices'])){
  $house = true;
}

else{
  $house = false;
}

//check is user has selected any GARDEN services
if (isset($_SESSION['gardenServices'])){
  $garden = true;
}

else{
  $garden = false;
}

//check is user has selected any ABOUT services
if (isset($_SESSION['aboutServices'])){
  $about = true;
}

else{
  $about = false;
}

//check is user has selected any OUT services
if (isset($_SESSION['outServices'])){
  $out = true;
}

else{
  $out = false;
}

//check is user has selected any PROFESSIONAL services
if (isset($_SESSION['professionalServices'])){
  $professional = true;
}

else{
  $professional = false;
}

//HOUSE SERVICES

//House Other services
if(isset($_SESSION['otherServicesHouse'])){
  $otherServicesHouses = $_SESSION['otherServicesHouse'];
}

//House Hours
if(isset($_SESSION['houseHours'])){
  $houseHours = $_SESSION['houseHours'];
}

//Additional House Hours
if(isset($_SESSION['houseHoursMore'])){
  $houseHoursMore = $_SESSION['houseHoursMore'];
}

//Additional House Hours
if(isset($_SESSION['houseFrequency'])){
  $houseFrequency = $_SESSION['houseFrequency'];
}

//GARDEN SERVICES

//Garden Other services
if(isset($_SESSION['otherServicesGarden'])){
  $otherServicesGardens = $_SESSION['otherServicesGarden'];
}

//Garden Hours
if(isset($_SESSION['gardenHours'])){
  $gardenHours = $_SESSION['gardenHours'];
}

//Additional Garden Hours
if(isset($_SESSION['gardenHoursMore'])){
  $gardenHoursMore = $_SESSION['gardenHoursMore'];
}

//Additional Garden Hours
if(isset($_SESSION['gardenFrequency'])){
  $gardenFrequency = $_SESSION['gardenFrequency'];
}

//ABOUT ME SERVICES

//About me Other services
if(isset($_SESSION['otherServicesAbout'])){
  $otherServicesAbout = $_SESSION['otherServicesAbout'];
}

//about Hours
if(isset($_SESSION['aboutHours'])){
  $aboutHours = $_SESSION['aboutHours'];
}

//Additional about Hours
if(isset($_SESSION['aboutHoursMore'])){
  $aboutHoursMore = $_SESSION['aboutHoursMore'];
}

//Additional about Hours
if(isset($_SESSION['aboutFrequency'])){
  $aboutFrequency = $_SESSION['aboutFrequency'];
}

//OUT AND ABOUT SERVICES

//out Other services
if(isset($_SESSION['otherServicesOut'])){
  $otherServicesOut = $_SESSION['otherServicesOut'];
}


//PROFESSIONAL SERVICES

//professional Other services
if(isset($_SESSION['otherServicesProfessional'])){
  $otherServicesProfessional = $_SESSION['otherServicesProfessional'];
}

/* constant for checks in service pages and finish pages */
if (!defined('ANY_SERVICE_SET')) define('ANY_SERVICE_SET', $house || $garden || $about || $out || $health || $professional);

//ACF options data - put into constants to use around site
$aboutPrice = get_field('about_me', 'option');
$housePrice = get_field('help_around_the_house', 'option');
$gardenPrice = get_field('help_in_garden', 'option');
$subMessage = get_field('sub_message', 'option');

/* define prices of services */
if (!defined('HELP_AROUND_HOUSE_PRICE')) define('HELP_AROUND_HOUSE_PRICE', $housePrice);
if (!defined('ABOUT_ME_PRICE')) define('ABOUT_ME_PRICE', $aboutPrice);
if (!defined('HELP_IN_GARDEN_PRICE')) define('HELP_IN_GARDEN_PRICE', $gardenPrice);

/* define subsity message */
if (!defined('SUBSIDY_MESSAGE')) define('SUBSIDY_MESSAGE', $subMessage);


?>
