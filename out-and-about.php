<?php get_header();
/* Template Name: Out and About */
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

    <div class="col-md-6 header-left-out header-left" style="background-image: url('<?php echo $backgroundImg[0]; ?>')">

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
      <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/update/process-out.php" name="outSelection" id="outSelection">

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
	                        <input type="checkbox" class="form-check-input outData" id="out<?php echo $i;?>" name="outService[]" value="<?php the_sub_field('service_name');?>">
													<input type="hidden" class="form-check-input outPrice" id="outPrice<?php echo $i;?>" name="outServicePrice[]" value="<?php the_sub_field('service_price');?>">


	                        <label class="form-check-label" for="out<?php echo $i;?>"><?php the_sub_field('service_name');?></label>


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

              <label for="otherServicesOut">Any other interests you would like to persue?</label>
              <textarea class="form-control otherServicesOut" placeholder="<?php echo $_SESSION['otherServicesOut'];?>" id="otherServicesOut" name="otherServicesOut" rows="5"></textarea>
            </div>

          </div>

        <!-- CLOSE OTHER SERVICES -->
        </div>



        <div class="form-row text-center">

          <div class="col-md-6">

            <button type="submit" disabled name="submit" class="btn btn-primary add" id="outAdd">Add / Update these selections to your plan <i class="fa fa-plus-square" aria-hidden="true"></i></button>

          </div>


      <!-- CLOSE SERVICE SELECTION FORM -->
      </form>

      <div class="col-md-6">

        <!-- OPEN CLEAR ALL DATA FORM -->
        <form method="post" action="<?php echo get_stylesheet_directory_uri();?>/inc-app/remove/remove-out-data.php" name="outRemoval" id="outRemoval" onsubmit="removeAllStates()">

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

<script>
//slide user to bottom of screen when service category is updated
jQuery(document).ready(function(){
    jQuery('html,body').animate({ scrollTop: jQuery('#<?php echo $_GET['target'];?>').offset().top - 100 }, 'slow');
});
</script>

<!--REQUIRED JS FILES -->

<!-- validate service and hour selections before allowing user to submit -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc/out/validateServicesBeforeSubmit.js"></script>

<!-- disable submit button if no checkboxes selected -->
<script>
jQuery( document ).ready(function() {

	var checkboxes = jQuery("input[type='checkbox']");
	var submitButt = jQuery("#outAdd");
	var textarea = jQuery("#otherServicesOut");

	checkboxes.click(function() {
    	submitButt.attr("disabled", !checkboxes.is(":checked"));
	});

	textarea.click(function(){

  	if(checkboxes.is(":checked")){
			submitButt.prop("disabled", false);
			}
	});


});

</script>

<!-- save state of user selections when switching pages -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/inc-app/js/saveOutFormData.js"></script>

<script>
//loop through all checkbox selections and remove hidden price field from DOM
//if not selected
jQuery( document ).ready(function() {

	jQuery('#outSelection').submit(function() {

		jQuery('.outData').each(function() {

			if (!jQuery(this).is(':checked')) {

			    jQuery(this).next('.outPrice').remove();

					}

		});

		//set "otherServicesHouse" value to local storage when submit button is clicked
		var otherVal = document.getElementById("otherServicesOut").value;
		localStorage.setItem('otherServicesOut', otherVal);

	});

});
</script>





<?php get_footer();?>
