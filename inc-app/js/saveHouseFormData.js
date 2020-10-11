//get & set house service selection data
jQuery(function(){

    jQuery('.houseData').each(function(){

        var state = JSON.parse( localStorage.getItem('.houseData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.houseData').each(function(){

        localStorage.setItem(
            '.houseData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});



function saveOtherState(){

  //set "houseHoursMore" value to local storage when submit button is clicked
  // problem with INT?
  var moreHoursVal = document.getElementById("houseHoursMore").value;
  localStorage.setItem('houseHoursMore', moreHoursVal);

  //set "otherServicesHouse" value to local storage when submit button is clicked
  var otherVal = document.getElementById("otherServicesHouse").value;
  localStorage.setItem('otherServicesHouse', otherVal);

  //set "houseHours" value to local storage when submit button is clicked
  var hoursVal = document.getElementById("houseHours").value;
  localStorage.setItem('houseHours', hoursVal);

}


jQuery(function(){

  //get local storage value for "houseHoursMore" and put in input field
  var moreHoursValue = localStorage.getItem('houseHoursMore');
  jQuery('#houseHoursMore').val(moreHoursValue);

  //get local storage value for "otherServicesHouse" and put in the form field
  var value = localStorage.getItem('otherServicesHouse');
  jQuery('#otherServicesHouse').val(value);
  console.log(value);

  //get local storage value for "houseHours" and put in hidden input field
  var hoursValue = localStorage.getItem('houseHours');
  jQuery('#houseHours').val(hoursValue);


});

//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesHouse');
  window.localStorage.removeItem('houseHours');

  jQuery(window).bind('unload', function(){

      jQuery('.houseData').each(function(){

          localStorage.setItem(
              '.houseData_' + this.id, JSON.stringify({checked: false})
          );
      });

    });

}
