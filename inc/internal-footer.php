<footer id="internal-footer">

  <p style="text-align:center;">New Footer for application</p>

</div>

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

$( document ).ready(function() {

  $('.hoursSelectMore').click(function(){

    $('.more-hours-input').slideToggle('slow');

  });



});


</script>

<script>

$( document ).ready(function() {

  if($('.hoursSelectMore').hasClass('selected')) {

    $('.more-hours-input').css('display', 'block');
    $('.hoursMore').attr('required', true);

  }

  else{

    $('.more-hours-input').css('display', 'none');
    $('.hoursMore').removeAttr('required');

  }

});


</script>

<script>

$( document ).ready(function() {

  $(".hoursSelect").on("click", function() {

      if ($('.hoursMore').val() != ""){

        $('.hoursMore').val("");

      }

      $('.more-hours-input').slideUp('slow');
      $('.hoursMore').removeAttr('required');


});

});

</script>




</body>

</html>
