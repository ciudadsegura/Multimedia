// JavaScript Document

	function validar_numero_maximo(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());


		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo || valor > maximo)
		{
			$(id_mensaje).html("El valor del campo se debe encontrar entre [ "+minimo+" ] y [ "+maximo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}

		if(entero)
		{
			var objRegExp  = /(^-?\d\d*$)/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser entero");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_numero_maximo_(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		var maximo = parseFloat($(maximo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor > maximo)
		{
			$(id_mensaje).html("El valor del campo  debe ser menor a [ "+maximo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}

		if(entero)
		{
			var objRegExp  = /(^-?\d\d*$)/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser entero");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_numero_maximo_stock(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());


		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo || valor > maximo)
		{
			$(id_mensaje).html("El valor del campo se debe encontrar entre [ "+minimo+" ] y [ "+maximo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}

		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser valido");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_numero_minimo_stock(id_campo, id_mensaje, minimo, maximo)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		var minimo1 = parseFloat($(minimo).val());
		var maximo1 = parseFloat($(maximo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo1 || valor > maximo1  )
		{
			$(id_mensaje).html("El valor del campo se debe encontrar entre [ "+minimo1+" ] y [ "+maximo1+" ]  ");
			$(id_mensaje).slideDown();
			return false;
		}

		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser valido");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_positivos_negativos(id_campo, id_mensaje)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		var objRegExp  = /^-?[0-9]+([.][0-9]*)?$/;
		if(!objRegExp.test($(id_campo).val()))
		{
			$(id_mensaje).html("El valor del campo debe ser numerico y positivo o negativo");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}


	function validar_numero(id_campo, id_mensaje, minimo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo  debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}
		if(entero)
		{
			var objRegExp  = /(^-?\d\d*$)/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser entero");
				$(id_mensaje).slideDown();
				return false;
			}
		}
		$(id_mensaje).slideUp();
		return true;
	}

	function validar_moneda(id_campo, id_mensaje, minimo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}
		if(entero)
		{
			// var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;
			var objRegExp  = /(^-?\d\d*$)/;

			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo no tiene el formato correcto");
				$(id_mensaje).slideDown();
				return false;
			}
		}
		$(id_mensaje).slideUp();
		return true;
	}
	function validar_moneda_cero(id_campo, id_mensaje, minimo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}
		if(valor == 0)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a 0" );

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}
		if(valor < 0)
		{
			$(id_mensaje).html("El valor del campo debe ser positivo" );

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}
		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;

			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo no tiene el formato correcto");
				$(id_mensaje).slideDown();
				return false;
			}
		}
		$(id_mensaje).slideUp();
		return true;
	}

	function validar_moneda_max(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		var cadena = $.trim($(id_campo).val());

		if(cadena.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor o igual a " + minimo);

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(valor > maximo)
		{
			$(id_mensaje).html("El valor del campo debe ser menor o igual a " + maximo);

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;

			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo no tiene el formato correcto");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();

		return true;
	}
	function validar_moneda_max_renta(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		var cadena = $.trim($(id_campo).val());

		if(cadena.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor == 0)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a 0" );

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}
		if(valor < 0)
		{
			$(id_mensaje).html("El valor del campo debe ser positivo" );

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor o igual a " + minimo);

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(valor > maximo)
		{
			$(id_mensaje).html("El valor del campo debe ser menor o igual a " + maximo);

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}

		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;

			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo no tiene el formato correcto");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();

		return true;
	}

	function validar_moneda_min(id_campo, id_mensaje, minimo,  entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		var cadena = $.trim($(id_campo).val());

		if(cadena.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser  igual a " + minimo);

			if(!$(id_mensaje).is(":visible")) {
				$(id_mensaje).slideDown();
			}

			return false;
		}


		if(entero)
		{
			var objRegExp  = /^[0-9]{1,12}(?:\.[0-9]{1,2})?$/;

			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo no tiene el formato correcto");
				$(id_mensaje).slideDown();
				return false;
			}
		}

		$(id_mensaje).slideUp();

		return true;
	}


	function validar_numero_float(id_campo, id_mensaje, minimo)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}


		$(id_mensaje).slideUp();
		return true;
	}

	function validar_texto(id_campo, id_mensaje, minimo, maximo)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor.length < minimo || valor.length > maximo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, entre "+minimo+" y "+maximo+" caracteres");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_texto_sin_true(id_campo, id_mensaje, minimo, maximo)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor.length < minimo || valor.length > maximo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, entre "+minimo+" y "+maximo+" caracteres");
			$(id_mensaje).slideDown();
			return false;
		}
		$(id_mensaje).slideUp();
	}

	function validar_texto_minimo(id_campo, id_mensaje, minimo)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		if(valor.length < minimo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, mínimo " + minimo + " caracteres");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_email(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		var objRegExp  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("La direcci&oacute;n de correo electr&oacute;nico  proporcionada no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_rfc(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		//var objRegExp  = /^[A-Z&]{3,4}[0-9]{6}[A-Z0-9]{3}$/;
		var objRegExp  = /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$/;


		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_rfc_fisica(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		var objRegExp  = /^[A-Z&]{4}[0-9]{6}[A-Z0-9]{3}$/;


		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_rfc_moral(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());

		var objRegExp  = /^[A-Z&]{3}[0-9]{6}[A-Z0-9]{3}$/;

		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

	function validar_distintos(id_campo1, id_campo2)
	{
		var valor1  = $(id_campo1).val();
		var valor2  = $(id_campo2).val();

		if(valor1 <= valor2 || valor1 == '0' || valor2 == '0')
		{
			return false;
		}

		return true;
	}

	function validar_password(id_campo1, id_campo2, id_mensaje)
	{
		var valor1  = $(id_campo1).val();
		var valor2  = $(id_campo2).val();

		if(valor1 != valor2)
		{
			$(id_mensaje).html("Los passwords no coinciden");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}

    function validar_seleccion(id_campo, id_mensaje)
	{
		var valor  = $(id_campo).val();

		if(valor == 0 || valor == null)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}
	
	function error_personalizado(id_campo, id_mensaje, mensaje, valido)
	{
		if (!valido)
		{
			$(id_mensaje).html(mensaje);
			$(id_mensaje).slideDown();
		}
		else
		{
			$(id_mensaje).slideUp();
		}
	}
	
	function seleccionar_option(campo, valor)
	{
		$(campo+' option[value="'+valor+'"]').attr('selected','selected');
	}

	function numero(id_campo)
	{
		$(id_campo).keydown(function(event) {

			if(event.shiftKey)
			{
				event.preventDefault();
			}



			if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode ==9 || event.keyCode == 13 || event.keyCode == 16 || event.keyCode == 17 || event.keyCode == 18 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40 || event.keyCode == 190 || event.keyCode == 110)
			{
			}
			else
			{
				if (event.keyCode < 95)
				{
					if (event.keyCode < 48 || event.keyCode > 57 )
					{

						event.preventDefault();
					}
				}
				else
				{
					if (event.keyCode < 96 || event.keyCode > 105)
					{
						event.preventDefault();
					}
				}
			}
		});
	}
	function solo_numero(id_campo)
	{
		$(id_campo).keydown(function(event) {

			if(event.shiftKey)
			{
				event.preventDefault();
			}



			if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode ==9 || event.keyCode == 13 || event.keyCode == 16 || event.keyCode == 17 || event.keyCode == 18 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40 )
			{
			}
			else
			{
				if (event.keyCode < 95)
				{
					if (event.keyCode < 48 || event.keyCode > 57 )
					{

						event.preventDefault();
					}
				}
				else
				{
					if (event.keyCode < 96 || event.keyCode > 105)
					{
						event.preventDefault();
					}
				}
			}
		});
	}

	function numero_ajuste(id_campo)
	{
		$(id_campo).keydown(function(event) {

			if(event.shiftKey)
			{
				event.preventDefault();
			}

			if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode ==9 || event.keyCode == 13 || event.keyCode == 16 || event.keyCode == 17 || event.keyCode == 18 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40 || event.keyCode == 116 || event.keyCode == 189 || event.keyCode == 110 || event.keyCode == 109 || event.keyCode == 190)
			{
			}
			else
			{
				if (event.keyCode < 95)
				{
					if (event.keyCode < 48 || event.keyCode > 57 )
					{

						event.preventDefault();
					}
				}
				else
				{
					if (event.keyCode < 96 || event.keyCode > 105)
					{
						event.preventDefault();
					}
				}
			}
		});
	}
	
	function validar_nombre_usuario(id_campo, id_mensaje)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());

		var objRegExp  = /^[a-zA-Z0-9_-]+$/;
		if(!objRegExp.test($(id_campo).val()))
		{
			$(id_mensaje).html("El nombre de usuario no es válido");
			$(id_mensaje).slideDown();
			return false;
		}

		$(id_mensaje).slideUp();
		return true;
	}


	/*$('.moneda').live('keydown', function(e) {
		if (e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 46 || e.keyCode == 13 || e.keyCode == 16 || (e.keyCode >= 35 && e.keyCode <= 40) || (e.keyCode == 190 || e.keyCode == 110))
			return true;
		else
			if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105))
				return false;
	});

*/


