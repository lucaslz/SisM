//Só é acionado quando apagina carregar
$(document).ready(function() {
	$("#tabelaGeral").DataTable({
		"language": {
			"url": "Portuguese-Brasil.json"
		}
	});
});

/**
 * Controla a ativacao de link
 */
var dLink = function () {
	$(this).addClass('active');
};