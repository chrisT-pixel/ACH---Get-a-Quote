<?php

    require('fpdf181/fpdf.php');

    //require('fpdf181/makefont/makefont.php');
    //MakeFont('webfonts/3196AF_0_0.ttf','cp1252');

    require('inc/check-session-vals-assign-vars.php');

    //if there are house services add to an array
    if($house){

      $houseServices = array();

      array_push($houseServices, 'Help Inside the House');

      foreach($_SESSION['houseServices'] as $service){

        array_push($houseServices, $service);

      }

      if(isset($otherServicesHouses)){

        array_push($houseServices, 'Other Service Suggestions: ' . $otherServicesHouses);

      }

      // predefined amound of hours
      if(isset($houseHours) && $houseHours != 'more than 3 hours'){

        array_push($houseServices, 'Total Hours Required: ' . $houseHours);
        //calculate price and add to array
        $houseCost = money_format('%.2n', HELP_AROUND_HOUSE_PRICE * $houseHours);
        array_push($houseServices, 'Frequency: ' . $houseFrequency);
        array_push($houseServices, 'Estimated Pricing: $' . $houseCost . ' *');


      }

      //user has selected more than 3 hours - determine how many
      if(isset($houseHours) && $houseHours == 'more than 3 hours'){

        array_push($houseServices, 'Total Hours Required: ' . $houseHoursMore);
        //calculate price and add to array
        $houseCost = money_format('%.2n', HELP_AROUND_HOUSE_PRICE * $houseHoursMore);
        array_push($houseServices, 'Frequency: ' . $houseFrequency);
        array_push($houseServices, 'Estimated Pricing: $' . $houseCost . ' *');


      }

    // end house services
    }

    //if there are garden services add to an array
    if($garden){

      $gardenServices = array();

      array_push($gardenServices, 'In the Garden');

      foreach($_SESSION['gardenServices'] as $service){

        array_push($gardenServices, $service);

      }

      if(isset($otherServicesGardens)){

        array_push($gardenServices, 'Other Service Suggestions: ' . $otherServicesGardens);

      }

      // predefined amound of hours
      if(isset($gardenHours) && $gardenHours != 'more than 3 hours'){

        array_push($gardenServices, 'Total Hours Required: ' . $gardenHours);
        //calculate price and add to array
        $gardenCost = money_format('%.2n', HELP_IN_GARDEN_PRICE * $gardenHours);
        array_push($gardenServices, 'Frequency: ' . $gardenFrequency);
        array_push($gardenServices, 'Estimated Pricing: $' . $gardenCost . ' *');


      }

      //user has selected more than 3 hours - determine how many
      if(isset($gardenHours) && $gardenHours == 'more than 3 hours'){

        array_push($gardenServices, 'Total Hours Required: ' . $gardenHoursMore);
        //calculate price and add to array
        $gardenCost = money_format('%.2n', HELP_IN_GARDEN_PRICE * $gardenHoursMore);
        array_push($gardenServices, 'Frequency: ' . $gardenFrequency);
        array_push($gardenServices, 'Estimated Pricing: $' . $gardenCost . ' *');


      }


    // end garden services
    }


    //if there are about services add to an array
    if($about){

      $aboutServices = array();

      array_push($aboutServices, 'About Me');

      foreach($_SESSION['aboutServices'] as $service){

        array_push($aboutServices, $service);

      }

      if(isset($otherServicesAbout)){

        array_push($aboutServices, 'Other Service Suggestions: ' . $otherServicesAbout);

      }

      // predefined amound of hours
      if(isset($aboutHours) && $aboutHours != 'more than 3 hours'){

        array_push($aboutServices, 'Total Hours Required: ' . $aboutHours);
        //calculate price and add to array
        $aboutCost = money_format('%.2n', ABOUT_ME_PRICE * $aboutHours);
        array_push($aboutServices, 'Frequency: ' . $aboutFrequency);
        array_push($aboutServices, 'Estimated Pricing: $' . $aboutCost . ' *');


      }

      //user has selected more than 3 hours - determine how many
      if(isset($aboutHours) && $aboutHours == 'more than 3 hours'){

        array_push($aboutServices, 'Total Hours Required: ' . $aboutHoursMore);
        //calculate price and add to array
        $aboutCost = money_format('%.2n', ABOUT_ME_PRICE * $aboutHoursMore);
        array_push($aboutServices, 'Frequency: ' . $aboutFrequency);
        array_push($aboutServices, 'Estimated Pricing: $' . $aboutCost . ' *');


      }


    // end about me services
    }

    //if there are out and about services add to an array
    if($out){

      $outServices = array();
      $outPricing = array();

      //push service category title into outServices array
      array_push($outServices, "Getting Out and About");

      //loop through service selections and push into outServices array
      foreach($_SESSION['outServices'] as list($service, $price)){

        array_push($outServices, $service);

      }

      //push session suggestions in to outServices array
      if(isset($otherServicesOut)){

        array_push($outServices, 'Other interests you would like to persue: ' . $otherServicesOut);

      }

      //loop through pricing selections and push into outPricing array
      foreach($_SESSION['outServices'] as list($service, $price)){

        array_push($outPricing, money_format('%.2n', $price));

      }

      $outServicesSum = array_sum($outPricing);
      $outServicesSumFormatted = money_format('%.2n', $outServicesSum);


    // end out services
    }



    //if there are professional services add to an array
    if($professional){

      $professionalServices = array();
      $professionalPricing = array();

      //push service category title into professionalServices array
      array_push($professionalServices, 'Professional Advice');

      //loop through service selections and push into professionalServices array
      foreach($_SESSION['professionalServices'] as list($service, $price)){

        array_push($professionalServices, $service);

      }

      //push session suggestions in to professionalServices array
      if(isset($otherServicesProfessional)){

        array_push($professionalServices, 'Other Service Suggestions: ' . $otherServicesProfessional);

      }

      //loop through pricing selections and push into outPricing array
      foreach($_SESSION['professionalServices'] as list($service, $price)){

      array_push($professionalPricing, money_format('%.2n', $price));

    }

    $professionalServicesSum = array_sum($professionalPricing);
    $professionalServicesSumFormatted = money_format('%.2n', $professionalServicesSum);




    // end professional services
    }

    $themePath = get_stylesheet_directory_uri();


  //construct FPDF object
  $pdf = new FPDF();
  $pdf->AddFont('ACH-font','','3196AF_0_0.php');
  $pdf->AddFont('ACH-font-bold','','3196AF_1_0.php');
  $pdf->AddFont('ACH-font-bolder','','3196AF_4_0.php');
  $pdf->AddPage();
  $pdf->SetFont('ACH-font-bold', '', 32);
  $pdf->SetTextColor(33, 37, 41);
  $pdf->SetAutoPageBreak(true);
  $pdf->Image($themePath . '/images/ach-logo.png',185,10, -150);
  //line break
  $pdf->Cell(0,6,'',0,1);
  $pdf->SetTextColor(193, 205, 35);
  $pdf->Cell(0,10,'Your quote',0,1, 'L');
  $pdf->SetFont('ACH-font-bold','',16);
  $pdf->SetTextColor(33, 37, 41);
  //line break
  $pdf->Cell(0,2,'',0,1);
  $pdf->Cell(0,10,'Quote for ' . $name .'',0,1, 'L');
  $pdf->SetDrawColor(183, 175, 153);
  $pdf->Line(10, 40, 200, 40);
  $pdf->Line(10, 40.1, 200, 40.1);
  $pdf->Line(10, 40.2, 200, 40.2);
  $pdf->Line(10, 40.3, 200, 40.3);
  $pdf->Line(10, 40.4, 200, 40.4);
  //$pdf->SetTextColor(33, 37, 41);
  //line break
  $pdf->Cell(0,5,'',0,1);

  //narrow margin for service content
  $pdf->SetMargins(15,1);

  if($house){

      //length of house services array
      $houseLength = count($houseServices);

      //write house serevices to PDF
      for($i=0; $i < $houseLength; $i++){

          //the title (first item in array)
          if($i == 0){

            $pdf->SetFont('ACH-font-bold','',18);
            $pdf->SetTextColor(193, 205, 35);
            //line break
            $pdf->Cell(0,5,'',0,1);


          }

          elseif ($i == 1) {

            //line break
            $pdf->Cell(0,5,'',0,1);
            $pdf->SetFont('ACH-font','',16);
            $pdf->SetTextColor(33, 37, 41);

          }

          elseif($i == $houseLength - 1 || $i == $houseLength - 2 || $i == $houseLength - 3){

              $pdf->SetFont('ACH-font-bold','',16);

          }

          else{

            $pdf->SetFont('ACH-font','',16);
            $pdf->SetTextColor(33, 37, 41);

          }


        $pdf->MultiCell(0,10,$houseServices[$i],0,1);


      }

        //line break
        $pdf->Cell(0,6,'',0,1);

        $currentY = $pdf->getY();
        $pdf->Line(10, $currentY, 200, $currentY);

        //line break
        $pdf->Cell(0,6,'',0,1);

    }

    if($garden){

        //length of house services array
        $gardenLength = count($gardenServices);

        //write garden serevices to PDF
        for($i=0; $i < $gardenLength; $i++){

            //the title (first item in array)
            if($i == 0){

              $pdf->SetFont('ACH-font-bold','',18);
              $pdf->SetTextColor(193, 205, 35);

            }

            elseif ($i == 1) {

              //line break
              $pdf->Cell(0,5,'',0,1);
              $pdf->SetFont('ACH-font','',16);
              $pdf->SetTextColor(33, 37, 41);

            }

            elseif($i == $gardenLength - 1 || $i == $gardenLength - 2 || $i == $gardenLength - 3){

                $pdf->SetFont('ACH-font-bold','',16);

            }

            else{

              $pdf->SetFont('ACH-font','',16);
              $pdf->SetTextColor(33, 37, 41);

            }

            $pdf->MultiCell(0,10,$gardenServices[$i],0,1);

          }

          //line break
          $pdf->Cell(0,6,'',0,1);

          $currentY = $pdf->getY();
          $pdf->Line(10, $currentY, 200, $currentY);

          //line break
          $pdf->Cell(0,6,'',0,1);

      }

      if($about){

          //length of house services array
          $aboutLength = count($aboutServices);

          //write garden serevices to PDF
          for($i=0; $i < $aboutLength; $i++){

              //the title (first item in array)
              if($i == 0){

                $pdf->SetFont('ACH-font-bold','',18);
                $pdf->SetTextColor(193, 205, 35);

              }

              elseif ($i == 1) {

                //line break
                $pdf->Cell(0,5,'',0,1);
                $pdf->SetFont('ACH-font','',16);
                $pdf->SetTextColor(33, 37, 41);

              }

              elseif($i == $aboutLength - 1 || $i == $aboutLength - 2 || $i == $aboutLength - 3){

                  $pdf->SetFont('ACH-font-bold','',16);

              }

              else{

                $pdf->SetFont('ACH-font','',16);
                $pdf->SetTextColor(33, 37, 41);

              }

              $pdf->MultiCell(0,10,$aboutServices[$i],0,1);

            }

            //line break
            $pdf->Cell(0,6,'',0,1);

            $currentY = $pdf->getY();
            $pdf->Line(10, $currentY, 200, $currentY);

            //line break
            $pdf->Cell(0,6,'',0,1);

        }

        if($out){

            //length of house services array
            $outLength = count($outServices);

            //write garden serevices to PDF
            for($i=0; $i < $outLength; $i++){

                //the title (first item in array)
                if($i == 0){

                  $pdf->SetFont('ACH-font-bold','',18);
                  $pdf->SetTextColor(193, 205, 35);

                }

                elseif ($i == 1) {

                  //line break
                  $pdf->Cell(0,5,'',0,1);
                  $pdf->SetFont('ACH-font','',16);
                  $pdf->SetTextColor(33, 37, 41);

                }

                else{

                  $pdf->SetFont('ACH-font','',16);
                  $pdf->SetTextColor(33, 37, 41);

                }

                $pdf->MultiCell(0,10,$outServices[$i],0,1);

              }

              //display out and about price total
              $pdf->SetFont('ACH-font-bold','',16);
              $pdf->MultiCell(0,10,'Estimated Pricing: $' . $outServicesSumFormatted,0,1 . ' *');

              //line break
              $pdf->Cell(0,6,'',0,1);

              $currentY = $pdf->getY();
              $pdf->Line(10, $currentY, 200, $currentY);

              //line break
              $pdf->Cell(0,6,'',0,1);

          }



            if($professional){

                //length of house services array
                $professionalLength = count($professionalServices);

                //write garden serevices to PDF
                for($i=0; $i < $professionalLength; $i++){

                    //the title (first item in array)
                    if($i == 0){

                      $pdf->SetFont('ACH-font-bold','',18);
                      $pdf->SetTextColor(193, 205, 35);

                    }

                    elseif ($i == 1) {

                      //line break
                      $pdf->Cell(0,5,'',0,1);
                      $pdf->SetFont('ACH-font','',16);
                      $pdf->SetTextColor(33, 37, 41);

                    }

                    else{

                      $pdf->SetFont('ACH-font','',16);
                      $pdf->SetTextColor(33, 37, 41);

                    }

                    $pdf->MultiCell(0,10,$professionalServices[$i],0,1);

                  }

                  // display professional services total
                  $pdf->SetFont('ACH-font-bold','',16);
                  $pdf->MultiCell(0,10,'Estimated Pricing: $' . $professionalServicesSumFormatted,0,1 . ' *');

                  //line break
                  $pdf->Cell(0,6,'',0,1);

                  $currentY = $pdf->getY();
                  $pdf->Line(10, $currentY, 200, $currentY);

                  //line break
                  $pdf->Cell(0,6,'',0,1);

              }

  //narrow margin for service content
  $pdf->SetMargins(10, 1);

  $disclaimer = '*You may be eligible for a government subsidy. Call us to discuss. All quotes are subject to change.';

  $pdf->SetFont('ACH-font','',12);
  $pdf->MultiCell(0,6,$disclaimer,0,1);

  //$asterix = '*Travel Charges apply for some services.';

  //$pdf->SetFont('ACH-font','',12);
  //$pdf->MultiCell(0,6,$asterix,0,1);

  //PDF is written in finish.php


?>
