//get & set garden service selections data
jQuery(function(){

  jQuery('.gardenData').each(function(){

        var state = JSON.parse( localStorage.getItem('.gardenData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.gardenData').each(function(){

        localStorage.setItem(
            '.gardenData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});



function saveOtherState(){

  //set "gardenHoursMore" value to local storage when submit button is clicked
  // problem with INT?
  var moreHoursVal = document.getElementById("gardenHoursMore").value;
  localStorage.setItem('gardenHoursMore', moreHoursVal);

  //set "otherServices" value to local storage when submit button is clicked
  var otherVal = document.getElementById("otherServicesGarden").value;
  localStorage.setItem('otherServicesGarden', otherVal);

  //set "gardenHours" value to local storage when submit button is clicked
  var hoursVal = document.getElementById("gardenHours").value;
  localStorage.setItem('gardenHours', hoursVal);



}


jQuery(function(){

  //get local storage value for "gardenHoursMore" and put in input field
  var moreHoursValue = localStorage.getItem('gardenHoursMore');
  jQuery('#gardenHoursMore').val(moreHoursValue);

  //get local storage value for "otherServices" and put in textarea field
  var otherServicesValue = localStorage.getItem('otherServicesGarden');
  jQuery('#otherServicesGarden').val(otherServicesValue);

  //get local storage value for "gardenHours" and put in hidden input field
  var hoursValue = localStorage.getItem('gardenHours');
  jQuery('#gardenHours').val(hoursValue);



});


//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesGarden');
  window.localStorage.removeItem('gardenHours');
  window.localStorage.removeItem('gardenHoursMore');

  jQuery(window).bind('unload', function(){

      jQuery('.gardenData').each(function(){

          localStorage.setItem(
              '.gardenData_' + this.id, JSON.stringify({checked: false})
          );
      });


    });

}
