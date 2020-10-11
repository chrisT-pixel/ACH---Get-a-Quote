<?php get_header();

/* Template Name: About Me */

?>

<br />

<?php include('inc/check-session-vals-assign-vars.php');?>

<?php

//WP loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

    ?>


<div class="container">

  <div class="row">

    <div class="col-md-6 header-left-about header-left" style="background-image: url('<?php echo $backgroundImg[0]; ?>')">

    </div>

    <div class="col-md-6 header-right">

      <h1><?php the_title();?></h1>

      <p><?php the_content();?></p>

    </div>

  </div>

</div>

<br />

<div class="service-wrapper">

  <div class="container">

		<div class="container-fluid">

		  <div class="row">

		    <div class="col-sm-12">

		      <h2 class="select-title">Tick the box to select the services you are interested in...</h2>

		    </div>

		  </div>


      <!-- OPEN SEVICE SELECTION FORM -->
      <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/update/process-about.php" name="aboutSelection" id="aboutSelection" onSubmit=saveOtherState()>


        <div class="service-container">

          <div class="row service-selection">

          <?php

            // check if the repeater field has rows of data
            if( have_rows('services') ):

              $numServices = count(get_field('services'));

              $i = 1;

             	// loop through the rows of data
              while ( have_rows('services') ) : the_row(); ?>

                <!-- OPEN SERVICE WRAPPER -->
                  <div class="col-sm-6">

                    <div class="ind-service-wrapper">

                        <div class="form-check">
                          <input type="checkbox" class="form-check-input aboutData" id="about<?php echo $i;?>" name="aboutService[]" value="<?php the_sub_field('service_name');?>">
                          <label class="form-check-label" for="about<?php echo $i;?>"><?php the_sub_field('service_name');?></label>

														<?php if( get_sub_field('service_description') ){ ?>

                            	<p class="collapsed">read more <i class="fa fa-chevron-down" aria-hidden="true"></i></p>

														<?php } ?>

                        </div>

                        <p class="show-service-details"><?php the_sub_field('service_description');?></p>

                    <!-- close ind-service wrapper -->
                    </div>

                <!-- close col-sm-6 -->
                </div>

                <!-- close wrappers if new row required -->
                <?php  if($i % 2 == 0){
                          echo '</div></div>';
                          echo '<div class="service-container"><div class="row service-selection">';
                        }

                        $i++;

              // end while have rows loop
              endwhile;

              //requried for odd numbers of services (close wrappers)
              if($numServices % 1 == 0){

                echo '</div></div>';

             }

            // end if have rows loop
            endif; ?>

        <!-- OPEN OTHER SERVICES -->
        <div class="row other-services">

          <div class="col-sm-12">

            <div class="form-group">

              <label for="otherServicesAbout">Other Service Suggestions?</label>
              <textarea class="form-control otherServicesAbout" id="otherServicesAbout" placeholder="What other services can we assist with?" name="otherServicesAbout" rows="5"></textarea>
            </div>

          </div>

        <!-- CLOSE OTHER SERVICES -->
        </div>

        <!-- OPEN HOURS REQUIRED -->
        <div class="row hours-needed">

          <div class="col-sm-12">

            <fieldset class="form-group">

              <h2 class="hours-title">Select how many hours you require</h2>

              <br />

              <?php include('inc/about/about-hours-selection.php');?>

              <div class="radio-group hours-group">

                <div class='radio hoursSelect aboutHoursData aboutHours1' data-value="1 hour">1</div>
                <div class='radio hoursSelect aboutHoursData aboutHours2' data-value="2 hours">2</div>
                <div class='radio hoursSelect aboutHoursData aboutHours3' data-value="3 hours">3</div>
                <div class='radio hoursSelectMore aboutHoursData aboutHours4' data-value="more than 3 hours">More than 3 hours a week</div>
                <br/>

                <input type="hidden" id="aboutHours" name="aboutHours" />

              </div>

              <div class="more-hours-input">

                  <p>How many hours do you estimate you'll need?</p>

                  <input type="number" min="4" max="99" id="aboutHoursMore" class="form-control aboutHoursMore hoursMore" name="aboutHoursMore" placeholder="Enter Estimated Hours" />


              </div>


            </div>

        <!-- CLOSE HOURS REQUIRED -->
        </div>


				<!-- OPEN FREQUENCY REQUIRED -->
        <div class="row hours-needed">

          <div class="col-sm-12">

            <fieldset class="form-group">

              <h2 class="hours-title">What frequency do you require?</h2>

              <br />

              <div class="radio-group frequency-group">

                <div class='radio aboutFrequency aboutHoursWeek' data-value="Weekly">Weekly</div>
                <div class='radio aboutFrequency aboutHoursFort' data-value="Fortnightly">Fortnightly</div>
                <div class='radio aboutFrequency aboutHoursMonth' data-value="Monthly">Monthly</div>

                <br/>

                <input type="hidden" id="aboutFrequency" name="aboutFrequency" />

              </div>

						</div>

        <!-- CLOSE FREQUENCY REQUIRED -->
				</div>



        <div class="form-row text-center">

          <div class="col-md-6">

            <button type="submit" name="submit" class="btn btn-primary add" id="aboutAdd">Add / Update these selections to your plan <i class="fa fa-plus-square" aria-hidden="true"></i></button>

          </div>


      <!-- CLOSE SERVICE SELECTION FORM -->
      </form>

      <div class="col-md-6">

        <!-- OPEN CLEAR ALL DATA FORM -->
        <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/remove/remove-about-data.php" name="aboutRemoval" id="aboutRemoval" onsubmit="removeAllStates()">

          <button type="submit" class="btn remove btn-primary">Clear selections <i class="fa fa-minus-circle" aria-hidden="true"></i></button>

        </form>
        <!-- CLOSE CLEAR ALL DATA FORM -->

      </div>

    </div>



  <!-- close container -->
  </div>

</div>

<!-- close service wrapper -->
</div>

<?php include('inc/check-session-vals-assign-vars.php');?>

<?php include('service-bottom.php');?>


<?php // close WP loop
  } // end while
} // end if
?>

<script>
//slide user to bottom of screen when service category is updated
jQuery(document).ready(function(){
    jQuery('html,body').animate({ scrollTop: jQuery('#<?php echo $_GET['target'];?>').offset().top - 100 }, 'slow');
});
</script>

<!--REQUIRED JS FILES -->

<!-- validate service and hour selections before allowing user to submit -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc/about/validateServicesBeforeSubmit.js"></script>

<!-- turn hours div into virtual radio buttons -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc/hoursSelection.js"></script>

<!-- save state of user selections when switching pages -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc-app/js/saveAboutFormData.js"></script>

<?php get_footer();?>
