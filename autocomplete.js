
function autoC(){
	alert("hola");
	$(document).ready(function () {
		var items = <?= json_encode($array) ?>;
		$("#busqueda").autocomplete({
			source: items,
		});
	});
}