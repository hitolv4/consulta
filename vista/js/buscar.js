$(document).ready(function(){

});

function Basegurado(){
	
	var tipo=$('input#tipo').val();
	var ci=$('input#ci').val();
	$.ajax({
		type:"POST",
		url:"../modulos/consultarasegurado.php",
		data:{tipo:tipo,ci:ci},
		success: function(data){

			var obj = JSON.parse(data);
			$("input#nombre").val(obj[0]["NOMTER"]+" "+obj[0]["APETER"]);
			if (obj) {
				$("#tbodypol").empty();
					for (var i = 0; i < obj[1].STSASEG.length; i++) {
				

						$("#tablapol").append("<tr>"+"<td>"+obj[1].STSASEG[i]+"</td>"+"<td>"+obj[1].CODPOL[i]+"</td>"+"<td>"+obj[1].NUMPOL[i]+"</td>"+"<td>"+obj[1].FECINIVIG[i]+"</td>"+"<td>"+obj[1].FECFINVIG[i]+"</td>"+"<td>"+obj[1].IDEPOL[i]+"</td>"+"<td>"+"<button type='button' id='botcer"+[i]+"' value='"+obj[1].IDEPOL[i]+"' class='btn btn-default' onclick='Bcertificado("+[i]+");'>"+"<span class='glyphicon glyphicon-list' >"+"</span>"+"</button>"+"</td>"+"</th>");
					}

			}


		}

	})

	
}

function Bcertificado(i){
	var poliza=$('button#botcer'+[i]).val();
	$.ajax({
		type:"POST",
		url:"../modulos/certificados.php",
		data:{poliza:poliza},
		success: function(data1){
			
			var objcer = JSON.parse(data1);
			$("#tbodycer").empty();
			$("#tbodyram").empty();
			if (objcer) {
				for (var i = 0; i < objcer[0].STSCERT.length; i++) {
					$("#tablacer").append("<tr>"+"<td>"+objcer[0].STSCERT[i]+"</td>"+"<td>"+objcer[0].NUMCERT[i]+"</td>"+"<td>"+objcer[0].CODCLIFACT[i]+"</td>"+"<td>"+objcer[0].DESCCERT[i]+"</td>"+"<td>"+objcer[0].FECING[i]+"</td>"+"<td>"+objcer[0].FECEXC[i]+"</td>"+"<td>"+"</th>");
					$("#tablaram").append("<tr>"+"<td>"+objcer[0].STSCERTRAMO[i]+"</td>"+"<td>"+objcer[0].CODRAMOCERT[i]+"</td>"+"<td>"+objcer[0].DESCRIP[i]+"</td>"+"<td>"+objcer[0].FECEXC[i]+"</td>"+"<td>"+objcer[0].CODPLAN[i]+"</td>"+"<td>"+objcer[0].REVPLAN[i]+"</td>"+"<td>"+objcer[0].DESCPLANPROD[i]+"</td>"+"</th>");
					for (var i = 0; i < objcer[1].STSASEG.length; i++) {
						$("#tablaase").append("<tr>"+"<td>"+objcer[1].STSASEG[i]+"</td>"+"<td>"+objcer[1].NUMID[i]+"</td>"+"<td>"+objcer[1].NOMTER[i]+" "+objcer[1].APETER[i]+"</td>"+"<td>"+"</td>"+"<td>"+objcer[1].FECNAC[i]+"</td>"+"<td>"+objcer[1].FECING[i]+"</td>"+"<td>"+objcer[1].DESCRIP[i]+"</td>"+"<td>"+objcer[1].IDEASEG[i]+"</td>"+"</tr>")
					}
				}
			}

				function getAge(dateString) {
    			var today = new Date();
    			var birthDate = new Date(dateString);
    			var age = today.getFullYear() - birthDate.getFullYear();
    			var m = today.getMonth() - birthDate.getMonth();
    				if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        				age--;
    				}
    					return age;
				}
console.log('fecha: ' + objcer[1].FECING[1])
			
			
		}

	})

}





