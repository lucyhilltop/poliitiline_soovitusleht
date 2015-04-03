//siin failis tegeletakse kandidaatide info kuvamise asjadega, mis on js

var xmlHttp = createXmlHttpRequestObject();
//alert("js tootab");


function getData(id) {
		if (xmlHttp.readyState==0 || xmlHttp.readyState==4){
			xmlHttp.open("POST", 'ajax/data.php?ID='+id, true);
			xmlHttp.onreadystatechange = handleServerResponse;
			xmlHttp.send();
		}else{
			setTimeout('process()',1000);
		}
		
		
		
		
		//$.post('ajax/data.php', {ID:id}, function(data){
		//showContainer(data);
		
	}
	
	
function handleServerResponse() {
	if (xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			xmlResponse=xmlHttp.responseXML;
			xmlDocumentElement=xmlResponse.documentElement;
			message= xmlDocumentElement.firstChild.data;
			
			
			document.getElementById("nimi").innerHTML = message;
			
			alert(message);
			
			document.getElementById("nurkkonteiner").style.visibility="visible"
			
			setTimeout('process()',1000);
		}else{
			alert("22 midagi laks valesti...");
		}
			//alert((data));
			//muudame konteineri andmed oigeks
			/*
			document.getElementById("nimi").innerHTML = data;
			document.getElementById("number").innerHTML = data;
			document.getElementById("erakond").innerHTML = data;
			document.getElementById("kirjeldus").innerHTML = data;
			*/
		}
	}

	
//AJAXi jama
function createXmlHttpRequestObject(){
	var xmlHttp;
	if(window.ActiveXObject){
		try{
			xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}
	}else{
		try{
			xmlHttp= new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	
	if (!xmlHttp){
		alert("Midagi on halvasti!!");
	}else{
		return xmlHttp;
	}
	
}