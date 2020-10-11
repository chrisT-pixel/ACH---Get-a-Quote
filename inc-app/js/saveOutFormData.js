//get & set out service selection data
jQuery(function(){

  jQuery('.outData').each(function(){

        var state = JSON.parse( localStorage.getItem('.outData_'  + this.id) );

        if (state) this.checked = state.checked;
    });
});

jQuery(window).bind('unload', function(){

    jQuery('.outData').each(function(){

        localStorage.setItem(
            '.outData_' + this.id, JSON.stringify({checked: this.checked})
        );
    });


});

jQuery(function(){

  //get local storage value for "otherServicesOut" and put in the form field
  var value = localStorage.getItem('otherServicesOut');
  jQuery('#otherServicesOut').val(value);

});

//remove all local storage when approprate button clicked
function removeAllStates(){

  window.localStorage.removeItem('otherServicesOut');

  jQuery(window).bind('unload', function(){

      jQuery('.outData').each(function(){

          localStorage.setItem(
              '.outData_' + this.id, JSON.stringify({checked: false})
          );
      });

    });

}
