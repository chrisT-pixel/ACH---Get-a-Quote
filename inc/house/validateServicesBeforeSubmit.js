jQuery("#houseSelection").on("submit",function(e){


    if ((jQuery("input[class*='houseData']:checked").length)<=0) {

        alert("You must choose at least one service before proceeding");
        e.preventDefault();
    }

    else if(!jQuery('.hours-group').find('div').hasClass('selected')){

      alert("You must select the number of hours required before proceeding");
      e.preventDefault();

    }

    else if(!jQuery('.frequency-group').find('div').hasClass('selected')){

      alert("You must select the frequency before proceeding");
      e.preventDefault();

    }

    /*else if(jQuery('.hoursSelectMore').hasClass('selected') && jQuery('.hoursMore').val() != "hi"){

      alert("You must select the additional hours required before proceeding");
      e.preventDefault();

    }*/

  /*  else if(jQuery('.hours-group').find('#houseMore').hasClass('selected')){

      alert("You must select the extra hours required before proceeding");
      e.preventDefault();

    }*/


    return true;
});
