<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Help_at_Home
 */

?>

<footer>

  <div class="footer-top">

    <div class="container footer-top-container">

      <div class="row">

        <div class="col-md-6">

          <p id="news">News delivered direct to your inbox</p>

        </div>

        <div class="col-md-6">

          <a href="https://achgroup.org.au/contact/" target="_blank">
            <button class="btn sign-up-button">Sign up for regular updates</button>
          </a>

        </div>

      </div>

    </div>

  </div>

  <div class="footer-bottom">

    <div class="container">

      <div class="row">

        <div class="col-md-3">

          <h3>CONTACT US TODAY</h3>

          <ul>
            <li><a href="https://achgroup.org.au/contact/feedback/" target="_blank">Feedback Form</a></li>
            <li><a href="https://achgroup.org.au/contact/locations/?wpvlocationcategory=Corporate%20Office" target="_blank">Locations</a></li>
            <li><a href="tel:1300224477">T 1300 22 44 77</a></li>
          </ul>

        </div>


        <div class="col-md-3">

          <h3>SOCIAL MEDIA</h3>

          <a href="https://www.facebook.com/GoodLivesforOlderPeople" target="_blank"><i class="fa fa-facebook-f circle-icon"></i></a>
          <a href="https://www.linkedin.com/company/ach-group" target="_blank"><i class="fa fa-linkedin circle-icon"></i></a>
          <a href="https://www.instagram.com/achgroup/" target="_blank"><i class="fa fa-instagram circle-icon"></i></a>
          <a href="https://twitter.com/ach_group" target="_blank"><i class="fa fa-twitter circle-icon"></i></a>
          <a href="https://www.youtube.com/user/ACHGroupAustralia" target="_blank"><i class="fa fa-youtube-play circle-icon"></i></a>

        </div>

        <div class="col-md-3">

          <h3>PRINT</h3>

          <i class="fa fa-print" onclick="window.print()"></i>

        </div>

        <div class="col-md-3">

          <a href="<?php echo get_home_url();?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ach-logo.png" class="img-responsive center-block"/>
          </a>

        </div>

      </div>

    </div>

  </div>


</footer>



<script>
	//TOGGLE FONT AWESOME AND READ TEXT ON CLICK
  jQuery('.collapsed').click(function(){

    if (jQuery(this).find('span').text() == 'read more'){

      jQuery(this).find('span').text('read less');

    }

    else{

       jQuery(this).find('span').text('read more');

     }

   jQuery(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');

  });

</script>


<script>
  //SHOW SERVICE DESCRIPTIVE TEXT ON CLICK
	jQuery('.collapsed').click(function(){

     jQuery(this).closest('.ind-service-wrapper').find('.show-service-details').slideToggle('slow', function() {

         if (jQuery(this).is(':visible')){
           jQuery(this).css('display','flex');
         }
     });


  });

</script>

<script>
//show 'additional hours' input for user to fill in on click
jQuery( document ).ready(function() {

  jQuery('.hoursSelectMore').click(function(){

    jQuery('.more-hours-input').slideToggle('slow');

  });

});


</script>

<script>
//if more hours have been selected maintain display of input
jQuery( document ).ready(function() {

  if(jQuery('.hoursSelectMore').hasClass('selected')) {

    jQuery('.more-hours-input').css('display', 'block');
    jQuery('.hoursMore').attr('required', true);

  }

  else{

    jQuery('.more-hours-input').css('display', 'none');
    jQuery('.hoursMore').removeAttr('required');
    //cover user behaviour (opening and closing buttons) and provide a different
    //placeholder if the app is in a state where user could advance without
    //selecting extra hours. The session will add value of 4 hours if this value is not selected
    jQuery(".hoursMore").attr("placeholder", "Enter Estimated Hours (4 default)");

  }

});


</script>

<script>
//remove value of additional hours if user hides 'more than 3 hours' button
jQuery( document ).ready(function() {

  jQuery(".hoursSelect").on("click", function() {

      if (jQuery('.hoursMore').val() != ""){

        jQuery('.hoursMore').val("");

      }

      jQuery('.more-hours-input').slideUp('slow');
      jQuery('.hoursMore').removeAttr('required');
      //cover user behaviour (opening and closing buttons) and provide a different
      //placeholder if the app is in a state where user could advance without
      //selecting extra hours. The session will add value of 4 hours if this value is not selected
      jQuery(".hoursMore").attr("placeholder", "Enter Estimated Hours (4 default)");


});

});

</script>

<div class="pinned">
	<a class="call" href="tel://1300224477">Need help, call <strong>1300 22 44 77</strong></a>
</div>

<?php wp_footer(); ?>



</body>

</html>
