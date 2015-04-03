//siin failis tegeletakse kandidaatide info kuvamise asjadega, mis on js


var xmlHttp = createXmlHttpRequestObject();



//aktiveerub Kandidaatide nimekirjale vajutades, saadab AJAXiga p'ringu andmete saamiseks
function getDataKandi(id) {
	var url= 'ajax/KandiData.php';
	var param= "ID="+id;
	
	getData(param,url)
	
}

//aktiveerub Soovitajate nimekirjale vajutades, saadab AJAXiga p'ringu andmete saamiseks
function getDataSoov(id) {
	var url= 'ajax/SoovitData.php';
	var param= "ID="+id;
	
	getData(param,url)
}

function getData(param,url) {
	if (xmlHttp.readyState==0 || xmlHttp.readyState==4){

		xmlHttp.open("POST", url, true);
		xmlHttp.onreadystatechange = handleServerResponseKandi;
		
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.setRequestHeader("Content-length", param.length);
		xmlHttp.setRequestHeader("Connection", "close");

		xmlHttp.send(param);
	}else{
		setTimeout('process()',1000);
	}
}

	
//Kui andmebaas on vastanud p'ringule, siis see meetod tegeleb tulemiga
function handleServerResponseKandi() {
	if (xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			xmlResponse=xmlHttp.responseXML;
			xmlDocumentElement=xmlResponse.documentElement;
			
			data= xmlDocumentElement.childNodes;
			
			//lisatakse andmed konteinerisse
			document.getElementById("KNimi").innerHTML = data[1].firstChild.nodeValue;
			document.getElementById("KNumber").innerHTML = "nr "+data[2].firstChild.nodeValue;
			document.getElementById("KErakond").innerHTML = data[3].firstChild.nodeValue;
			document.getElementById("KKirjeldus").innerHTML = data[4].firstChild.nodeValue;
			
			//tuuakse nahtavale konteiner
			document.getElementById("nurkkonteiner").style.visibility="visible"
			
			setTimeout('process()',1000);
		}else{
			alert("Soovitajates see veel ei toota/ midagi laks valesti...");
		}
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