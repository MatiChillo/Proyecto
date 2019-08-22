// 1. Capturo al select de países
var paises = document.querySelector('[name=pais]');

fetch('https://restcountries.eu/rest/v2/all')
	.then(function (response) {
		return response.json();
	})
	.then(function (config) {
		for (var pais of config) {
			paises.innerHTML += `<option value="${pais.alpha2Code}">${pais.name}</option>`;
		}
	})
	.catch(function (error) {
		console.log(error);
	});


	var provincias = document.querySelector('[name=provincia]');
	var optionPais = document.querySelector('option');

			// // if([value=AR]){
			// 	return
				fetch('https://dev.digitalhouse.com/api/getProvincias')
					.then(function (response) {
						return response.json();
					})
					.then(function (config) {
						for (var provincia of config) {
							provincias.innerHTML += `<option value="${provincia.1.state}">${provincia.1.state}</option>`;
							console.log(provincia.state);
						}
					})
					.catch(function (error) {
						console.log(error);
					});

			//};


// Forma de insertar países al select - long version
/*
	var elOption = document.createElement('option');
	var nombrePais = document.createTextNode(pais.name)
	elOption.value = pais.alpha2Code;
	elOption.append(nombrePais);
	selectPaises.appendChild(elOption);
*/

// Forma de insertar países al select - short version
// selectPaises.innerHTML += '<option value=' + pais.alpha2Code + '>' + pais.name + '</option>';


// {"status":200,"data":[{"state":"Capital Federal","country":"Argentina"},
// {"state":"Buenos Aires","country":"Argentina"},
// {"state":"Catamarca","country":"Argentina"},
// {"state":"Chaco","country":"Argentina"},
// {"state":"Chubut","country":"Argentina"},
// {"state":"Cordoba","country":"Argentina"},
// {"state":"Corrientes","country":"Argentina"},
// {"state":"Entre Rios","country":"Argentina"},
// {"state":"Formosa","country":"Argentina"},
// {"state":"Jujuy","country":"Argentina"},
// {"state":"La Pampa","country":"Argentina"},
// {"state":"La Rioja","country":"Argentina"},
// {"state":"Mendoza","country":"Argentina"},
// {"state":"Misiones","country":"Argentina"},
// {"state":"Neuquen","country":"Argentina"},
// {"state":"Rio Negro","country":"Argentina"},
// {"state":"Salta","country":"Argentina"},
// {"state":"San Juan","country":"Argentina"},
// {"state":"San Luis","country":"Argentina"},
// {"state":"Santa Cruz","country":"Argentina"},
// {"state":"Santa Fe","country":"Argentina"},
// {"state":"Santiago del Estero","country":"Argentina"},
// {"state":"Tierra del Fuego","country":"Argentina"}],
// "meta":{"count":23,"state":"Tucuman","country":"Argentina"}}
