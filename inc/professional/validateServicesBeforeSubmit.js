jQuery("#professionalSelection").on("submit",function(e){

    if ((jQuery("input[class*='professionalData']:checked").length)<=0) {

        alert("You must choose at least one service before proceeding");
        e.preventDefault();
    }
 
    return true;
});
