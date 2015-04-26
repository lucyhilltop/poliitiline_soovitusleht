//siin failis tegeletakse kandidaatide info kuvamise asjadega, mis on js


var xmlHttp = createXmlHttpRequestObject();



//aktiveerub Kandidaatide nimekirjale vajutades, saadab AJAXiga p'ringu andmete saamiseks
function getDataKandi(id) {
	var url= 'ajax/KandiData.php';
	var param= "ID="+id;
	
	getData(param,url, "kandidaat")
	
}

//aktiveerub Soovitajate nimekirjale vajutades, saadab AJAXiga p'ringu andmete saamiseks
function getDataSoov(id) {
	var url= 'ajax/SoovitData.php';
	var param= "ID="+id;
	
	getData(param,url, "soovitaja")
}

function trellid(){
    $(window).hashchange( function trellid(){
        var hash = location.hash;

        document.title = 'The hash is ' + ( hash.replace( /^#/, '' ) || 'blank' ) + '.';

        $('#osa1 a').each(function trellid(){
            var that = $(this);
            that[ that.attr( 'href' ) === hash ? 'addClass' : 'removeClass' ]( 'selected' );
        });
    })
    $(window).hashchange();
}

function getData(param,url,type) {
	if (xmlHttp.readyState==0 || xmlHttp.readyState==4){

		xmlHttp.open("POST", url, true);
		if(type=="kandidaat"){
			xmlHttp.onreadystatechange = handleServerResponseKandi;
		}else if("soovitaja"){
			xmlHttp.onreadystatechange = handleServerResponseSoovit;
		}
		
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.setRequestHeader("Content-length", param.length);
		xmlHttp.setRequestHeader("Connection", "close");

		xmlHttp.send(param);
	}else{
		setTimeout('process()',1000);
	}
}

	
//Kui andmebaas on vastanud p'ringule, siis see meetod tegeleb tulemiga Kandidaadtide lehe jaoks
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
			
			//alert (data[5].firstChild.nodeValue);
			//document.getElementById("KandiID").value=data[5].firstChild.nodeValue;

			
			
			//tuuakse nahtavale konteiner
			document.getElementById("nurkkonteiner").style.visibility="visible"
			
			setTimeout('process()',1000);
		}else{
			alert("Midagi laks valesti...");
		}
	}
}


//Kui andmebaas on vastanud p'ringule, siis see meetod tegeleb tulemiga Soovitajate lehe jaoks
function handleServerResponseSoovit() { 
	if (xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			xmlResponse=xmlHttp.responseXML;
			xmlDocumentElement=xmlResponse.documentElement;
			
			data= xmlDocumentElement.childNodes;
			
			//lisatakse andmed konteinerisse
			document.getElementById("SNimi").innerHTML = data[1].firstChild.nodeValue;
			document.getElementById("SToetatud").innerHTML = "Toetanud "+data[2].firstChild.nodeValue
			+" kandidaati";
			//document.getElementById("KErakond").innerHTML = data[3].firstChild.nodeValue;
			//document.getElementById("KKirjeldus").innerHTML = data[4].firstChild.nodeValue;
			
			//tuuakse nahtavale konteiner
			document.getElementById("nurkkonteiner").style.visibility="visible"
			
			setTimeout('process()',1000);
		}else{
			alert(xmlHttp.status);
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