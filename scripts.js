//validar datas
mensagemErroData = '* A Data Inicial não pode ser posterior a Data Final';

function validarDatas() {
	valorDataInicial = document.getElementById("dataInicial").value;
	valorDataFinal = document.getElementById("dataFinal").value;

	if(valorDataInicial != '' && valorDataFinal != ''){
		if(valorDataInicial<valorDataFinal){
			console.log('mostrar calendario');
			document.getElementById("mensagemTeste").innerHTML = '';
		}else{
			document.getElementById("mensagemTeste").innerHTML = mensagemErroData;
		}
	}
}

setInterval(validarDatas, 500);

//atualizar página
function displayCalendario(){
	valorDataInicial = document.getElementById("dataInicial").value;
	valorDataFinal = document.getElementById("dataFinal").value;

	if(valorDataInicial != '' && valorDataFinal != ''){
		if(valorDataInicial<valorDataFinal){
			var url = "http://localhost/calendario?dataInicial="+valorDataInicial+"&dataFinal="+valorDataFinal;
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", url, true);
			xhttp.onreadystatechange = function(){
			    if(xhttp.readyState == 4 && xhttp.status == 200){
			        document.body.innerHTML = xhttp.responseText;
			    }
			}
			xhttp.send();
		}
	}
}
