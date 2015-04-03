//siin failis tegeletakse kandidaatide info kuvamise asjadega, mis on js

var xmlHttp = createXmlHttpRequestObject();
//alert("js tootab");


function getData(id) {
		if (xmlHttp.readyState==0 || xmlHttp.readyState==4){
			var param= "ID="+id;
			var url= 'ajax/data.php';
			
			xmlHttp.open("POST", url, true);
			xmlHttp.onreadystatechange = handleServerResponse;
			
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.setRequestHeader("Content-length", param.length);
			xmlHttp.setRequestHeader("Connection", "close");

			xmlHttp.send(param);
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
			//message= xmlDocumentElement.firstChild.data;
			
			message= xmlDocumentElement.childNodes;
			
			document.getElementById("KNimi").innerHTML = message[1].firstChild.nodeValue;
			document.getElementById("KNumber").innerHTML = "nr "+message[2].firstChild.nodeValue;
			document.getElementById("KErakond").innerHTML = message[3].firstChild.nodeValue;
			document.getElementById("KKirjeldus").innerHTML = message[4].firstChild.nodeValue;
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