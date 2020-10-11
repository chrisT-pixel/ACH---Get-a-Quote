jQuery("#outSelection").on("submit",function(e){

    if ((jQuery("input[class*='outData']:checked").length)<=0) {

        alert("You must choose at least one service before proceeding");
        //$outValidated = false;
        e.preventDefault();

    }

    return true;
});
