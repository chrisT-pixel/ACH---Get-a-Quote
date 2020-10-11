<!-- disable finish button when user edits data in form fields -->
<script>

var somethingChanged = false;
jQuery(document).ready(function() {
   jQuery('input').change(function() {
        somethingChanged = true;

        if (somethingChanged = true) {
            jQuery(".finish").attr('disabled', 'disabled');
            jQuery('#disabled-message').text('Please lock in your changes using the green button above before proceeding');
        } else {

        }

   });
});

</script>

<script>

var somethingChanged = false;
jQuery(document).ready(function() {
   jQuery('.radio').click(function() {
        somethingChanged = true;

        if (somethingChanged = true) {
            jQuery(".finish").attr('disabled', 'disabled');
            jQuery('#disabled-message').text('Please lock in your changes using the green button above before proceeding');
        } else {

        }

   });
});

</script>

<script>

var somethingChanged = false;
jQuery(document).ready(function() {
   jQuery('textarea').change(function() {
        somethingChanged = true;

        if (somethingChanged = true) {
            jQuery(".finish").attr('disabled', 'disabled');
            jQuery('#disabled-message').text('Please lock in your changes using the green button above before proceeding');
        } else {

        }

   });
});

</script>
<!-- END disable finish button when user edits data in form fields -->

<!-- constant defined in check session vals -->
<?php if(ANY_SERVICE_SET){

  include('inc/output-changed-status-message.php');

  ?>


  <div class="container">

    <div class="col-md-12">

      <div id="disabled-message"></div>

      <a href="<?php echo get_home_url()?>/finish">
        <button class="btn finish btn-primary" style="font-size:36px;margin-top:25px;">View your quote</button>
      </a>

    </div>

  </div>

    <h2 class="view-more">View More Service Categories?</h2>

    <?php include('inc/select-boxes.php');?>

    <br />
    <br />
    <br />

<!-- close any service set condition -->
<?php } ?>
