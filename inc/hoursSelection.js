jQuery(document).ready(function(){

  jQuery('.radio-group .radio').click(function(){

    jQuery(this).parent().find('.radio').removeClass('selected');
    jQuery(this).addClass('selected');

    var val = jQuery(this).attr('data-value');

    jQuery(this).parent().find('input').val(val);

  });

});
