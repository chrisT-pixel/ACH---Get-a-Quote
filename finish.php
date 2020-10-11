<?php session_start();
/* Template name: Finish
/
/ PHP MAILER RESOURCES
/
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//init variables for success/error pop up modal
$form_modal = 0;
$form_modal_title = "";
$form_modal_message ="";

$root = $_SERVER['DOCUMENT_ROOT'];

/*
/
/ RECAPTCHA VALIDATIONS
/
*/

// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";

// Register API keys at https://www.google.com/recaptcha/admin
 $siteKey = "test";
 $secret = "test";

// Only send form if there is an email address set
if(isset($_POST['email'])) {



 $responseKey = $_POST['g-recaptcha-response'];

 //captcha details
 $url = 'https://www.google.com/recaptcha/api/siteverify';
 $data = array(
   'secret' => $secret,
   'response' => $responseKey
 );
 $options = array(
   'http' => array (
           'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
     'method' => 'POST',
     'content' => http_build_query($data)
   )
 );
 $context  = stream_context_create($options);
 $verify = file_get_contents($url, 1, $context);
 $captcha_success=json_decode($verify);

   if ($captcha_success->success==true) {

     //modal will be displayed with custom message
       $form_modal = 1;

     //FORM FIELD DATA

       //POST VALUES
       $name = $_POST['names'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $postCode = $_POST['postCode'];
       $message = $_POST['message'];
       $whoFor = $_POST['whoFor'];
       $time = $_POST['time'];
       $day = $_POST['day'];
       $subscribe = $_POST['subscribe'];

       //replace white space in name with dash for file writing purposes
       $namePreg = preg_replace('/\s+/', '-', $name);

           //SESSION VALUES - ASSIGN INTO VARIABLES TO ADD AS STRING IN EMAIL
           require('inc/check-session-vals-assign-vars.php');


           //END SESSION VALUES INCLUDE

           //DYNAMIC PDF GENERATION
           require('make-pdf.php');



           //write pdf to a file
           //add additional directory for localhost
           $pdf->Output('F', $root . '/wp-content/themes/help-at-home/PDF/' . $namePreg . '-help-at-home-quote.pdf');
           //END DYNAMIC PDF GENERATION



     // email recipients for contact forms
     $toACH = 'newsalesteam@ach.org.au';
     $toClient = $email;

     // create 2 objects for 2 seperate emails
     $mail = new PHPMailer(true);
     $mail2 = new PHPMailer(true);

     try{

           //EMAIL OBJECT 1 - TO ACH
           $mail->SMTPDebug = 0;
           $mail->isSMTP();
           $mail->Host = 'smtp-mail.outlook.com';
           $mail->SMTPAuth = true;                               // Enable SMTP authentication
           $mail->Username = 'quote@ach.org.au';
           $mail->Password = 'test';
           //$mail->SMTPSecure = 'ssl';
           $mail->SMTPSecure = 'tls';
           $mail->Port = 587;

           $mail->SMTPOptions = array(
              'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
              )
          );

           $mail->CharSet = 'utf-8';
           $mail->setFrom('quote@ach.org.au', (empty($name) ? 'Contact form' : $name));
           $mail->addAddress($toACH);
           $mail->addBCC('mkelly@ach.org.au', 'Michelle Kelly');
           $mail->addReplyTo('newsalesteam@ach.org.au', 'ACH Group');
           $mail->Subject = 'ACH Group';

           // email output
            $mail->Body = "A New Help at Home Plan was Submitted!\n\n" . "\n\n Name: " . $name . "\n\n Email: " . $email .
                      "\n\n Phone: " . $phone . "\n\n Postcode & Suburb: " . $postCode ."\n\n Message: " . $message . "\n\n Preferred Contact Time: " . $time .
                      "\n\n Day: " . $day . "\n\n Quote For: " . $whoFor . "\n\n";

                      if($house){

                          //help around the house output
                          $mail->Body .= "\n\n\n\n Help Inside The House Services:\n\n ";

                          foreach($_SESSION['houseServices'] as $service){

                            $mail->Body .= $service . "\n\n ";

                          }

                         $mail ->Body .= "Other Services: "  . $otherServicesHouses . "\n\n Number of Hours: "  . $houseHours . "\n\n Frequency: "  . $houseFrequency;

                         if($houseHoursMore){

                           $mail ->Body .= "\n\n Hours Selected: " . $houseHoursMore;

                         }

                         //send ACH house pricing info
                         if($_SESSION['houseHours'] == "1 hour"){

                           $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_AROUND_HOUSE_PRICE) . " " . $houseFrequency;

                           }

                          else if($_SESSION['houseHours'] == "2 hours"){

                             $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_AROUND_HOUSE_PRICE * 2) . " " . $houseFrequency;

                            }

                          else if($_SESSION['houseHours'] == "3 hours"){

                               $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_AROUND_HOUSE_PRICE * 3) . " " . $houseFrequency;

                            }

                          else{

                            $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_AROUND_HOUSE_PRICE * $houseHoursMore) . " " . $houseFrequency;

                          }



                    } //end house

                    if($garden){

                        //in the garden output
                        $mail->Body .= "\n\n\n\n In the Garden Services:\n\n ";

                        foreach($_SESSION['gardenServices'] as $service){

                          $mail->Body .= $service . "\n\n ";

                        }

                       $mail->Body .= "Other Services: "  . $otherServicesGardens . "\n\n Number of Hours: "  . $gardenHours . "\n\n Frequency: "  . $gardenFrequency;

                       if($gardenHoursMore){

                         $mail ->Body .= "\n\n Hours Selected: " . $gardenHoursMore;

                       }

                       //send ACH garden pricing info
                       if($_SESSION['gardenHours'] == "1 hour"){

                         $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_IN_GARDEN_PRICE) . " " . $gardenFrequency;

                         }

                        else if($_SESSION['gardenHours'] == "2 hours"){

                           $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_IN_GARDEN_PRICE * 2) . " " . $gardenFrequency;

                          }

                        else if($_SESSION['gardenHours'] == "3 hours"){

                             $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_IN_GARDEN_PRICE * 3) . " " . $gardenFrequency;

                          }

                        else{

                          $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', HELP_IN_GARDEN_PRICE * $gardenHoursMore) . " " . $gardenFrequency;

                        }


                  } // end garden

                  if($about){

                      //about me output
                      $mail->Body .= "\n\n\n\n About Me Services:\n\n ";

                      foreach($_SESSION['aboutServices'] as $service){

                        $mail->Body .= $service . "\n\n ";

                      }

                     $mail->Body .= "Other Services: "  . $otherServicesAbout . "\n\n Number of Hours: "  . $aboutHours . "\n\n Frequency: "  . $aboutFrequency;

                     if($aboutHoursMore){

                       $mail ->Body .= "\n\n Hours Selected: " . $aboutHoursMore;

                     }

                     //send ACH about me pricing info
                     if($_SESSION['aboutHours'] == "1 hour"){

                       $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', ABOUT_ME_PRICE) . " " . $aboutFrequency;

                       }

                      else if($_SESSION['aboutHours'] == "2 hours"){

                         $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', ABOUT_ME_PRICE * 2) . " " . $aboutFrequency;

                        }

                      else if($_SESSION['aboutHours'] == "3 hours"){

                           $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', ABOUT_ME_PRICE * 3) . " " . $aboutFrequency;

                        }

                      else{

                        $mail ->Body .= "\n\n Pricing: $" . money_format('%.2n', ABOUT_ME_PRICEE * $aboutHoursMore) . " " . $aboutFrequency;

                      }

                } // end about

                if($out){

                  //out and about output
                  $mail->Body .= "\n\n\n\n Out and About Services:\n\n ";

                  foreach($_SESSION['outServices'] as list($service, $price)){

                    $mail->Body .= $service . " $" . $price . "\n\n ";

                  }

                 $mail->Body .= "Other Services: "  . $otherServicesOut;

              }

              if($professional){

              //professional sevices output
              $mail->Body .= "\n\n\n\n Professional Advice Services:\n\n ";

              foreach($_SESSION['professionalServices'] as list($service, $price)){

                $mail->Body .= $service . " $" . $price . "\n\n ";

              }

             $mail->Body .= "Other Services: "  . $otherServicesProfessional;

          }

      $mail->send();


       //EMAIL OBJECT 2 - TO WEBSITE USER

       $nameArray = explode(' ',trim($name));
       $firstName = $nameArray[0];

       $mail2->SMTPDebug = 0;
       $mail2->isSMTP();
       $mail2->Host = 'smtp-mail.outlook.com';
       $mail2->SMTPAuth = true;                               // Enable SMTP authentication
       $mail2->Username = 'quote@ach.org.au';                        // SMTP password
       $mail2->Password = 'test';
       $mail2->SMTPSecure = 'tls';
       //$mail2->SMTPSecure = 'ssl';
       $mail2->Port = 587;

       $mail2->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );

       $mail2->CharSet = 'utf-8';
       $mail2->setFrom('quote@ach.org.au', (empty($name) ? 'Contact form' : $name));
       $mail2->addAddress($toClient);
       $mail2->addReplyTo('newsalesteam@ach.org.au', 'ACH Group');
       $mail2->Subject = 'Thank you for submitting your ACH Group Help at Home Plan';


      //add PDF quote to email
      $mail2->AddAttachment($root . '/wp-content/themes/help-at-home/PDF/' . $namePreg . '-help-at-home-quote.pdf');

      //HTML email layed out in table
       $mail2->Body = '<table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                          <tr>
                            <td align="left" valign="top" style="padding:10px;">

                              <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;border-bottom:4px solid #E6E1D4;padding-bottom:25px;">
                                <tr>
                                  <td width="150" align="center" valign="top" style="padding:10px;">

                                  </td>
                                  <td width="150" align="center" valign="top" style="padding:10px;">

                                  </td>
                                  <td width="150" align="center" valign="top" style="padding:10px;">

                                  </td>
                                  <td width="150" align="center" valign="top" style="padding:10px;">
                                    <img src="https://achgroup.org.au/wp/wp-content/uploads/2016/08/logo.png" style="max-width:150px;" />
                                  </td>
                                </tr>
                              </table>

                              <table width="600" cellspacing="0" cellpadding="0" border="0" align="left" style="max-width:600px; width:100%;padding-top:50px;">
                                <tr>
                                  <td align="left" valign="top" style="padding:10px 20px 10px 20px;">
                                    <h1 style="font-family:Arial;">Thank you for your interest in home care services</h1>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" style="padding:10px 20px 10px 20px;">
                                    <p style="font-size:18px;font-family:Arial;">Hi ' . $firstName . ',</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" style="padding:10px 20px 10px 20px;">
                                    <p style="font-size:18px;font-family:Arial;">Thank you for using ACH Group’s easy step-by-step quoting service. Attached is a copy of the quote you asked for. We will contact you soon to discuss your quote and options. Remember, it’s 100% obligation free.</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" style="padding:10px 20px 25px 20px">
                                    <p style="font-size:18px;font-family:Arial;">If you have any questions about your quote, or how we can support you to live well, talk to us on 1300 22 44 77 (7am – 7pm CST, 7 days a week).</p>
                                  </td>
                                </tr>

                              </table>


                              <table width="600" cellspacing="0" cellpadding="0" border="0" align="left" style="max-width:600px; width:100%;border-bottom:4px solid #E6E1D4;padding-bottom:50px;">
                                <tr>
                                  <td align="left" valign="top" style="padding:10px 20px 10px 20px;width:100%">
                                    <p style="font-size:22px;font-weight: bold;font-family:Arial;">ACH Group</p>
                                  </td>
                                </tr>
                              </table>

                              <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;padding-top:25px;">
                                <tr>
                                  <td align="left" valign="top" style="padding:10px;width:100%;">
                                    <p style="font-size:20px;color:#c1cd23;font-family:Arial;"><a href="https://achgroup.org.au/" style="font-size:20px;color:#c1cd23;text-decoration:none;font-family:Arial;">achgroup.org.au</a> <span style="color:#E6E1D4">|</span> <a href="tel:1300224477" style="font-size:20px;color:#c1cd23;text-decoration:none;">1300 22 44 77</a></p>
                                  </td>
                                </tr>
                              </table>


                            </td>
                          </tr>
                        </table>';






       $mail2->IsHTML(true);
       $mail2->send();


        // MODAL - Set form modal title and message
         $form_modal_title = "Thank You";
         $form_modal_message = "Thank you for using ACH Group’s get a quote service.  We will contact you to discuss your plan and
         options. For your convenience, we’ve emailed you a copy of your Plan Overview.  If you have any questions, please call ACH Group on 1300 22 44 7";

         $form_success = true;

       } catch (Exception $e) {

         echo 'Message could not be sent due to SMTP config error.  Error: ', $mail->ErrorInfo;
       }

   } else {

   $form_modal = 1;


     $form_modal_title = "reCAPTCHA Error";
     $form_modal_message = "Unfortunately there was an error processing the reCAPTCHA, please submit the form again.";

   }

}

?>

<?php get_header();?>

<?php include('inc/check-session-vals-assign-vars.php');?>

<div class="container selections-container">

 <div class="row">

   <div class="col-md-10 offset-md-1 service-details-container">

     <div class="row">

       <div class="col-sm-12">

         <!-- display message if user has access finish page without selecting services -->
         <?php if(!ANY_SERVICE_SET){ ?>

           <h2 class="service-title" style="margin-top:50px;">No services selected.  Please <a href="<?php echo get_home_url();?>">select some services</a> for your plan</h2>

         <?php }

               else{ ?>

             <h2 class="plan-title">Your Quote Overview</h2>

         <?php  }


       ?>

     </div>

   </div>

   <?php
//print_r($_SESSION);
?>

     <!-- If house has any selections -->
     <?php if($house){ ?>

       <div class="row service-row">

         <div class="col-sm-12">

           <h2 class="service-cat-title">Help inside the house</h2>

           <h3 class="service-cat-sub-heading">services selected</h2>

         </div>

       </div>

       <?php if(isset($_SESSION['houseServices'])){

         foreach($_SESSION['houseServices'] as $service){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4><?php echo $service;?></h4>

             </div>

           </div>


         <?php  }

       } ?>


         <!-- Output mesage from user -->
         <?php if(isset($_SESSION['otherServicesHouse'])){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4>Other Services Suggestions:</h4>
               <p><?php echo($_SESSION['otherServicesHouse']);?></p>

             </div>

           </div>

         <?php  } ?>
         <!-- end message check -->

         <!-- Output hours required -->
         <?php if(isset($_SESSION['houseHours'])){ ?>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">total hours required</h2>

             </div>

             <div class="col-sm-7">

                 <?php if($_SESSION['houseHours'] != 'more than 3 hours'){ ?>

                         <p class="hours-details"><?php echo $houseHours;?></p>

                 <?php }

                       else { ?>

                           <p class="hours-details"><?php echo $houseHoursMore; ?></p>

                       <?php  }

                 ?>

             </div>

           </div>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">frequency</h2>

             </div>

             <div class="col-sm-7">

              <p class="hours-details"><?php echo $houseFrequency;?></p>

            </div>

           </div>

           <div class="row service-row estPrice">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">estimated pricing</h2>

             </div>

             <div class="col-sm-7">

               <?php if($_SESSION['houseHours'] == "1 hour"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_AROUND_HOUSE_PRICE));?> <?php echo $houseFrequency;?>*</p>

               <?php }

                   else if($_SESSION['houseHours'] == "2 hours"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_AROUND_HOUSE_PRICE * 2));?> <?php echo $houseFrequency;?>*</p>

               <?php }

                   else if($_SESSION['houseHours'] == "3 hours"){ ?>

                   <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_AROUND_HOUSE_PRICE * 3));?> <?php echo $houseFrequency;?>*</p>


               <?php }

                   else { ?>

                     <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_AROUND_HOUSE_PRICE * $houseHoursMore));?> <?php echo $houseFrequency;?>*</p>

                   <?php }

               ?>


             </div>

            </div>

         <?php  } ?>
         <!-- end hours check -->


     <!-- close house check -->
     <?php }
     ?>

     <!-- If garden has any selections -->
     <?php if($garden){ ?>

       <div class="row service-row">

         <div class="col-sm-12">

           <h2 class="service-cat-title">Help in the garden</h2>

           <h3 class="service-cat-sub-heading">services selected</h2>

         </div>

       </div>

       <?php if(isset($_SESSION['gardenServices'])){

         foreach($_SESSION['gardenServices'] as $service){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4><?php echo $service;?></h4>

             </div>

           </div>


         <?php  }

       } ?>



         <!-- Output mesage from user -->
         <?php if(isset($_SESSION['otherServicesGarden'])){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4>Other Service Suggestions:</h4>
               <p><?php echo($_SESSION['otherServicesGarden']);?></p>

             </div>

           </div>

         <?php  } ?>
         <!-- end message check -->

         <!-- Output hours required -->
         <?php if(isset($_SESSION['gardenHours'])){ ?>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">total hours required</h2>

             </div>

             <div class="col-sm-7">

               <?php if($_SESSION['gardenHours'] != 'more than 3 hours'){ ?>

                       <p class="hours-details"><?php echo $gardenHours;?></p>

               <?php }

                     else { ?>

                         <p class="hours-details"><?php echo $gardenHoursMore; ?></p>

                     <?php  }

               ?>

             </div>

           </div>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">frequency</h2>

             </div>

             <div class="col-sm-7">

              <p class="hours-details"><?php echo $gardenFrequency;?></p>

            </div>

           </div>


           <div class="row service-row estPrice">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">estimated pricing</h2>

             </div>

             <div class="col-sm-7">

               <?php if($_SESSION['gardenHours'] == "1 hour"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_IN_GARDEN_PRICE));?> <?php echo $gardenFrequency;?>*</p>

               <?php }

                   else if($_SESSION['gardenHours'] == "2 hours"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_IN_GARDEN_PRICE * 2));?> <?php echo $gardenFrequency;?>*</p>

               <?php }

                   else if($_SESSION['gardenHours'] == "3 hours"){ ?>

                     <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_IN_GARDEN_PRICE * 3));?> <?php echo $gardenFrequency;?>*</p>


               <?php }

                   else { ?>

                     <p class="hours-details">Pricing: <?php echo(money_format('%.2n', HELP_IN_GARDEN_PRICE * $gardenHoursMore));?> <?php echo $gardenFrequency;?>*</p>

                   <?php }

               ?>


             </div>

            </div>

         <?php  } ?>
         <!-- end hours check -->


     <!-- close garden check -->
     <?php }
     ?>

     <!-- If about has any selections -->
     <?php if($about){ ?>

       <div class="row service-row">

         <div class="col-sm-12">

           <h2 class="service-cat-title">Help for me</h2>

           <h3 class="service-cat-sub-heading">services selected</h2>

         </div>

       </div>

       <?php if(isset($_SESSION['aboutServices'])){

         foreach($_SESSION['aboutServices'] as $service){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4><?php echo $service;?></h4>

             </div>

           </div>


         <?php  }

       } ?>

        <!-- Output mesage from user -->
         <?php if(isset($_SESSION['otherServicesAbout'])){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4>Other Service Suggestions:</h4>
               <p><?php echo($_SESSION['otherServicesAbout']);?></p>

             </div>

           </div>

         <?php  } ?>
         <!-- end message check -->

         <!-- Output hours required -->
         <?php if(isset($_SESSION['aboutHours'])){ ?>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">total hours required</h2>

             </div>

             <div class="col-sm-7">

               <?php if($_SESSION['aboutHours'] != 'more than 3 hours'){ ?>

                       <p class="hours-details"><?php echo $aboutHours;?></p>

               <?php }

                     else { ?>

                         <p class="hours-details"><?php echo $aboutHoursMore; ?></p>

                     <?php  }

               ?>

             </div>

           </div>

           <div class="row service-row totalHours">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">frequency</h2>

             </div>

             <div class="col-sm-7">

              <p class="hours-details"><?php echo $aboutFrequency;?></p>

            </div>

           </div>



           <div class="row service-row estPrice">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">estimated pricing</h2>

             </div>

             <div class="col-sm-7">

               <?php if($_SESSION['aboutHours'] == "1 hour"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', ABOUT_ME_PRICE));?> <?php echo $aboutFrequency;?>*</p>

               <?php }

                   else if($_SESSION['aboutHours'] == "2 hours"){ ?>

                       <p class="hours-details">Pricing: <?php echo(money_format('%.2n', ABOUT_ME_PRICE * 2));?> <?php echo $aboutFrequency;?>*</p>

               <?php }

                   else if($_SESSION['aboutHours'] == "3 hours"){ ?>

                     <p class="hours-details">Pricing: <?php echo(money_format('%.2n', ABOUT_ME_PRICE * 3));?> <?php echo $aboutFrequency;?>*</p>


               <?php }

                   else { ?>

                     <p class="hours-details">Pricing: <?php echo(money_format('%.2n', ABOUT_ME_PRICE * $aboutHoursMore));?> <?php echo $aboutFrequency;?>*</p>

                   <?php }

               ?>


             </div>

          </div>

         <?php  } ?>
         <!-- end hours check -->


     <!-- close about check -->
     <?php }
     ?>


     <!-- If out has any selections -->
     <?php if($out){ ?>

       <div class="row service-row">

         <div class="col-sm-12">

           <h2 class="service-cat-title">Out and about</h2>

           <h3 class="service-cat-sub-heading">services selected</h2>

         </div>

       </div>

       <?php if(isset($_SESSION['outServices'])){

         foreach($_SESSION['outServices'] as list($service, $price)){ ?>

           <div class="row service-row">

             <div class="col-sm-5">

               <h4><?php echo $service;?></h4>

             </div>

              <div class="col-sm-7">

                <?php $outTotalCost += $price;?>

               <h4><?php echo money_format('%.2n', $price);?> per session</h4>

             </div>

           </div>


         <?php  }

       } ?>



         <!-- Output mesage from user -->
         <?php if(isset($_SESSION['otherServicesOut'])){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4>Other interests you would like to persue:</h4>
               <p><?php echo($_SESSION['otherServicesOut']);?></p>

             </div>

           </div>

         <?php  } ?>
         <!-- end message check -->

         <div class="row service-row estPrice">

           <div class="col-sm-5">

             <h3 class="service-cat-sub-heading">estimated pricing</h2>

           </div>

           <div class="col-sm-7">

             <p class="hours-details">Pricing: <?php echo(money_format('%.2n', $outTotalCost));?>*</p>

           </div>


         </div>


     <!-- close out and about check -->
     <?php }
     ?>


    <!-- If professional has any selections -->
     <?php if($professional){ ?>

       <div class="row service-row">

         <div class="col-sm-12">

           <h2 class="service-cat-title">Professional advice</h2>

           <h3 class="service-cat-sub-heading">services selected</h2>

         </div>

       </div>

       <?php if(isset($_SESSION['professionalServices'])){

         foreach($_SESSION['professionalServices'] as list($service, $price)){ ?>

           <div class="row service-row">

             <div class="col-sm-5">

               <h4><?php echo $service;?></h4>

             </div>

             <div class="col-sm-7">

                <?php $professionalTotalCost += $price;?>

               <h4><?php echo money_format('%.2n', $price);?> per session</h4>

             </div>

           </div>


         <?php  }

       } ?>



         <!-- Output mesage from user -->
         <?php if(isset($_SESSION['otherServicesProfessional'])){ ?>

           <div class="row service-row">

             <div class="col-sm-12">

               <h4>Professional Advice Service Suggestions:</h4>
               <p><?php echo($_SESSION['otherServicesProfessional']);?></p>

             </div>

           </div>

         <?php  } ?>
         <!-- end message check -->

         <div class="row service-row estPrice">

             <div class="col-sm-5">

               <h3 class="service-cat-sub-heading">estimated pricing</h2>

             </div>

             <div class="col-sm-7">

                <p class="hours-details">Pricing: <?php echo(money_format('%.2n', $professionalTotalCost));?>*</p>

             </div>

           </div>


    <!-- close professional check -->
     <?php }
     ?>

     <br />

     <!-- display SUBSIDY_MESSAGE at bottom -->
     <div class="row">

       <div class="col-sm-12">

         <p><?php echo(SUBSIDY_MESSAGE);?></p>

       </div>

     </div>




     <br />

     <!-- close col-md-8 for all service items -->
     </div>

   </div>

</div>

<!-- only display form and next step message if user has selected services -->
<?php if(ANY_SERVICE_SET){ ?>

  <div class="container next-step-container">

   <div class="row">

     <div class="col-sm-12">

       <h2>What's the next step?</h2>

     </div>

   </div>

   <div class="row">

     <div class="col-sm-12">

       <?php
         //WP loop
         if ( have_posts() ) {
           while ( have_posts() ) {
           	the_post();
            the_content();

          }

        }
       ?>

     </div>

   </div>



      <form action="" method="post" >

        <div class="form-group">

          <input type="text" class="form-control" name="names" id="names" placeholder="Full Name *" required>

       </div>

        <div class="form-group">

          <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number *" required>

       </div>

       <div class="form-group">

         <select name="time" class="form-control" id="time" required>
           <option value="time">Preferred contact time:</option>
           <option value="9-10am">9am - 10am</option>
           <option value="10-11am">10am - 11am</option>
           <option value="11-12pm">11am - 12pm</option>
           <option value="12-1pm">12pm - 1pm</option>
           <option value="1-2pm">1pm - 2pm</option>
           <option value="2-3pm">2pm - 3pm</option>
           <option value="3-4pm">3pm - 4pm</option>
           <option value="4-5pm">4pm - 5pm</option>
         </select>


      </div>

      <div class="form-group">

        <select name="day" class="form-control" id="day" required>
          <option value="day">Preferred day of contact:</option>
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thursday">Thursday</option>
          <option value="friday">Friday</option>
        </select>

      </div>

        <div class="form-group">

         <input type="email" class="form-control" id="email" name="email" placeholder="Email Address *" required>

       </div>

       <div class="form-group">

         <input class="form-control" id="autocomplete" name="postCode" placeholder="Postcode *" onFocus="geolocate()">

      </div>

       <div class="form-group">

           <select name="whoFor" class="form-control" id="whoFor">
             <option value="who">This quote is for:</option>
             <option value="me">Me</option>
             <option value="partner or spouse">My partner or spouse</option>
             <option value="parent">Parent</option>
             <option value="friend">Friend</option>
             <option value="other">Other</option>
           </select>

        </div>

        <div class="form-group">

         <textarea class="form-control" id="message" name="message" placeholder="Anything else we need to know?" rows="4"></textarea>

       </div>

        <div class="form-check">

           <input type="checkbox" class="form-check-input" id="subscribe" name="subscribe" value="subscribe">
           <label class="form-check-label" for="subscribe">Subscribe to Newsletter?</label>

         </div>

         <br />

           <div class="g-recaptcha" data-sitekey="6Le8gnQUAAAAAEqB_G0xi4TdTDPC6ZTdIe9eri8j"></div>

         <br />

          <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit enquiry</button>

         </div>


       </form>

    <!-- end conditional check that services have been selected -->
    <?php } ?>

     <div id="submit-message"></div>

       <div class="progress">
         <div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
           <span id="current-progress"></span>
         </div>
       </div>


     <br />

 </div>


</div>



<script>
//display progress bar when user submits form
jQuery('form').submit(function(){

  jQuery('#submit-message').text('Please wait. Your quote is being generated.');
  jQuery('.progress').css('display', 'flex');

  jQuery(function() {
    var current_progress = 0;
    var interval = setInterval(function() {
        current_progress += 5;
        jQuery("#dynamic")
        .css("width", current_progress + "%")
        .attr("aria-valuenow", current_progress)
        .text(current_progress + "% Complete");
        if (current_progress >= 100)
            clearInterval(interval);
    }, 1000);
  });

});
</script>


<!-- SHOW MODAL WITH CUSTOM MESSAGE BASED UPON FORM STATUS -->
<?php if($form_modal == 1){ ?>
 <script type="text/javascript">
   jQuery(window).on("load",function(){

       jQuery('#contact-sent').modal('show');

     });
 </script>

 <!-- modal to display contact form status -->
 <div id="contact-sent" class="modal fade">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">

         <h4 class="modal-title"><?php echo $form_modal_title; ?></h4>
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

       </div>
       <div class="modal-body">
         <p><?php echo $form_modal_message; ?></p>
       </div>
       <div class="modal-footer">
         <div class="row">
           <div class="col-sm-6">
             <a href="https://achgroup.org.au/contact/" target="_blank">
              <button type="button" class="btn btn-default">Contact Us</button>
            </a>
           </div>

           <?php if($form_success){ ?>

           <div class="col-sm-6">
              <a href="<?php echo $themePath . '/PDF/' . $namePreg . '-help-at-home-quote.pdf';?>" target="_blank">
                <button type="button" class="btn btn-default print-btn">View / Print Quote</button>
              </a>
            </div>

          <?php } ?>
       </div>
     </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
</div>

<?php } ?>

<script>

  //POSTCODE TO SUBURB AUTOCOMPLETE
  var placeSearch, autocomplete;

  var componentForm = {
    postal_code: 'short_name',
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name'

  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search predictions to suburbs.
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'),
        {types: ['(regions)'], componentRestrictions: {'country': "au"}});

    autocomplete.setFields(['address_component']);

  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle(
            {center: geolocation, radius: position.coords.accuracy});
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsDnI5-g0EijO6DYove0wsTvAtOpX_DVo&libraries=places&callback=initAutocomplete"
async defer></script>



<?php get_footer();?>
