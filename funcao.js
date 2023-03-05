function validaBusca(frm) {
	if (frm.op.value != "") {
		if (frm.busca.value == "" || frm.busca.value == null) {
			alert("Por favor, informe uma chave de busca");
			frm.busca.focus();
			return false;
		}
	}
	document.getElementById("formBusca").submit();
	return true;
}