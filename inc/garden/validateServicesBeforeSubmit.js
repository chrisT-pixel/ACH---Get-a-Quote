jQuery("#gardenSelection").on("submit",function(e){

    if ((jQuery("input[class*='gardenData']:checked").length)<=0) {

        alert("You must choose at least one service before proceeding");
        e.preventDefault();
    }

    else if(!jQuery('.hours-group').find('div').hasClass('selected')){

      alert("You must select the number of hours required before proceeding");
      e.preventDefault();

    }

    else if(!jQuery('.frequency-group').find('div').hasClass('selected')){

      alert("You must select the frequency required before proceeding");
      e.preventDefault();

    }

    return true;
});
