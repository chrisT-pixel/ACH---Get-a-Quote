//get & set professional service selection data
jQuery(function(){

    jQuery('.professionalData').each(function(){

        var state = JSON.parse( localStorage.getItem('.professionalData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.professionalData').each(function(){

        localStorage.setItem(
            '.professionalData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});

jQuery(function(){

  //get local storage value for "otherServicesProfessional" and put in the form field
  var value = localStorage.getItem('otherServicesProfessional');
  jQuery('#otherServicesProfessional').val(value);

});


//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesProfessional');
  window.localStorage.removeItem('professionalHours');

  jQuery(window).bind('unload', function(){

      jQuery('.professionalData').each(function(){

          localStorage.setItem(
              '.professionalData_' + this.id, JSON.stringify({checked: false})
          );
      });

    });

}
