<?php if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Set locale to Australia for currency output -->
  <?php setlocale(LC_ALL, 'en_AU.UTF-8'); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/9615cb55a7.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- Google Recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-15749405-40"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-15749405-40');
  </script>


	<?php wp_head(); ?>
</head>

<body>

	<header id="internal-header">

  <div class="top-bar">

      <div class="container">

        <div class="row pull-right">

          <div class="top-bar-content">

            <a id="phone-num" href="tel:1300224477"><i class="fa fa-phone"></i> 1300 224 477</a>

            <a id="int-link" href="https://achgroup.org.au/information-and-advice/interpreter-services/" target="_blank">INTERPRETER</a>

          </div>

        </div>

      </div>

    </div>

  <div class="container header-container">

    <div class="row">

      <div class="img-container">

        <a href="<?php echo get_home_url();?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ach-logo.png" class="img-responsive"/>
        </a>

      </div>

      <div class="nav-box">

        <p id="first-nav"><a href="https://achgroup.org.au/">Home<br />&nbsp;</a></p>

        <p id="second-nav"><a href="<?php echo get_home_url();?>">Get a quote<br />home</a></p>

      </div>

    </div>

  </div>

</header>
