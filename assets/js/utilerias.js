$(document).ready(function() {
	$('.ocultar').live('click', function() {
		$(this).slideUp();
	});
	
	$('.eliminar').live('click', function() {
		return confirm('¿Está seguro de eliminar el registro?');
	});
	
	$('.eliminar_con_nombre').live('click', function() {
		var nombre = $(this).attr('name');
		
		return confirm('¿Está seguro de eliminar el registro ' + nombre + '?');
	});
	
	$('.cancelar').live('click', function() {
		return confirm('¿Está seguro de cancelar el registro?');
	});
	
	$('.cancelar_con_nombre').live('click', function() {
		var nombre = $(this).attr('name');
		
		return confirm('¿Está seguro de cancelar el registro ' + nombre + '?');
	});
	
	$('.desactivar').live('click', function() {
		return confirm('¿Está seguro de desactivar el registro?');
	});
	
	$('.desactivar_con_nombre').live('click', function() {
		var nombre = $(this).attr('name');
		
		return confirm('¿Está seguro de desactivar el registro ' + nombre + '?');
	});
	
		
	$('.solo_coordenadas').live('keydown', function(e) {
		console.log(e.keyCode);
		if (e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 46 || e.keyCode == 13 || e.keyCode == 16 || (e.keyCode >= 35 && e.keyCode <= 40) || (e.keyCode == 190 || e.keyCode == 110 || e.keyCode == 109 || e.keyCode == 189))
			return true;
		else 
			if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105))
				return false;
	});
	
	
	$('.solo_numeros').live('keydown', function(e) {
		if (e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 46 || e.keyCode == 13 || e.keyCode == 16 || (e.keyCode >= 35 && e.keyCode <= 40))
			return true;
		else 
			if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105))
				return false;
	});
	
	$('.cantidad').live('keydown', function(e) {
		if (e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 46 || e.keyCode == 13 || e.keyCode == 16 || (e.keyCode >= 35 && e.keyCode <= 40) || (e.keyCode == 190 || e.keyCode == 110))
			return true;
		else 
			if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105))
				return false;
	});
	
});

jQuery.fn.valInt = function() {
	if (isNaN(parseInt($(this).val())))
		return 0;
	else
		return parseInt($(this).val());
};

jQuery.fn.valFloat = function() {
	if (isNaN(parseFloat($(this).val()))) 
		return 0;
	else
		return parseFloat($(this).val());
};

jQuery.fn.reset = function () {
	$(this).each(function() {
		this.reset();
	});
};

function seleccionar_opcion(id, valor)
{
	$(id + ' option[value="' + valor + '"]').attr("selected", "selected");
}

function mostrar_mensaje(mensaje, tipo)
{	
	$('html, body').animate({ scrollTop: 0 }, 'slow');
	
	$('#mensaje_texto').html(mensaje);
	$('#mensaje_servidor').removeClass('alert-danger').removeClass('alert-success');
	$('#mensaje_servidor').addClass(tipo);
	$('#mensaje_servidor').slideDown();
}

/*Funciones de PHP*/
function str_pad(input, pad_length, pad_string, pad_type)
{
	var half = '',
	pad_to_go;
	
	var str_pad_repeater = function(s, len)
	{
		var collect = '';
		
		while(collect.length < len)
			collect += s;
		
		collect = collect.substr(0, len);
		
		return collect;
	};
	
	input += '';
	pad_string = pad_string !== undefined ? pad_string : ' ';
	
	if (pad_type !== 'STR_PAD_LEFT' && pad_type !== 'STR_PAD_RIGHT' && pad_type !== 'STR_PAD_BOTH')
		pad_type = 'STR_PAD_RIGHT';
	if ((pad_to_go = pad_length - input.length) > 0)
	{
		if (pad_type === 'STR_PAD_LEFT')
			input = str_pad_repeater(pad_string, pad_to_go) + input;
		else if (pad_type === 'STR_PAD_RIGHT')
			input = input + str_pad_repeater(pad_string, pad_to_go);
		else if (pad_type === 'STR_PAD_BOTH')
		{
			half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
			input = half + input + half;
			input = input.substr(0, pad_length);
		}
	}
	
	return input;
}

function number_format(number, decimals, dec_point, thousands_sep)
{
	number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	
	var n = !isFinite(+number) ? 0 : + number,
	prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	s = '',
	toFixedFix = function(n, prec) {
		var k = Math.pow(10, prec);
		
		return '' + (Math.round(n * k) / k).toFixed(prec);
	};
	
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	
	if (s[0].length > 3)
	{
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	
	if ((s[1] || '').length < prec)
	{
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	
	return s.join(dec);
}

function restar_horas(v1, v2)
{

	horas1=v1.split(":"); /*Mediante la función split separamos el string por ":" y lo convertimos en array. */
	horas2=v2.split(":");
	horatotale=new Array();
	
	for(a=0;a<3;a++) /*bucle para tratar la hora, los minutos y los segundos*/
	{

		horas1[a]=(isNaN(parseInt(horas1[a])))?0:parseInt(horas1[a]); /*si horas1[a] es NaN lo convertimos a 0, sino convertimos el valor en entero*/
		horas2[a]=(isNaN(parseInt(horas2[a])))?0:parseInt(horas2[a]);
		horatotale[a]=(horas1[a]-horas2[a]);/* insertamos la resta dentro del array horatotale[a].*/

	}
	
	horatotal=new Date();  /*Instanciamos horatotal con la clase Date de javascript para manipular las horas*/
	horatotal.setHours(horatotale[0]); /* En horatotal insertamos las horas, minutos y segundos calculados en el bucle*/
	horatotal.setMinutes(horatotale[1]);
	horatotal.setSeconds(horatotale[2]);
	return horatotal.getHours();//+":"+horatotal.getMinutes()+":"+horatotal.getSeconds();
	/*Devolvemos el valor calculado en el formato hh:mm:ss*/

}