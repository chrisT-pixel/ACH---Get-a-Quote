//get & set about service selection data
jQuery(function(){

    jQuery('.aboutData').each(function(){

        var state = JSON.parse( localStorage.getItem('.aboutData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.aboutData').each(function(){

        localStorage.setItem(
            '.aboutData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});



function saveOtherState(){

  //set "aboutHoursMore" value to local storage when submit button is clicked
  // problem with INT?
  var moreHoursVal = document.getElementById("aboutHoursMore").value;
  localStorage.setItem('aboutHoursMore', moreHoursVal);

  //set "otherServices" value to local storage when submit button is clicked
  var otherVal = document.getElementById("otherServicesAbout").value;
  localStorage.setItem('otherServicesAbout', otherVal);

  //set "aboutHours" value to local storage when submit button is clicked
  var hoursVal = document.getElementById("aboutHours").value;
  localStorage.setItem('aboutHours', hoursVal);

}


jQuery(function(){

  //get local storage value for "aboutHoursMore" and put in input field
  var moreHoursValue = localStorage.getItem('aboutHoursMore');
  jQuery('#aboutHoursMore').val(moreHoursValue);

  //get local storage value for "otherServicesAbout" and put in the form field
  var value = localStorage.getItem('otherServicesAbout');
  jQuery('#otherServicesAbout').val(value);
  console.log(value);

  //get local storage value for "aboutHours" and put in hidden input field
  var hoursValue = localStorage.getItem('aboutHours');
  jQuery('#aboutHours').val(hoursValue);


});

//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesAbout');
  window.localStorage.removeItem('aboutHours');

  jQuery(window).bind('unload', function(){

      jQuery('.aboutData').each(function(){

          localStorage.setItem(
              '.aboutData_' + this.id, JSON.stringify({checked: false})
          );
      });

    });

}
