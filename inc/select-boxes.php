<?php include('check-session-vals-assign-vars.php');?>

<div class="container">

  <div class="row selected-row">

    <div class="col">

      <a href="<?php echo get_home_url();?>/help-around-the-house">
        <div class="selected-box">

          <?php

          if($house){

            echo('<div class="overlay"></div>');

          }

          ?>

          <p>Help inside<br />the house</p>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
      </a>

    </div>

    <div class="col">

      <a href="<?php echo get_home_url();?>/in-the-garden">
        <div class="selected-box">

          <?php

          if($garden){

            echo('<div class="overlay"></div>');

          }

          ?>

          <p>Help in the<br />garden</p>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
      </a>

    </div>

    <div class="col">

      <a href="<?php echo get_home_url();?>/about-me">
        <div class="selected-box">

          <?php

          if($about){

            echo('<div class="overlay"></div>');

          }

          ?>

          <p>Help<br />for me</p>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
      </a>

    </div>

    <div class="col">

      <a href="<?php echo get_home_url();?>/out-and-about">
        <div class="selected-box">

          <?php

          if($out){

            echo('<div class="overlay"></div>');

          }

          ?>

          <p>Getting out<br />& about</p>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
      </a>

    </div>


    <div class="col">

      <a href="<?php echo get_home_url();?>/professional-advice">
        <div class="selected-box">

          <?php

          if($professional){

            echo('<div class="overlay"></div>');

          }

          ?>


          <p>Professional<br />advice</p>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>

        </div>
      </a>

    </div>

  </div>

</div>
