<?php get_header();

/* Template Name: Front Page */

  //get all the featured images from respective pages
  $housePostID = 12;
  $housePostID = get_post_thumbnail_id($housePostID);
  $houseImage = wp_get_attachment_image_src( $housePostID, 'full' );

  $gardenPostID = 10;
  $gardenPostID = get_post_thumbnail_id($gardenPostID);
  $gardenImage = wp_get_attachment_image_src( $gardenPostID, 'full' );

  $aboutPostID = 20;
  $aboutPostID = get_post_thumbnail_id($aboutPostID);
  $aboutImage = wp_get_attachment_image_src( $aboutPostID, 'full' );

  $outPostID = 16;
  $outPostID = get_post_thumbnail_id($outPostID);
  $outImage = wp_get_attachment_image_src( $outPostID, 'full' );

  /*$healthPostID = 14;
  $healthPostID = get_post_thumbnail_id($healthPostID);
  $healthImage = wp_get_attachment_image_src( $healthPostID, 'full' );*/

  $advicePostID = 18;
  $advicePostID = get_post_thumbnail_id($advicePostID);
  $adviceImage = wp_get_attachment_image_src( $advicePostID, 'full' );
?>

<div class="container-fluid landing-top">

<?php
//WP loop
if ( have_posts() ) {
  while ( have_posts() ) {
  	the_post();
?>

<h1><?php the_title();?></h1>

<?php the_content();?>


</div>

<br />


<div class="container card-container">

<!-- row 1 -->
  <div class="row">

    <div class="col-md-4">

        <div class="card">
          <a href="<?php echo get_home_url();?>/help-around-the-house">
            <div class="card-img-top" style="background-image: url('<?php echo $houseImage[0]; ?>')"></div>
          </a>
          <div class="card-body">
            <h2>Help inside the house</h2>
            <p><?php the_field('house_description');?></p>
          </div>
          <a href="<?php echo get_home_url();?>/help-around-the-house">
            <div class="card-body card-footer">
                Get a quote <i class="fa fa-chevron-right"></i>
            </div>
          </a>
        </div>

      </div>

      <div class="col-md-4">

        <div class="card">
          <a href="<?php echo get_home_url();?>/in-the-garden">
            <div class="card-img-top" style="background-image: url('<?php echo $gardenImage[0]; ?>')"></div>
          </a>
          <div class="card-body">
            <h2>Help in the garden</h2>
            <p><?php the_field('garden_description');?></p>
          </div>
          <a href="<?php echo get_home_url();?>/in-the-garden">
            <div class="card-body card-footer">
                Get a quote <i class="fa fa-chevron-right"></i>
            </div>
          </a>
        </div>

      </div>

      <div class="col-md-4">

        <div class="card">
          <a href="<?php echo get_home_url();?>/about-me">
            <div class="card-img-top" style="background-image: url('<?php echo $aboutImage[0]; ?>')"></div>
          </a>
          <div class="card-body">
            <h2>Help for me</h2>
            <p><?php the_field('about_description');?></p>
          </div>
          <a href="<?php echo get_home_url();?>/about-me">
            <div class="card-body card-footer">
              Get a quote <i class="fa fa-chevron-right"></i>
            </div>
          </a>
        </div>

      </div>

    <!-- close first row-->
    </div>

<!-- close container -->
</div>

<div class="container card-container">

    <div class="row">

      <div class="col-md-4">

          <div class="card">
            <a href="<?php echo get_home_url();?>/out-and-about">
              <div class="card-img-top" style="background-image: url('<?php echo $outImage[0]; ?>')"></div>
            </a>
            <div class="card-body">
              <h2>Out & about</h2>
              <p><?php the_field('out_description');?></p>
            </div>
            <a href="<?php echo get_home_url();?>/out-and-about">
              <div class="card-body card-footer">
                Get a quote <i class="fa fa-chevron-right"></i>
              </div>
            </a>
          </div>

        </div>


        <div class="col-md-4">

          <div class="card">
            <a href="<?php echo get_home_url();?>/professional-advice">
              <div class="card-img-top" style="background-image: url('<?php echo $adviceImage[0]; ?>')"></div>
            </a>
            <div class="card-body">
              <h2>Professional advice</h2>
              <p><?php the_field('advice_description');?></p>
            </div>
            <a href="<?php echo get_home_url();?>/professional-advice">
              <div class="card-body card-footer">
                Get a quote <i class="fa fa-chevron-right"></i>
              </div>
            </a>
          </div>

        </div>

      <!-- close second row-->
      </div>



<!-- close container -->
</div>

<br />
<br />
<br />

<?php // close WP loop
  } // end while
} // end if
?>

<?php get_footer();?>
