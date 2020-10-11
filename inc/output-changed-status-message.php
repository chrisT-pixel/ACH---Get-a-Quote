<!-- OUTPUT MESSAGE IF SERVICE CHOICES HAVE BEEN UPDATED -->
<?php if(isset($_GET['updated'])){ ?>

  <div class="alert-container">

    <div class="alert alert-success" role="alert" id="alert">
      <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Service Selections Added / Updated!
    </div>

  </div>

<?php } ?>

<!-- OUTPUT MESSAGE IF ALL SERVICE CHOICES HAVE BEEN REMOVED -->
<?php if(isset($_GET['removed'])){ ?>

  <div class="alert-container">

    <div class="alert alert-warning" role="alert" id="alert">
      <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> Services Removed from Plan!
    </div>

  </div>

<?php } ?>
