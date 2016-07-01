$(document).ready(function(){

	$('.autoF').focus();
	
	$('.hide').live('click', function(){
		$(this).fadeOut(500);
	});
	
	$('.confirm').live('click', function(){
		return confirm('¿Esta seguro de realizar la operación?');
	});
	
	$('.datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		showAnim: 'drop',
		yearRange: '1950:2015'
	});
	
	$('#desde').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		showAnim: 'drop',
		onSelect: function( selectedDate ) {
			$( "#hasta" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$('#hasta').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		showAnim: 'drop',
		onSelect: function( selectedDate ) {
			$( "#desde" ).datepicker( "option", "maxDate", selectedDate );
		}
	});

	//$('.tooltip').tipsy({gravity: 'sw'});
});

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}

jQuery.fn.valInt = function() {
	if( isNaN( parseInt($(this).val()) ) ) return 0;
	else return parseInt($(this).val());
}

jQuery.fn.valFloat = function() {
	if( isNaN( parseFloat($(this).val()) ) ) return 0;
	else return parseFloat($(this).val());
}

jQuery.fn.spin = function(opts) {
  this.each(function() {
    var $this = $(this),
        data = $this.data();

    if (data.spinner) {
      data.spinner.stop();
      delete data.spinner;
    }
    if (opts !== false) {
      data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
    }
  });
  return this;
};

function seleccionar_combo(id, valor)
{
	$('#'+id+' option[value='+valor+']').attr("selected", "selected");
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}