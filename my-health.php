<?php get_header();

/* Template Name: My Health */

?>

<br />

<?php include('inc/check-session-vals-assign-vars.php');?>

<?php //include('inc/select-boxes.php');?>

<?php
//WP loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

    ?>

<div class="container">

  <div class="row">

    <div class="col-md-6 header-left-health header-left" style="background-image: url('<?php echo $backgroundImg[0]; ?>')">

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

    <?php //include('inc/output-changed-status-message.php');?>

		<div class="container-fluid">

			<div class="row">

				<div class="col-sm-12">

					<h2 class="select-title">Tick the box to select the services you are interested in...</h2>

				</div>

			</div>


      <!-- OPEN SEVICE SELECTION FORM -->
      <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/update/process-health.php" name="healthSelection" id="healthSelection" onSubmit=saveOtherState()>


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
	                        <input type="checkbox" class="form-check-input healthData" id="health<?php echo $i;?>" name="healthService[]" value="<?php the_sub_field('service_name');?>">
	                        <label class="form-check-label" for="health<?php echo $i;?>"><?php the_sub_field('service_name');?></label>

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

              <label for="otherServiceshealth">Other?</label>
              <textarea class="form-control otherServicesHealth" id="otherServicesHealth" placeholder="What other services can we assist with?" name="otherServicesHealth" rows="5"></textarea>
            </div>

          </div>

        <!-- CLOSE OTHER SERVICES -->
        </div>

        <!-- OPEN HOURS REQUIRED -->
        <div class="row hours-needed">

          <div class="col-sm-12">

            <fieldset class="form-group">

              <h2 class="hours-title">Select how many hours per week you require</h2>

              <br />

              <?php include('inc/health/health-hours-selection.php');?>

              <div class="radio-group">

                <div class='radio hoursSelect healthHoursData healthHours1' data-value="1 hour per week">1</div>
                <div class='radio hoursSelect healthHoursData healthHours2' data-value="2 hours per week">2</div>
                <div class='radio hoursSelect healthHoursData healthHours3' data-value="3 hours per week">3</div>
                <div class='radio hoursSelectMore healthHoursData healthHours4' data-value="more than 3 hours per week">More than 3 hours a week</div>
                <br/>

                <input type="hidden" id="healthHours" name="healthHours" />

              </div>

              <div class="more-hours-input">

                  <p>How many hours do you estimate you'll need?</p>

                  <input type="number" min="4" max="99" id="healthHoursMore" class="form-control healthHoursMore hoursMore" name="healthHoursMore" placeholder="Enter Estimated Hours" />


              </div>


            </div>

        <!-- CLOSE HOURS REQUIRED -->
        </div>

        <div class="form-row text-center">

          <div class="col-md-6">

            <button type="submit" name="submit" class="btn btn-primary add" id="healthAdd">Add / Update these selections to your plan <i class="fa fa-plus-square" aria-hidden="true"></i></button>

          </div>


      <!-- CLOSE SERVICE SELECTION FORM -->
      </form>

      <div class="col-md-6">

        <!-- OPEN CLEAR ALL DATA FORM -->
        <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/remove/remove-health-data.php" name="healthRemoval" id="healthRemoval" onsubmit="removeAllStates()">

          <button type="submit" class="btn remove btn-primary">Clear selections <i class="fa fa-minus-circle" aria-hidden="true"></i></button>

        </form>
        <!-- CLOSE CLEAR ALL DATA FORM -->

      </div>

    </div>



  <!-- close container (opened in output-changed-status-message.php)-->
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


<!--REQUIRED JS FILES -->

<!-- validate service and hour selections before allowing user to submit -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc/health/validateServicesBeforeSubmit.js"></script>

<!-- turn hours div into virtual radio buttons -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc/hoursSelection.js"></script>

<!-- save state of user selections when switching pages -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc-app/js/saveHealthFormData.js"></script>

<?php get_footer();?>
