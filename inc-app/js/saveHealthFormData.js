//get & set health service selection data
jQuery(function(){

    jQuery('.healthData').each(function(){

        var state = JSON.parse( localStorage.getItem('.healthData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.healthData').each(function(){

        localStorage.setItem(
            '.healthData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});



function saveOtherState(){

  //set "healthHoursMore" value to local storage when submit button is clicked
  var moreHoursVal = document.getElementById("healthHoursMore").value;
  localStorage.setItem('healthHoursMore', moreHoursVal);

  //set "otherServices" value to local storage when submit button is clicked
  var otherVal = document.getElementById("otherServicesHealth").value;
  localStorage.setItem('otherServicesHealth', otherVal);

  //set "healthHours" value to local storage when submit button is clicked
  var hoursVal = document.getElementById("healthHours").value;
  localStorage.setItem('healthHours', hoursVal);

}


jQuery(function(){

  //get local storage value for "healthHoursMore" and put in input field
  var moreHoursValue = localStorage.getItem('healthHoursMore');
  jQuery('#healthHoursMore').val(moreHoursValue);

  //get local storage value for "otherServiceshealth" and put in the form field
  var value = localStorage.getItem('otherServicesHealth');
  jQuery('#otherServicesHealth').val(value);
  console.log(value);

  //get local storage value for "healthHours" and put in hidden input field
  var hoursValue = localStorage.getItem('healthHours');
  jQuery('#healthHours').val(hoursValue);


});

//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesHealth');
  window.localStorage.removeItem('healthHours');

  jQuery(window).bind('unload', function(){

      jQuery('.healthData').each(function(){

          localStorage.setItem(
              '.healthData_' + this.id, JSON.stringify({checked: false})
          );
      });

    });

}
